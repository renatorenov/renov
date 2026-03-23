<?php
require_once __DIR__ . '/../includes/data.php';
$currentSlug = basename($_SERVER['SCRIPT_NAME'], '.php');
if (!isset($diferenciais[$currentSlug])) { header('Location: ../'); exit; }
$item = $diferenciais[$currentSlug];
$pageTitle = $item['title'] . ' — Renov Engenharia Financeira de DP';
$pageDescription = $item['subtitle'];
require_once __DIR__ . '/../includes/header.php';
?>
  <section style="padding:7rem 2rem 3rem; background:var(--bg-secondary); border-bottom:1px solid var(--gray-200);">
    <div style="max-width:var(--max-width-sm); margin:0 auto;">
      <div style="font-size:.85rem; color:var(--text-muted); margin-bottom:1rem;">
        <a href="<?= $rootPath ?>/" style="color:var(--cyan-500); text-decoration:none;">Home</a> &rsaquo;
        <span>Diferenciais</span> &rsaquo;
        <span><?= $item['title'] ?></span>
      </div>
      <h1 class="section-title" style="font-size:clamp(2rem,4vw,2.8rem);">Diferenciais</h1>
    </div>
  </section>
  <section style="padding:4rem 2rem;">
    <div style="max-width:var(--max-width-sm); margin:0 auto; display:grid; grid-template-columns:280px 1fr; gap:3rem;">
      <div>
        <?php foreach ($diferenciais as $slug => $dif): $isActive = ($slug === $currentSlug); ?>
        <a href="<?= $slug ?>.php" style="display:flex; align-items:center; justify-content:space-between; padding:.9rem 1.2rem; margin-bottom:2px; border-radius:var(--radius-sm); font-family:var(--font-display); font-size:.88rem; font-weight:<?= $isActive ? '700' : '500' ?>; color:<?= $isActive ? 'var(--white)' : 'var(--text-secondary)' ?>; background:<?= $isActive ? 'var(--navy-800)' : 'transparent' ?>; text-decoration:none; transition:all .2s;"
          onmouseover="if(!<?= $isActive ? 'true' : 'false' ?>){this.style.background='var(--bg-secondary)';this.style.color='var(--navy-700)';}"
          onmouseout="if(!<?= $isActive ? 'true' : 'false' ?>){this.style.background='transparent';this.style.color='var(--text-secondary)';}">
          <?= $dif['title'] ?>
          <svg width="7" height="12" viewBox="0 0 7 12" fill="none" style="opacity:<?= $isActive ? '1' : '.3' ?>;"><path d="M1 1L6 6L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <?php endforeach; ?>
      </div>
      <div>
        <div style="width:64px; height:64px; color:var(--navy-700); margin-bottom:1.5rem;"><?= $icons[$item['icon']] ?></div>
        <h2 style="font-family:var(--font-display); font-size:2rem; font-weight:800; margin-bottom:.5rem;"><?= $item['title'] ?></h2>
        <p style="color:var(--cyan-500); font-weight:600; font-size:1rem; margin-bottom:1.5rem;"><?= $item['subtitle'] ?></p>
        <p style="color:var(--text-secondary); font-size:1rem; line-height:1.8; margin-bottom:1.5rem;"><?= $item['detail'] ?></p>
        <div style="margin-bottom:2rem;">
          <?php foreach ($item['bullets'] as $b): ?>
          <div style="display:flex; align-items:flex-start; gap:.7rem; margin-bottom:.7rem;">
            <div style="width:24px; height:24px; background:rgba(0,196,171,.1); border-radius:6px; display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-top:2px;"><?= $checkSvg ?></div>
            <span style="color:var(--text-secondary); font-size:.95rem; line-height:1.6;"><?= $b ?></span>
          </div>
          <?php endforeach; ?>
        </div>
        <a href="<?= $rootPath ?>/#contato" class="btn-primary" style="display:inline-block; text-decoration:none;">Solicitar diagnóstico →</a>
      </div>
    </div>
  </section>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
