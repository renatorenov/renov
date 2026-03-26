<?php
/* ══════════════════════════════════════════════════
   RENOV DP - Backend PHP
   Processamento de formulário de contato
   ══════════════════════════════════════════════════ */

// ─── CONFIGURAÇÃO ───
define('ADMIN_EMAIL', 'contato@renovdp.com.br');
define('SITE_NAME', 'Boutique de Engenharia Financeira de Folha');
define('LEADS_FILE', __DIR__ . '/../data/leads.csv');
define('LOG_FILE', __DIR__ . '/../data/contato.log');
define('N8N_WEBHOOK_URL', 'https://atendedp-n8n.y1xezl.easypanel.host/webhook/renovsite');

// ─── CORS & HEADERS ───
$allowedOrigins = [
    'https://renovdp.com.br',
    'https://www.renovdp.com.br',
    'http://localhost',
    'http://localhost:80',
];
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
if (in_array($origin, $allowedOrigins, true)) {
    header('Access-Control-Allow-Origin: ' . $origin);
} else {
    header('Access-Control-Allow-Origin: https://renovdp.com.br');
}
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Apenas POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método não permitido.']);
    exit;
}

// ─── FUNÇÕES AUXILIARES ───

/**
 * Sanitiza input do usuário
 */
function sanitize(string $input): string {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * Valida email corporativo (rejeita domínios gratuitos)
 */
function validarEmailCorporativo(string $email): bool {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    // Opcional: rejeitar emails pessoais (descomente se quiser)
    // $dominiosGratuitos = ['gmail.com', 'hotmail.com', 'yahoo.com', 'outlook.com'];
    // $dominio = strtolower(explode('@', $email)[1]);
    // if (in_array($dominio, $dominiosGratuitos)) return false;
    return true;
}

/**
 * Valida celular brasileiro
 */
function validarCelular(string $celular): bool {
    $limpo = preg_replace('/\D/', '', $celular);
    return strlen($limpo) >= 10 && strlen($limpo) <= 11;
}

/**
 * Salva lead em arquivo CSV
 */
function salvarLeadCSV(array $dados): bool {
    $dir = dirname(LEADS_FILE);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    $novoArquivo = !file_exists(LEADS_FILE);
    $fp = fopen(LEADS_FILE, 'a');

    if (!$fp) return false;

    if ($novoArquivo) {
        fputcsv($fp, [
            'Data/Hora', 'Nome', 'Email', 'Celular', 'Cidade',
            'Empresa', 'Num_Funcionarios', 'Segmento', 'Cargo',
            'Mensagem', 'Agendar_Consultor', 'IP'
        ]);
    }

    fputcsv($fp, [
        date('Y-m-d H:i:s'),
        $dados['nome'],
        $dados['email'],
        $dados['celular'],
        $dados['cidade'],
        $dados['empresa'],
        $dados['num_funcionarios'],
        $dados['segmento'],
        $dados['cargo'],
        $dados['mensagem'],
        $dados['agendar'] ? 'Sim' : 'Não',
        $_SERVER['REMOTE_ADDR'] ?? 'N/A'
    ]);

    fclose($fp);
    return true;
}

/**
 * Envia email de notificação para o admin
 */
function enviarEmailNotificacao(array $dados): bool {
    $assunto = '[NOVO LEAD] ' . $dados['empresa'] . ' - ' . $dados['nome'];

    $corpo = "
    <html>
    <body style='font-family: Arial, sans-serif; color: #333; line-height: 1.6;'>
        <div style='max-width: 600px; margin: 0 auto; padding: 20px;'>
            <div style='background: #0a1628; color: #00e5c8; padding: 20px; border-radius: 10px 10px 0 0; text-align: center;'>
                <h2 style='margin: 0;'>Novo Lead - Renov DP</h2>
            </div>
            <div style='background: #f8f9fa; padding: 25px; border: 1px solid #ddd; border-radius: 0 0 10px 10px;'>
                <table style='width: 100%; border-collapse: collapse;'>
                    <tr><td style='padding: 8px 0; font-weight: bold; width: 160px;'>Nome:</td><td>{$dados['nome']}</td></tr>
                    <tr><td style='padding: 8px 0; font-weight: bold;'>Email:</td><td><a href='mailto:{$dados['email']}'>{$dados['email']}</a></td></tr>
                    <tr><td style='padding: 8px 0; font-weight: bold;'>Celular:</td><td><a href='tel:{$dados['celular']}'>{$dados['celular']}</a></td></tr>
                    <tr><td style='padding: 8px 0; font-weight: bold;'>Cidade:</td><td>{$dados['cidade']}</td></tr>
                    <tr><td style='padding: 8px 0; font-weight: bold;'>Empresa:</td><td>{$dados['empresa']}</td></tr>
                    <tr><td style='padding: 8px 0; font-weight: bold;'>Funcionários:</td><td>{$dados['num_funcionarios']}</td></tr>
                    <tr><td style='padding: 8px 0; font-weight: bold;'>Segmento:</td><td>{$dados['segmento']}</td></tr>
                    <tr><td style='padding: 8px 0; font-weight: bold;'>Cargo:</td><td>{$dados['cargo']}</td></tr>
                    <tr><td style='padding: 8px 0; font-weight: bold;'>Agendar consultor:</td><td>" . ($dados['agendar'] ? 'Sim' : 'Não') . "</td></tr>
                </table>
                <div style='margin-top: 15px; padding: 15px; background: #fff; border-radius: 8px; border-left: 4px solid #00e5c8;'>
                    <strong>Mensagem:</strong><br>
                    " . nl2br($dados['mensagem']) . "
                </div>
                <p style='margin-top: 20px; font-size: 12px; color: #888;'>
                    Recebido em " . date('d/m/Y \à\s H:i') . " | IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'N/A') . "
                </p>
            </div>
        </div>
    </body>
    </html>";

    // Strip newlines to prevent email header injection
    $safeEmail = str_replace(["\r", "\n"], '', $dados['email']);

    $headers = [
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=UTF-8',
        'From: ' . SITE_NAME . ' <noreply@renovdp.com.br>',
        'Reply-To: ' . $safeEmail,
    ];

    return mail(ADMIN_EMAIL, $assunto, $corpo, implode("\r\n", $headers));
}

