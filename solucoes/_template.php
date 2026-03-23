<?php
require_once __DIR__ . '/../includes/data.php';

// Get current slug from filename
$currentSlug = basename($_SERVER['SCRIPT_NAME'], '.php');
$issolucao = true;

// Check if it exists in solucoes
if (!isset($solucoes[$currentSlug])) {
  header('Location: ../');
  exit;
}

$item = $solucoes[$currentSlug];
$pageTitle = $item['title'] . ' — Renov Engenharia Financeira de DP';
$pageDescription = $item['subtitle'];

require_once __DIR__ . '/../includes/header.php';
?>

  <!-- Page Header -->
  <section style="padding:7rem 2rem 3rem; background:var(--bg-secondary); border-bottom:1px solid var(--gray-200);">
    <div style="max-width:var(--max-width-sm); margin:0 auto;">
      <div style="font-size:.85rem; color:var(--text-muted); margin-bottom:1rem;">
        <a href="<?= $rootPath ?>/" style="color:var(--cyan-500); text-decoration:none;">Home</a> &rsaquo;
        <a href="<?= $rootPath ?>/#solucoes-grid" style="color:var(--cyan-500); text-decoration:none;">Soluções</a> &rsaquo;
        <span><?= $item['title'] ?></span>
      </div>
      <h1 class="section-title" style="font-size:clamp(2rem,4vw,2.8rem);">Soluções</h1>
    </div>
  </section>

  <!-- Content with sidebar -->
  <section style="padding:4rem 2rem;">
    <div style="max-width:var(--max-width-sm); margin:0 auto; display:grid; grid-template-columns:280px 1fr; gap:3rem;">

      <!-- Sidebar Menu -->
      <div>
        <?php foreach ($solucoes as $slug => $sol): $isActive = ($slug === $currentSlug); ?>
        <a href="<?= $slug ?>.php" class="sidebar-item<?= $isActive ? ' active' : '' ?>">
          <?= $sol['title'] ?>
          <svg width="7" height="12" viewBox="0 0 7 12" fill="none" style="opacity:<?= $isActive ? '1' : '.3' ?>;"><path d="M1 1L6 6L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <?php endforeach; ?>
      </div>

      <!-- Main Content -->
      <div>
        <!-- Icon -->
        <div style="width:64px; height:64px; color:var(--navy-700); margin-bottom:1.5rem;">
          <?= $icons[$item['icon']] ?>
        </div>

        <h2 style="font-family:var(--font-display); font-size:2rem; font-weight:800; margin-bottom:.5rem;"><?= $item['title'] ?></h2>
        <p style="color:var(--cyan-500); font-weight:600; font-size:1rem; margin-bottom:1.5rem;"><?= $item['subtitle'] ?></p>

        <p style="color:var(--text-secondary); font-size:1rem; line-height:1.8; margin-bottom:1.5rem;"><?= $item['detail'] ?></p>

        <!-- Bullets -->
        <div style="margin-bottom:2rem;">
          <?php foreach ($item['bullets'] as $b): ?>
          <div style="display:flex; align-items:flex-start; gap:.7rem; margin-bottom:.7rem;">
            <div style="width:24px; height:24px; background:rgba(0,196,171,.1); border-radius:6px; display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-top:2px;"><?= $checkSvg ?></div>
            <span style="color:var(--text-secondary); font-size:.95rem; line-height:1.6;"><?= $b ?></span>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- CTA -->
        <a href="<?= $rootPath ?>/#contato" class="btn-primary" style="display:inline-block; text-decoration:none;">Solicitar proposta para <?= $item['title'] ?> →</a>
      </div>
    </div>
  </section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
