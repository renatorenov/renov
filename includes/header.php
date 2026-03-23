<?php
$baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
if (strpos($_SERVER['SCRIPT_NAME'], '/solucoes/') !== false || strpos($_SERVER['SCRIPT_NAME'], '/diferenciais/') !== false) {
  $baseUrl = rtrim(dirname(dirname($_SERVER['SCRIPT_NAME'])), '/');
}
$isHome = basename($_SERVER['SCRIPT_NAME']) === 'index.php' && strpos($_SERVER['SCRIPT_NAME'], '/solucoes/') === false;
$rootPath = $isHome ? '.' : '..';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= $pageDescription ?? 'Renov — Engenharia Financeira de Departamento Pessoal. Redução de TCO, compliance e eficiência para operações com LG Lugar de Gen.te.' ?>">
  <meta property="og:title" content="<?= $pageTitle ?? 'Renov — Engenharia Financeira de Departamento Pessoal' ?>">
  <title><?= $pageTitle ?? 'Renov — Engenharia Financeira de Departamento Pessoal' ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= $rootPath ?>/style.css">
  <link rel="icon" href="<?= $rootPath ?>/assets/logo.svg" type="image/svg+xml">
</head>
<body>
  <nav class="nav" id="main-nav">
    <div class="nav-inner">
      <a href="<?= $rootPath ?>/"><img src="<?= $rootPath ?>/assets/logo.svg" alt="Renov" class="nav-logo"></a>
      <div class="nav-menu">
        <div class="nav-dropdown">
          <span class="nav-dropdown-toggle">Soluções <svg width="10" height="6" viewBox="0 0 10 6" fill="none"><path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          <div class="nav-dropdown-menu">
            <?php foreach ($solucoes as $slug => $sol): ?>
            <a class="nav-dropdown-item" href="<?= $rootPath ?>/solucoes/<?= $slug ?>.php"><?= $sol['title'] ?></a>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="nav-dropdown">
          <span class="nav-dropdown-toggle">Diferenciais <svg width="10" height="6" viewBox="0 0 10 6" fill="none"><path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          <div class="nav-dropdown-menu">
            <?php foreach ($diferenciais as $slug => $dif): ?>
            <a class="nav-dropdown-item" href="<?= $rootPath ?>/diferenciais/<?= $slug ?>.php"><?= $dif['title'] ?></a>
            <?php endforeach; ?>
          </div>
        </div>
        <a class="nav-link" href="<?= $rootPath ?>/#porque">Por que a Renov?</a>
        <a class="nav-link" href="<?= $rootPath ?>/#blog">Blog</a>
        <a class="nav-link" href="<?= $rootPath ?>/#contato">Contato</a>
        <a class="nav-cta" href="<?= $rootPath ?>/#contato">Solicitar Proposta</a>
      </div>
    </div>
  </nav>
