<?php require __DIR__.'/includes/app.php'; require __DIR__.'/includes/components.php'; $portrait=media_by_category('portrait',1)[0]??(media_items()[0]??[]); site_header('home'); ?>
<main>
<section class="hero shell hero-grid">
  <div class="hero-copy">
    <div class="eyebrow">Neurosurgery · Farg‘ona</div>
    <h1>Ilm.<br>Amaliyot.<br><em>Ishonch.</em></h1>
    <p class="lead"><?=h($doctor['bio']??'Professional neyroxirurgik faoliyat va bemorga individual yondashuv.')?></p>
    <div class="actions"><a class="button primary" href="/contact.php">Qabulga yozilish ↗</a><a class="button" href="/portfolio.php">Portfolio ko‘rish</a></div>
  </div>
  <figure class="portrait">
    <div class="premium-number" aria-hidden="true">01</div>
    <?php if($portrait): ?><img src="<?=h(media_src($portrait))?>" alt="<?=h($portrait['title']??'Jahongir Neuro')?>" fetchpriority="high"><?php endif; ?>
    <figcaption class="portrait-badge"><?=h($doctor['title']??'Vrach-neyroxirurg')?> · <?=h($doctor['experience']??'')?></figcaption>
  </figure>
</section>
<section class="shell stats"><?php foreach(($doctor['stats']??[]) as $stat): ?><div class="stat reveal-premium"><strong><?=h($stat['value']??'')?></strong><span><?=h($stat['label']??'')?></span></div><?php endforeach; ?></section>
<section class="section shell">
  <div class="section-head"><div><div class="eyebrow">01 / Expertise</div><h2>Murakkab holatlar.<br>Aniq yondashuv.</h2></div><p>Asosiy neyroxirurgik yo‘nalishlar bemor holati va klinik ma’lumotlar asosida individual baholanadi.</p></div>
  <div class="premium-bento"><?php foreach(array_slice($expertise['items']??[],0,6) as $i=>$item): ?><article class="glass-card hover-trigger reveal-premium"><span class="premium-number" aria-hidden="true"><?=str_pad((string)($i+1),2,'0',STR_PAD_LEFT)?></span><div><span class="number">0<?=($i+1)?></span><h3><?=h($item['title']??'')?></h3><p><?=h($item['description']??'')?></p></div><?php if($i<3): ?><a class="premium-glass-button" href="/services.php">Batafsil ↗</a><?php endif; ?></article><?php endforeach; ?></div>
</section>
<section class="section shell"><div class="dark-panel reveal-premium"><div class="eyebrow">02 / Professional profile</div><h2>Shifokorlik — faqat texnika emas.</h2><p><?=h($about['philosophy']??$about['bio']??'Bilim, aniqlik va insoniy yondashuv.')?></p><a class="button" href="/about.php">To‘liq profilni ko‘rish ↗</a></div></section>
<section class="section shell"><div class="section-head"><div><div class="eyebrow">03 / Evidence</div><h2>Real faoliyat.<br>Real media.</h2></div><p>Professional uchrashuvlar, klinik faoliyat va portretlardan tuzilgan media arxivi.</p></div><div class="media-grid"><?php foreach(array_slice(media_items(),0,3) as $i=>$item) echo media_card($item,$i); ?></div></section>
<section class="section shell"><div class="dark-panel reveal-premium"><div class="eyebrow">04 / Contact</div><h2>Professional masala bo‘yicha bog‘laning.</h2><p>Qabul yoki hamkorlik bo‘yicha qisqa so‘rov qoldiring.</p><a class="button" href="/contact.php">Bog‘lanish ↗</a></div></section>
</main><?php site_footer(); ?>
