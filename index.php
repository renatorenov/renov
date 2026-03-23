<?php require_once __DIR__ . '/includes/data.php'; $pageTitle = 'Renov — Engenharia Financeira de Departamento Pessoal'; $rootPath = '.'; require_once __DIR__ . '/includes/header.php'; ?>

  <!-- ══════ HERO ══════ -->
  <section class="hero">
    <div class="hero-glow-1"></div><div class="hero-glow-2"></div><div class="hero-grid"></div>
    <div class="hero-inner">
      <div>
        <div class="hero-badge fade-1"><span class="hero-badge-dot"></span>Engenharia Financeira de Folha há +15 anos</div>
        <h1 class="section-title-lg fade-2"><span class="gradient-text">Engenharia Financeira</span><br>do seu Departamento Pessoal.</h1>
        <p class="hero-desc fade-3">Somos especialistas em Engenharia Financeira de Departamento Pessoal para empresas de médio e grande porte, clientes ativos e futuros clientes LG Lugar de Gen.te. Você foca na Estratégia do Negócio, nós garantimos o Compliance e a Eficiência Financeira do DP.</p>
        <div class="hero-actions fade-4">
          <a href="#contato" class="btn-primary">Solicitar Proposta →</a>
          <a href="#solucoes-grid" class="btn-secondary">Nossas Soluções</a>
        </div>
      </div>
      <div class="hero-visual fade-5" style="position:relative;">
        <div class="hero-card">
          <div class="hero-card-header"><div class="hero-card-icon" style="color:var(--cyan-500);width:44px;height:44px;"><svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="40" height="32" rx="3"/><path d="M4 12h40"/><path d="M12 20v10M20 22v8M28 18v12M36 24v6"/><path d="M16 40h16M24 36v4"/></svg></div>
            <div><div class="hero-card-title">Painel Renov</div><div class="hero-card-subtitle">ENGENHARIA FINANCEIRA EM TEMPO REAL</div></div>
          </div>
          <div class="hero-stats">
            <div class="hero-stat"><div class="hero-stat-number">-30%</div><div class="hero-stat-label">Redução no TCO do DP</div></div>
            <div class="hero-stat"><div class="hero-stat-number">100%</div><div class="hero-stat-label">Compliance eSocial</div></div>
            <div class="hero-stat"><div class="hero-stat-number">99.8%</div><div class="hero-stat-label">Precisão na folha</div></div>
            <div class="hero-stat"><div class="hero-stat-number">0</div><div class="hero-stat-label">Multas por atraso</div></div>
          </div>
        </div>
        <div class="floating-badge floating-badge-1">✅ DIRF Mensal auditada</div>
        <div class="floating-badge floating-badge-2">🔒 Compliance total</div>
      </div>
    </div>
  </section>

  <!-- ══════ TCO SAVING BANNER ══════ -->
  <section class="saving-banner">
    <div class="saving-banner-inner reveal">
      <div class="saving-number">-30%</div>
      <div class="saving-text">Redução média no Custo Total de Propriedade (TCO) do seu Departamento Pessoal</div>
      <div class="saving-label">Engenharia Financeira de Folha aplicada a operações com LG Lugar de Gen.te</div>
    </div>
  </section>

  <!-- ══════ SOLUÇÕES GRID (antes de Diferenciais) ══════ -->
  <section style="padding:6rem 2rem; background:var(--bg-primary);" id="solucoes-grid">
    <div style="max-width:1200px; margin:0 auto;" class="reveal">
      <div style="text-align:center; margin-bottom:3rem;">
        <div class="section-label">Operação Completa</div>
        <h2 class="section-title">Engenharia Financeira aplicada a cada processo do DP</h2>
      </div>
      <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(220px, 1fr)); gap:1.2rem;">
        <?php foreach ($solucoes as $slug => $sol): ?>
        <a href="solucoes/<?= $slug ?>.php" class="card-hover">
          <div style="width:40px; height:40px; color:var(--navy-700); margin-bottom:1rem;"><?= $icons[$sol['icon']] ?></div>
          <h3 style="font-family:var(--font-display); font-size:.95rem; font-weight:700; color:var(--text-primary); margin-bottom:.4rem;"><?= $sol['title'] ?></h3>
          <span style="color:var(--cyan-500); font-weight:600; font-size:.8rem;">leia mais</span>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ══════ DIFERENCIAIS GRID (depois de Soluções) ══════ -->
  <section style="padding:6rem 2rem; background:var(--bg-secondary);" id="diferenciais-grid">
    <div style="max-width:1200px; margin:0 auto;" class="reveal">
      <div style="text-align:center; margin-bottom:3rem;">
        <div class="section-label">Nossos Diferenciais</div>
        <h2 class="section-title">O que só a Renov oferece</h2>
      </div>
      <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(280px, 1fr)); gap:1.2rem;">
        <?php foreach ($diferenciais as $slug => $dif): ?>
        <a href="diferenciais/<?= $slug ?>.php" class="card-hover-lg">
          <div style="width:44px; height:44px; color:var(--navy-700); margin-bottom:1rem;"><?= $icons[$dif['icon']] ?></div>
          <h3 style="font-family:var(--font-display); font-size:1rem; font-weight:700; color:var(--text-primary); margin-bottom:.3rem;"><?= $dif['title'] ?></h3>
          <p style="color:var(--text-secondary); font-size:.84rem; line-height:1.5; margin-bottom:.6rem;"><?= $dif['subtitle'] ?></p>
          <span style="color:var(--cyan-500); font-weight:600; font-size:.8rem;">leia mais</span>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ══════ SOBRE NÓS ══════ -->
  <section class="about" id="sobre">
    <div class="about-grid reveal">
      <div><div class="about-card"><img src="assets/logo.svg" alt="Renov"><div class="about-card-label">Engenharia Financeira de Departamento Pessoal</div></div></div>
      <div class="about-text">
        <div class="section-label">Por que a Renov?</div>
        <h2 class="section-title" style="margin-bottom:1.2rem;">Você foca na Estratégia do Negócio,<br>nós garantimos o Compliance e a Eficiência Financeira do DP</h2>
        <p>Quando você contrata a Renov, sua equipe ganha tempo para focar em <strong>decisões estratégicas</strong> enquanto nós assumimos o controle financeiro e operacional do Departamento Pessoal com a precisão que a sua diretoria exige.</p>
        <p style="margin-bottom:1.5rem;">Operamos todo o ciclo, da admissão à rescisão, com <strong>expertise profunda em LG Lugar de Gen.te</strong> (FPW e Suite Gen.te Nuvem) e foco total em compliance trabalhista e eficiência financeira.</p>
        <div class="about-check"><div class="about-check-icon">✓</div>Mais de 15 anos de Engenharia Financeira de Folha</div>
        <div class="about-check"><div class="about-check-icon">✓</div>Especialistas certificados em sistemas LG Lugar de Gen.te</div>
        <div class="about-check"><div class="about-check-icon">✓</div>Foco em empresas de médio e grande porte</div>
        <div class="about-check"><div class="about-check-icon">✓</div>Compliance total com eSocial e legislação vigente</div>
      </div>
    </div>
  </section>

  <!-- ══════ MISSÃO ══════ -->
  <section class="mission" id="missao"><div class="mission-inner reveal">
    <div class="section-label">Nossa Missão</div>
    <h2 class="section-title" style="line-height:1.3; margin-bottom:1.5rem;">Renovar a forma como as empresas brasileiras gerenciam seu Departamento Pessoal</h2>
    <p>Acreditamos que nenhuma empresa deveria perder tempo e dinheiro com ineficiência operacional no DP. Nossa missão é libertar o RH para que o foco seja em estratégia, pessoas e crescimento, enquanto garantimos cada detalhe financeiro e operacional com excelência, tecnologia e compliance total.</p>
  </div></section>

  <!-- ══════ TRANSIÇÃO RISCO ZERO ══════ -->
  <section class="transition-section" id="transicao"><div class="transition-inner reveal">
    <div style="text-align:center;margin-bottom:2rem;">
      <div class="section-label">Transição Risco Zero</div>
      <h2 class="section-title">A virada de chave que a operação nem percebe</h2>
      <p style="color:var(--text-secondary);font-size:1rem;line-height:1.7;max-width:600px;margin:1rem auto 0;">A maior dor de quem quer trocar de BPO ou internalizar o DP é o medo da transição dar errado e a folha não rodar. Na Renov, isso simplesmente não acontece.</p>
    </div>
    <div class="transition-grid">
      <div class="transition-step"><div class="transition-step-number">1</div><h3>Diagnóstico e Shadowing</h3><p>Mapeamos toda a operação atual, parametrização do sistema e regras de negócio. Operamos em paralelo (shadowing) sem interferir na folha vigente.</p></div>
      <div class="transition-step"><div class="transition-step-number">2</div><h3>Implantação em Paralelo</h3><p>Rodamos a folha em paralelo durante o período de transição. Conferimos número a número até que os resultados sejam idênticos.</p></div>
      <div class="transition-step"><div class="transition-step-number">3</div><h3>Virada de Chave</h3><p>Só assumimos a operação quando a precisão é comprovada. A transição acontece de forma imperceptível para a operação e para os colaboradores.</p></div>
    </div>
  </div></section>

  <!-- ══════ POR QUE A RENOV ══════ -->
  <section class="why" id="porque"><div class="why-inner reveal">
    <div class="why-header">
      <div class="section-label">A verdade que ninguém te conta</div>
      <h2 class="section-title">Quanto sua empresa perde mantendo<br>o DP do jeito que está?</h2>
      <p>Não estamos aqui para impressionar com números bonitos. Estamos aqui porque conhecemos, de dentro, os problemas que impactam diretamente o resultado financeiro de quem gerencia Departamento Pessoal.</p>
    </div>
    <div class="why-grid">
      <div class="why-card"><span class="why-card-emoji">😰</span><h3>O analista pediu demissão. E agora?</h3><p>Quando todo o conhecimento da folha está na cabeça de uma pessoa, a saída dela vira uma crise operacional e financeira. Com a Renov, o conhecimento fica na operação. Sua folha nunca para.</p></div>
      <div class="why-card"><span class="why-card-emoji">⏳</span><h3>Seu DP vive apagando incêndio</h3><p>Se sua equipe passa o mês resolvendo pendências operacionais, ela não está fazendo gestão financeira do DP. Nós assumimos o operacional para que sua gestão tenha controle real dos números.</p></div>
      <div class="why-card"><span class="why-card-emoji">💸</span><h3>O custo invisível de fazer tudo internamente</h3><p>Salários, encargos, software, treinamento, férias e substituições. Quando o CFO soma o TCO real do DP interno, o número é muito maior do que parece.</p></div>
      <div class="why-card"><span class="why-card-emoji">⚠️</span><h3>Uma multa pode custar mais que um ano inteiro</h3><p>Um prazo perdido no eSocial, uma DIRF com erro, uma rescisão mal calculada. Qualquer deslize gera multas pesadas e passivos trabalhistas que impactam diretamente o balanço.</p></div>
    </div>
    <div class="why-cta-box">
      <h3>E se você pudesse resolver tudo isso<br>com uma única decisão?</h3>
      <p>Contratar Engenharia Financeira de DP com quem realmente entende é mais do que delegar tarefas. É garantir que sua operação funcione com precisão, que sua empresa esteja protegida juridicamente e que o CFO tenha visibilidade total dos custos.</p>
      <a href="#contato" class="btn-cyan" style="display:inline-block; text-decoration:none;">Solicitar diagnóstico gratuito →</a>
    </div>
  </div></section>

  <!-- ══════ IMAGINE ══════ -->
  <section class="imagine"><div class="imagine-inner reveal">
    <div class="imagine-header"><div class="section-label">O que muda quando a Renov entra</div><h2 class="section-title">Eficiência financeira aplicada ao seu DP</h2></div>
    <div class="imagine-grid">
      <div class="imagine-card"><span class="imagine-card-icon">🎯</span><h3>Zero retrabalho</h3><p>Cada cálculo é conferido duas vezes. Erros que geram passivos simplesmente deixam de existir.</p></div>
      <div class="imagine-card"><span class="imagine-card-icon">🕐</span><h3>Prazos sempre cumpridos</h3><p>eSocial, DIRF, CAGED, DCTFWeb. Tudo entregue antes do prazo. Zero multas, zero surpresas no balanço.</p></div>
      <div class="imagine-card"><span class="imagine-card-icon">📊</span><h3>Visibilidade financeira total</h3><p>Custo de folha, provisões, encargos e impacto de cada decisão visíveis em tempo real para a diretoria.</p></div>
      <div class="imagine-card"><span class="imagine-card-icon">🔐</span><h3>Segurança jurídica e financeira</h3><p>Legislação trabalhista muda o tempo todo. A Renov garante compliance contínuo para proteger o resultado.</p></div>
      <div class="imagine-card"><span class="imagine-card-icon">📞</span><h3>SLA contratual de atendimento</h3><p>Equipe dedicada com SLA em contrato. Problemas resolvidos antes de impactar a operação.</p></div>
      <div class="imagine-card"><span class="imagine-card-icon">📈</span><h3>Redução comprovada de TCO</h3><p>Redução média de 30% no Custo Total de Propriedade do DP. Resultado direto no balanço.</p></div>
    </div>
  </div></section>

  <!-- ══════ CONTATO ══════ -->
  <section class="contact" id="contato">
    <div class="contact-glow"></div>
    <div class="contact-inner reveal">
      <div class="contact-header">
        <img src="assets/logo.svg" alt="Renov">
        <div class="section-label">Solicitar Proposta</div>
        <h2 class="section-title" style="margin-bottom:.8rem;">Diagnóstico gratuito do seu DP</h2>
        <p>Preencha o formulário e um dos nossos especialistas entrará em contato para apresentar uma análise financeira personalizada do seu Departamento Pessoal.</p>
      </div>
      <div class="contact-form" id="contact-form-wrapper">
        <form id="contact-form" method="POST" action="api/contato.php">
          <input type="text" name="website" style="display:none;" tabindex="-1" autocomplete="off">
          <div class="contact-row">
            <div><input type="email" name="email" class="contact-input" placeholder="Email Corporativo" required maxlength="254" aria-label="Email Corporativo" autocomplete="email"><div class="form-error" role="alert"></div></div>
            <div><input type="text" name="nome" class="contact-input" placeholder="Nome" required maxlength="120" aria-label="Nome completo" autocomplete="name"><div class="form-error" role="alert"></div></div>
          </div>
          <div class="contact-row">
            <div><input type="tel" name="celular" class="contact-input" placeholder="Celular" required maxlength="20" aria-label="Celular com DDD" autocomplete="tel"><div class="form-error" role="alert"></div></div>
            <div><input type="text" name="cidade" class="contact-input" placeholder="Cidade" maxlength="100" aria-label="Cidade" autocomplete="address-level2"><div class="form-error" role="alert"></div></div>
          </div>
          <div class="contact-row">
            <div><input type="text" name="empresa" class="contact-input" placeholder="Empresa" required maxlength="150" aria-label="Nome da empresa" autocomplete="organization"><div class="form-error" role="alert"></div></div>
            <div><select name="num_funcionarios" class="contact-select" aria-label="Número de funcionários"><option value="" disabled selected>Número de funcionários</option><option value="1-50">1 a 50</option><option value="51-200">51 a 200</option><option value="201-500">201 a 500</option><option value="501-1000">501 a 1.000</option><option value="1001+">Mais de 1.000</option></select></div>
          </div>
          <div class="contact-row">
            <div><input type="text" name="segmento" class="contact-input" placeholder="Segmento / Mercado" maxlength="100" aria-label="Segmento de mercado"></div>
            <div><select name="cargo" class="contact-select" aria-label="Cargo"><option value="" disabled selected>Cargo</option><option value="ceo">CEO / Diretor</option><option value="cfo">CFO / Diretor Financeiro</option><option value="gerente">Gerente</option><option value="coordenador">Coordenador</option><option value="rh">RH / DP</option><option value="outro">Outro</option></select></div>
          </div>
          <textarea name="mensagem" class="contact-textarea" placeholder="Descreva brevemente a operação do seu DP (sistema atual, número de empresas, principais dores)" rows="4" maxlength="2000" aria-label="Mensagem"></textarea>
          <div class="contact-checkbox-row">
            <input type="checkbox" name="agendar" id="agendar" class="contact-checkbox">
            <label for="agendar" class="contact-checkbox-label">Desejo agendar uma reunião de diagnóstico</label>
          </div>
          <button type="submit" class="contact-submit">Solicitar Diagnóstico Gratuito</button>
        </form>
        <div class="form-success" id="form-success">✅ Solicitação recebida com sucesso!<br><span style="font-weight:400;font-size:.9rem;color:var(--text-on-dark-secondary);">Um dos nossos especialistas entrará em contato em até 24 horas.</span></div>
      </div>
    </div>
  </section>

  <!-- ══════ PARCEIROS ══════ -->
  <section class="partners" id="parceiros"><div class="partners-inner reveal">
    <div class="section-label">Rede de parceiros estratégicos</div>
    <h2 class="section-title">Quer ser parceiro da Renov?</h2>
    <p>Trabalhamos com escritórios de advocacia trabalhista, consultorias de SST, empresas de saúde ocupacional e profissionais de psicologia organizacional. Se você atua nessas áreas, vamos construir juntos.</p>
    <a href="#contato" class="btn-outline" style="text-decoration:none;">Quero ser parceiro →</a>
  </div></section>

  <!-- ══════ BLOG ══════ -->
  <section class="blog" id="blog"><div class="blog-inner reveal">
    <div class="section-label">Inteligência para o DP</div>
    <h2 class="section-title">Conteúdo que impacta a gestão do seu Departamento Pessoal</h2>
    <div class="blog-grid">
      <div class="blog-card"><div class="blog-card-image">💹</div><div class="blog-card-body"><div class="blog-card-date">Março 2026</div><h3>TCO do Departamento Pessoal: como calcular o custo real da sua operação interna</h3><span class="blog-card-link">Leia mais →</span></div></div>
      <div class="blog-card"><div class="blog-card-image">⚖️</div><div class="blog-card-body"><div class="blog-card-date">Fevereiro 2026</div><h3>eSocial 2026: impactos financeiros das novas regras e como se proteger</h3><span class="blog-card-link">Leia mais →</span></div></div>
      <div class="blog-card"><div class="blog-card-image">🔧</div><div class="blog-card-body"><div class="blog-card-date">Janeiro 2026</div><h3>Parametrização do LG Lugar de Gen.te: erros comuns que custam caro na folha</h3><span class="blog-card-link">Leia mais →</span></div></div>
    </div>
  </div></section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
