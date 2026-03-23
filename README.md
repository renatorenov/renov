# Renov DP — Site Institucional

## Estrutura do Projeto

```
renov-site/
├── index.php          # HTML5 + PHP (página principal)
├── style.css          # CSS3 (estilos completos)
├── script.js          # JavaScript (interatividade)
├── api/
│   └── contato.php    # PHP Backend (processar formulário)
├── assets/
│   └── logo.svg       # Logo Renov em SVG
├── data/
│   ├── leads.csv      # Leads capturados (gerado automaticamente)
│   └── contato.log    # Log de atividades (gerado automaticamente)
└── README.md
```

## Tecnologias

| Camada       | Tecnologia | Função                                    |
|-------------|------------|-------------------------------------------|
| Estrutura   | HTML5      | Semântica, SEO, Open Graph                |
| Estilo      | CSS3       | Variables, Grid, Flexbox, Animations      |
| Interação   | JavaScript | Painéis, dropdowns, scroll reveal, form   |
| Backend     | PHP        | Processamento de leads, email, CSV, logs  |

## Deploy

### Requisitos
- Servidor com PHP 7.4+ (Apache ou Nginx)
- Função `mail()` habilitada (para envio de emails)
- Permissão de escrita na pasta `data/`

### Passo a passo
1. Faça upload de todos os arquivos para o servidor
2. Configure as permissões: `chmod 755 data/`
3. Edite `api/contato.php` com seu email real em `ADMIN_EMAIL`
4. Edite o número de WhatsApp em `script.js` (busque por `5562999999999`)
5. Acesse via `https://seudominio.com.br/index.php`

### Para servidor Apache
Crie um `.htaccess` na raiz:
```apache
RewriteEngine On
RewriteBase /
RewriteRule ^$ index.php [L]
```

## Funcionalidades do Backend (PHP)

- **Validação server-side**: email, celular, campos obrigatórios
- **Proteção anti-spam**: honeypot field + rate limiting por IP
- **Persistência**: leads salvos em CSV com timestamp e IP
- **Notificação**: email HTML formatado enviado ao admin
- **Logging**: registro de cada lead recebido com status

## Personalização

- **Cores**: edite as CSS variables no topo de `style.css`
- **Conteúdo**: diferenciais no HTML, soluções no PHP (array `$solucoes`)
- **Email destino**: `ADMIN_EMAIL` em `api/contato.php`
- **WhatsApp**: número em `script.js`
