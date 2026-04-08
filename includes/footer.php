  <footer class="footer">
    <div class="footer-inner">
      <div class="footer-brand">
        <img src="<?= $rootPath ?>/assets/capa-site-azul.jpg" alt="Renov">
        <p>Engenharia Financeira de Departamento Pessoal. Mais de 15 anos garantindo compliance, eficiência e redução de custos para operações com LG Lugar de Gen.te.</p>
      </div>
      <div class="footer-col">
        <h4>Soluções</h4>
        <?php $footerSolucoes = array_slice($solucoes, 0, 6, true); foreach ($footerSolucoes as $slug => $sol): ?>
        <a href="<?= $rootPath ?>/solucoes/<?= $slug ?>.php"><?= $sol['title'] ?></a>
        <?php endforeach; ?>
      </div>
      <div class="footer-col">
        <h4>Empresa</h4>
        <a href="<?= $rootPath ?>/#sobre">Quem Somos</a>
        <a href="<?= $rootPath ?>/#missao">Nossa Missão</a>
        <a href="<?= $rootPath ?>/#transicao">Transição Risco Zero</a>
        <a href="<?= $rootPath ?>/#parceiros">Seja Parceiro</a>
      </div>
      <div class="footer-col">
        <h4>Contato</h4>
        <a href="#">Goiânia, GO</a>
        <a href="mailto:contato@renovdp.com.br">contato@renovdp.com.br</a>
        <a href="tel:+5562999078182">(62) 99907-8182</a>
        <a href="#" target="_blank">LinkedIn</a>
        <a href="#" target="_blank">WhatsApp</a>
      </div>
    </div>
    <div class="footer-bottom">© <?= date('Y') ?> Renov — Engenharia Financeira de Departamento Pessoal. Todos os direitos reservados.</div>
  </footer>
  <button class="whatsapp-float" id="whatsapp-float" title="Fale conosco no WhatsApp" aria-label="WhatsApp">
    <svg width="22" height="22" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
      <path d="M12 2C6.48 2 2 6.48 2 12c0 1.82.5 3.52 1.35 5L2 22l5.15-1.34A9.95 9.95 0 0012 22c5.52 0 10-4.48 10-10S17.52 2 12 2zm5 13.5c-.22.6-1.25 1.1-1.72 1.14-.47.04-.45.37-2.86-.67-2.87-1.24-4.57-4.41-4.71-4.62-.14-.2-1.15-1.56-1.09-2.97.06-1.4.78-2.07 1.04-2.35.26-.27.57-.34.76-.34l.54.01c.18 0 .41-.07.65.52l.85 2.17c.06.16.1.35 0 .56l-.3.47-.44.48c-.15.15-.3.31-.13.62.17.3.74 1.25 1.6 2.02 1.1 1 2.02 1.31 2.32 1.45.3.14.47.12.64-.07l.45-.55c.18-.2.36-.15.6-.08l2.08.96c.23.11.38.17.44.28.06.11.06.62-.16 1.22z"/>
    </svg>
  </button>
  <script src="<?= $rootPath ?>/script.js"></script>
</body>
</html>
