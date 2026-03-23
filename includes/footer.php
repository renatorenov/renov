  <footer class="footer">
    <div class="footer-inner">
      <div class="footer-brand">
        <img src="<?= $rootPath ?>/assets/logo.svg" alt="Renov">
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
        <a href="<?= $rootPath ?>/#sobre">Sobre Nós</a>
        <a href="<?= $rootPath ?>/#missao">Nossa Missão</a>
        <a href="<?= $rootPath ?>/#transicao">Transição Risco Zero</a>
        <a href="<?= $rootPath ?>/#blog">Blog</a>
        <a href="<?= $rootPath ?>/#parceiros">Seja Parceiro</a>
      </div>
      <div class="footer-col">
        <h4>Contato</h4>
        <a href="#">Goiânia, GO</a>
        <a href="mailto:contato@renovdp.com.br">contato@renovdp.com.br</a>
        <a href="tel:+5562999999999">(62) 99999-9999</a>
        <a href="#" target="_blank">LinkedIn</a>
        <a href="#" target="_blank">WhatsApp</a>
      </div>
    </div>
    <div class="footer-bottom">© <?= date('Y') ?> Renov — Engenharia Financeira de Departamento Pessoal. Todos os direitos reservados.</div>
  </footer>
  <button class="whatsapp-float" id="whatsapp-float" title="Fale conosco no WhatsApp">💬</button>
  <script src="<?= $rootPath ?>/script.js"></script>
</body>
</html>