/**
 * Envia lead para o webhook n8n via cURL (servidor→servidor, sem CORS)
 */
function notificarN8n(array $dados): bool {
    if (!function_exists('curl_init')) {
        return false;
    }

    $payload = json_encode(array_merge($dados, [
        'agendar'     => $dados['agendar'] ? 'Sim' : 'Não',
        'data_envio'  => date('d/m/Y H:i:s'),
        'ip'          => $_SERVER['REMOTE_ADDR'] ?? 'N/A',
    ]));

    $ch = curl_init(N8N_WEBHOOK_URL);
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $payload,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 5,
        CURLOPT_SSL_VERIFYPEER => true,
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $response !== false && $httpCode >= 200 && $httpCode < 300;
}

/**
 * Registra log de atividade
 */
function registrarLog(string $mensagem): void {
    $dir = dirname(LOG_FILE);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    $timestamp = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'N/A';
    $result = file_put_contents(LOG_FILE, "[{$timestamp}] [{$ip}] {$mensagem}\n", FILE_APPEND | LOCK_EX);
    if ($result === false) {
        error_log("Renov: falha ao escrever log em " . LOG_FILE);
    }
}

// ─── PROCESSAMENTO DO FORMULÁRIO ───

// Proteção contra spam (honeypot check)
if (!empty($_POST['website'])) {
    // Campo honeypot preenchido = bot
    registrarLog('SPAM detectado (honeypot)');
    echo json_encode(['success' => true]); // Responde OK para não alertar o bot
    exit;
}

// Rate limiting simples (por IP)
$ipFile = sys_get_temp_dir() . '/renov_rate_' . md5($_SERVER['REMOTE_ADDR'] ?? '');
if (file_exists($ipFile) && (time() - filemtime($ipFile)) < 60) {
    http_response_code(429);
    echo json_encode(['success' => false, 'message' => 'Aguarde um minuto antes de enviar novamente.']);
    exit;
}
touch($ipFile);

// Coletar e sanitizar dados
$dados = [
    'email'             => sanitize($_POST['email'] ?? ''),
    'nome'              => sanitize($_POST['nome'] ?? ''),
    'celular'           => sanitize($_POST['celular'] ?? ''),
    'cidade'            => sanitize($_POST['cidade'] ?? ''),
    'empresa'           => sanitize($_POST['empresa'] ?? ''),
    'num_funcionarios'  => sanitize($_POST['num_funcionarios'] ?? ''),
    'segmento'          => sanitize($_POST['segmento'] ?? ''),
    'cargo'             => sanitize($_POST['cargo'] ?? ''),
    'mensagem'          => sanitize($_POST['mensagem'] ?? ''),
    'agendar'           => isset($_POST['agendar']) && $_POST['agendar'] === 'on',
];

// ─── LIMITES DE COMPRIMENTO ───
$limites = [
    'nome'     => 120,
    'email'    => 254,
    'celular'  => 20,
    'cidade'   => 100,
    'empresa'  => 150,
    'segmento' => 100,
    'cargo'    => 60,
    'mensagem' => 2000,
];

foreach ($limites as $campo => $max) {
    if (isset($dados[$campo]) && mb_strlen($dados[$campo], 'UTF-8') > $max) {
        $dados[$campo] = mb_substr($dados[$campo], 0, $max, 'UTF-8');
    }
}

// Validações
$erros = [];

if (empty($dados['nome'])) {
    $erros[] = 'O campo Nome é obrigatório.';
}
if (empty($dados['email'])) {
    $erros[] = 'O campo Email é obrigatório.';
} elseif (!validarEmailCorporativo($dados['email'])) {
    $erros[] = 'Informe um email válido.';
}
if (empty($dados['celular'])) {
    $erros[] = 'O campo Celular é obrigatório.';
} elseif (!validarCelular($dados['celular'])) {
    $erros[] = 'Informe um celular válido.';
}
if (empty($dados['empresa'])) {
    $erros[] = 'O campo Empresa é obrigatório.';
}

if (!empty($erros)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => implode(' ', $erros), 'errors' => $erros]);
    exit;
}

// Salvar lead
$csvSalvo = salvarLeadCSV($dados);
$emailEnviado = enviarEmailNotificacao($dados);
$n8nNotificado = notificarN8n($dados);

// Log
registrarLog("Lead recebido: {$dados['nome']} ({$dados['empresa']}) - CSV: " . ($csvSalvo ? 'OK' : 'FALHA') . " - Email: " . ($emailEnviado ? 'OK' : 'FALHA') . " - N8N: " . ($n8nNotificado ? 'OK' : 'FALHA'));

// Resposta
echo json_encode([
    'success' => true,
    'message' => 'Contato recebido com sucesso! Entraremos em contato em até 24 horas.',
]);
