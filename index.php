<?php
declare(strict_types=1);
function d(string $f):array{$p=__DIR__.'/data/'.$f;$v=is_file($p)?json_decode((string)file_get_contents($p),true):[];return is_array($v)?$v:[];}function e(mixed $v):string{return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}require_once __DIR__.'/assets/media.php';
$doctor=d('doctor.json');$about=d('about.json');$expertise=d('expertise.json');$research=d('research.json');$contact=d('contact.json');$items=$expertise['items']??[];$stats=$doctor['stats']??[];$publications=$research['publications']??[];$hero=media_pick(['portrait'],2);$homeMedia=array_merge(media_pick(['professional','international'],4),media_pick(['clinical','surgery'],4));
?>
<!doctype html><html lang="uz"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><meta name="theme-color" content="#0a0a0a"><meta name="description" content="<?=e($doctor['name']??'Jalolov Jahongir')?> — Premium neurosurgery portfolio."><title><?=e($doctor['name']??'Jalolov Jahongir')?> — Neurosurgeon</title><?=media_styles()?>
<style>
:root{--bg:#0a0a0a;--surface:#121212;--surface-2:#1a1a1a;--primary:#00dc82;--primary-dim:#00dc8233;--accent:#3b82f6;--text:#ffffff;--text-muted:#a3a3a3;--border:#262626;--glow:0 0 80px rgba(0,220,130,0.15);--gradient:linear-gradient(135deg,#00dc82,#3b82f6)}
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{background:var(--bg);color:var(--text);font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif;overflow-x:hidden;line-height:1.6}
a{text-decoration:none;color:inherit;transition:all 0.3s ease}
.wrap{max-width:1400px;margin:0 auto;padding:0 24px}
.bg-gradient{position:fixed;top:0;left:0;right:0;bottom:0;background:radial-gradient(circle at 20% 30%,rgba(0,220,130,0.08) 0%,transparent 50%),radial-gradient(circle at 80% 70%,rgba(59,130,246,0.08) 0%,transparent 50%);pointer-events:none;z-index:-1}
.nav{position:fixed;top:24px;left:50%;transform:translateX(-50%);width:calc(100% - 48px);max-width:1350px;padding:16px 32px;display:flex;align-items:center;justify-content:space-between;background:rgba(18,18,18,0.7);backdrop-filter:blur(20px);border:1px solid var(--border);border-radius:100px;z-index:100;box-shadow:0 8px 32px rgba(0,0,0,0.4)}
.brand{font-size:20px;font-weight:700;letter-spacing:-0.03em;display:flex;align-items:center;gap:10px}
.brand-dot{width:10px;height:10px;background:var(--primary);border-radius:50%;box-shadow:0 0 20px var(--primary)}
.nav-links{display:flex;gap:8px;align-items:center}
.nav-links a{padding:10px 18px;border-radius:100px;font-size:14px;font-weight:500;color:var(--text-muted);transition:all 0.3s ease}
.nav-links a:hover,.nav-links a.active{color:var(--text);background:var(--surface-2)}
.nav-cta{background:var(--gradient);color:#000;font-weight:600;padding:12px 24px;border-radius:100px;font-size:14px}
.nav-cta:hover{transform:scale(1.05);box-shadow:var(--glow)}
.hero{min-height:100vh;display:grid;grid-template-columns:1.2fr 0.8fr;gap:80px;align-items:center;padding:180px 0 100px;position:relative}
.hero-badge{display:inline-flex;align-items:center;gap:8px;padding:8px 16px;background:var(--primary-dim);border:1px solid rgba(0,220,130,0.3);border-radius:100px;font-size:12px;font-weight:600;color:var(--primary);text-transform:uppercase;letter-spacing:0.1em;margin-bottom:24px}
.hero h1{font-size:clamp(56px,8vw,120px);line-height:0.9;letter-spacing:-0.05em;font-weight:800;margin-bottom:24px;background:linear-gradient(135deg,#fff 0%,#a3a3a3 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
.hero p{font-size:clamp(18px,2vw,22px);color:var(--text-muted);max-width:540px;line-height:1.7;margin-bottom:40px}
.hero-actions{display:flex;gap:16px;flex-wrap:wrap}
.btn{display:inline-flex;align-items:center;gap:10px;padding:16px 32px;border-radius:100px;font-size:15px;font-weight:600;cursor:pointer;transition:all 0.3s ease;border:none}
.btn-primary{background:var(--gradient);color:#000;box-shadow:0 8px 24px rgba(0,220,130,0.3)}
.btn-primary:hover{transform:translateY(-2px);box-shadow:0 12px 40px rgba(0,220,130,0.4)}
.btn-outline{background:transparent;color:var(--text);border:1px solid var(--border)}
.btn-outline:hover{border-color:var(--primary);background:var(--primary-dim)}
.hero-image-wrapper{position:relative;height:100%;min-height:600px;display:flex;align-items:center;justify-content:center}
.hero-image-frame{position:relative;width:100%;height:100%;max-height:700px;border-radius:40px;overflow:hidden;background:var(--surface-2);border:1px solid var(--border)}
.hero-image-frame img{width:100%;height:100%;object-fit:cover;filter:grayscale(20%) contrast(110%);transition:all 0.5s ease}
.hero-image-frame:hover img{filter:grayscale(0%) contrast(100%);transform:scale(1.02)}
.hero-glow{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:80%;height:80%;background:radial-gradient(circle,rgba(0,220,130,0.2) 0%,transparent 70%);filter:blur(60px);z-index:-1}
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:24px;margin-top:80px;padding-top:40px;border-top:1px solid var(--border)}
.stat-card{text-align:left}
.stat-value{font-size:48px;font-weight:800;background:var(--gradient);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;line-height:1;margin-bottom:8px}
.stat-label{font-size:13px;color:var(--text-muted);text-transform:uppercase;letter-spacing:0.05em}
.section{padding:140px 0;border-top:1px solid var(--border)}
.section-header{display:grid;grid-template-columns:0.8fr 1.2fr;gap:60px;margin-bottom:80px}
.section-tag{font-size:13px;color:var(--primary);text-transform:uppercase;letter-spacing:0.15em;font-weight:700;margin-bottom:16px}
.section-title{font-size:clamp(42px,6vw,72px);line-height:1;letter-spacing:-0.04em;font-weight:800}
.section-desc{font-size:16px;color:var(--text-muted);line-height:1.8;max-width:480px}
.expertise-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px}
.expertise-card{background:var(--surface);border:1px solid var(--border);border-radius:24px;padding:40px;transition:all 0.4s ease;position:relative;overflow:hidden}
.expertise-card::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:var(--gradient);transform:scaleX(0);transform-origin:left;transition:transform 0.4s ease}
.expertise-card:hover{transform:translateY(-8px);border-color:rgba(0,220,130,0.3);box-shadow:0 20px 60px rgba(0,0,0,0.4)}
.expertise-card:hover::before{transform:scaleX(1)}
.expertise-number{font-size:14px;color:var(--text-muted);margin-bottom:24px}
.expertise-category{font-size:11px;color:var(--primary);text-transform:uppercase;letter-spacing:0.15em;font-weight:700;margin-bottom:12px}
.expertise-title{font-size:26px;font-weight:700;margin-bottom:16px;line-height:1.3}
.expertise-desc{font-size:14px;color:var(--text-muted);line-height:1.7}
.research-section{background:var(--surface);border-radius:40px;padding:80px;margin:140px 0}
.research-grid{display:grid;gap:20px}
.research-item{display:flex;align-items:flex-start;gap:24px;padding:32px;background:var(--surface-2);border:1px solid var(--border);border-radius:20px;transition:all 0.3s ease}
.research-item:hover{border-color:var(--primary);transform:translateX(8px)}
.research-year{font-size:13px;color:var(--primary);font-weight:700;white-space:nowrap}
.research-content h3{font-size:20px;font-weight:600;margin-bottom:8px}
.research-content p{font-size:14px;color:var(--text-muted)}
.media-section{padding:140px 0}
.media-header{display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:60px;gap:40px}
.media-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
.media-item{position:relative;aspect-ratio:1;border-radius:16px;overflow:hidden;cursor:pointer}
.media-item img{width:100%;height:100%;object-fit:cover;transition:transform 0.5s ease}
.media-item:hover img{transform:scale(1.1)}
.media-overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.8),transparent);opacity:0;transition:opacity 0.3s ease}
.media-item:hover .media-overlay{opacity:1}
.contact-cta{background:var(--gradient);border-radius:40px;padding:80px;display:grid;grid-template-columns:1.2fr 0.8fr;gap:60px;align-items:center;color:#000}
.contact-cta h2{font-size:clamp(42px,6vw,64px);line-height:1;letter-spacing:-0.04em;font-weight:800;margin-bottom:16px}
.contact-cta p{font-size:16px;opacity:0.9;line-height:1.7}
.contact-btn{background:#000;color:#fff;padding:18px 36px;border-radius:100px;font-weight:600;display:inline-flex;align-items:center;gap:10px;transition:all 0.3s ease}
.contact-btn:hover{transform:scale(1.05);box-shadow:0 12px 40px rgba(0,0,0,0.3)}
.footer{padding:60px 0;border-top:1px solid var(--border);display:flex;justify-content:space-between;align-items:center;color:var(--text-muted);font-size:14px}
@media(max-width:1200px){.hero{grid-template-columns:1fr;padding-top:140px}.hero-image-wrapper{display:none}.stats-grid{grid-template-columns:repeat(2,1fr)}.expertise-grid{grid-template-columns:repeat(2,1fr)}.media-grid{grid-template-columns:repeat(2,1fr)}.section-header{grid-template-columns:1fr}.contact-cta{grid-template-columns:1fr;padding:48px}}
@media(max-width:768px){.nav{padding:12px 20px}.nav-links a:not(.nav-cta){display:none}.hero h1{font-size:48px}.stats-grid{grid-template-columns:1fr;gap:32px}.expertise-grid{grid-template-columns:1fr}.media-grid{grid-template-columns:1fr}.research-section{padding:40px 24px}.contact-cta{padding:40px 24px}.footer{flex-direction:column;gap:16px;text-align:center}}
</style></head><body>
<div class="bg-gradient"></div>
<nav class="nav">
  <a class="brand" href="index.php"><span class="brand-dot"></span>Dr. Jalolov</a>
  <div class="nav-links">
    <a class="active" href="index.php">Bosh sahifa</a>
    <a href="about.php">Men haqimda</a>
    <a href="services.php">Yo'nalishlar</a>
    <a href="portfolio.php">Portfolio</a>
    <a class="nav-cta" href="contact.php">Bog'lanish</a>
  </div>
</nav>
<main>
  <section class="wrap hero">
    <div>
      <div class="hero-badge">✓ Professional Neurosurgery</div>
      <h1>Jalolov<br>Jahongir</h1>
      <p><?=e($doctor['bio']??'Professional medical portfolio.')?></p>
      <div class="hero-actions">
        <a class="btn btn-primary" href="contact.php">Qabulga yozilish →</a>
        <a class="btn btn-outline" href="about.php">Profilni ko'rish</a>
      </div>
      <?php if($stats):?><div class="stats-grid"><?php foreach(array_slice($stats,0,4) as $s):?><div class="stat-card"><div class="stat-value"><?=e($s['value']??'')?></div><div class="stat-label"><?=e($s['label']??'')?></div></div><?php endforeach;?></div><?php endif;?>
    </div>
    <div class="hero-image-wrapper">
      <div class="hero-glow"></div>
      <?php $h=$hero[0]??null;if($h):?><div class="hero-image-frame"><img src="<?=e(media_url($h))?>" alt="<?=e($h['title']??$doctor['name']??'Doctor')?>"></div><?php else:?><div class="hero-image-frame" style="background:linear-gradient(135deg,var(--surface-2),var(--surface))"></div><?php endif;?>
    </div>
  </section>
  <section class="section">
    <div class="wrap">
      <div class="section-header">
        <div><div class="section-tag">01 / Expertise</div><h2 class="section-title">Bilim.<br>Tajriba.<br>Aniqlik.</h2></div>
        <p class="section-desc"><?=e($expertise['intro']??'Aniq tashxis va individual yondashuv.')?></p>
      </div>
      <div class="expertise-grid">
        <?php foreach(array_slice($items,0,3) as $i=>$x):?><article class="expertise-card"><div class="expertise-number">0<?=($i+1)?></div><div class="expertise-category"><?=e($x['category']??'Yo'nalish')?></div><h3 class="expertise-title"><?=e($x['title']??'')?></h3><p class="expertise-desc"><?=e($x['description']??'')?></p></article><?php endforeach;?>
      </div>
      <div style="margin-top:48px"><a class="btn btn-outline" href="services.php">Barcha yo'nalishlar →</a></div>
    </div>
  </section>
  <section class="wrap">
    <div class="research-section">
      <div class="section-header" style="margin-bottom:48px">
        <div><div class="section-tag">02 / Research</div><h2 class="section-title">Ilmiy faoliyat<br>va dalil.</h2></div>
      </div>
      <div class="research-grid">
        <?php foreach(array_slice($publications,0,3) as $r):?><article class="research-item"><div class="research-year"><?=e($r['year']??'')?></div><div class="research-content"><h3><?=e($r['title']??'')?></h3><p><?=e($r['source']??'')?></p></div></article><?php endforeach;?>
      </div>
    </div>
  </section>
  <section class="media-section">
    <div class="wrap">
      <div class="media-header">
        <div><div class="section-tag">03 / Gallery</div><h2 class="section-title">Kasb<br>ichidan.</h2></div>
        <p class="section-desc">Professional uchrashuvlardan klinik amaliyotgacha bo'lgan real media.</p>
      </div>
      <div class="media-grid">
        <?php foreach(array_slice($homeMedia,0,4) as $i=>$m):?><div class="media-item"><img src="<?=e(media_url($m))?>" alt="<?=e($m['title']??'Media')?>"><div class="media-overlay"></div></div><?php endforeach;?>
      </div>
      <div style="margin-top:48px"><a class="btn btn-outline" href="portfolio.php">Barcha <?=count(site_media())?> media →</a></div>
    </div>
  </section>
  <section class="wrap">
    <div class="contact-cta">
      <div><div class="section-tag" style="color:rgba(0,0,0,0.6)">04 / Contact</div><h2><?=e($contact['headline']??'Professional masala bo'yicha bog'laning.')?></h2><p><?=e($contact['address']??'Qabul va hamkorlik bo'yicha murojaat qiling.')?></p></div>
      <div><a class="contact-btn" href="contact.php">Bog'lanish →</a></div>
    </div>
  </section>
</main>
<footer class="footer wrap"><span>© <?=date('Y')?> <?=e($doctor['name']??'Jalolov Jahongir')?></span><span>Premium Neurosurgery Portfolio</span></footer>
</body></html>
