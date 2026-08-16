<?php
require __DIR__ . '/includes/app.php';
require __DIR__ . '/includes/components.php';

$items = $expertise['items'] ?? [];
site_header('expertise', 'Mutaxassislik');
?>
<main>
<section class="page-hero shell">
  <div class="eyebrow">02 / Expertise</div>
  <h1>Mutaxassislik.</h1>
  <p><?= h($expertise['intro'] ?? 'Asosiy neyroxirurgik yo‘nalishlar.') ?></p>
</section>
<section class="section shell">
  <div class="glass-grid">
    <?php foreach ($items as $i => $item): ?>
      <article class="glass-card">
        <span class="number"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?> · <?= h($item['category'] ?? '') ?></span>
        <h3><?= h($item['title'] ?? '') ?></h3>
        <p><?= h($item['description'] ?? '') ?></p>
      </article>
    <?php endforeach; ?>
  </div>
</section>
<section class="section shell">
  <div class="dark-panel">
    <div class="eyebrow">Clinical philosophy</div>
    <h2>Har bir holat — alohida qaror.</h2>
    <p>Professional baholash, klinik ma’lumotlar va bemor ehtiyojlari birgalikda ko‘rib chiqiladi.</p>
    <a class="button" href="/contact.php">Bog‘lanish ↗</a>
  </div>
</section>
</main>
<?php site_footer(); ?>
