document.addEventListener('DOMContentLoaded',()=>{
 const button=document.querySelector('.menu-button'),menu=document.querySelector('.mobile-menu'),backdrop=document.querySelector('.menu-backdrop');
 const close=()=>{menu?.classList.remove('open');backdrop?.classList.remove('open');button?.setAttribute('aria-expanded','false');menu?.setAttribute('aria-hidden','true');document.body.classList.remove('menu-open')};
 const open=()=>{menu?.classList.add('open');backdrop?.classList.add('open');button?.setAttribute('aria-expanded','true');menu?.setAttribute('aria-hidden','false');document.body.classList.add('menu-open')};
 button?.addEventListener('click',()=>button.getAttribute('aria-expanded')==='true'?close():open()); backdrop?.addEventListener('click',close); menu?.addEventListener('click',e=>{if(e.target.closest('a'))close()}); document.addEventListener('keydown',e=>{if(e.key==='Escape')close()}); window.addEventListener('resize',()=>{if(innerWidth>900)close()});
 document.querySelectorAll('[data-filter]').forEach(btn=>btn.addEventListener('click',()=>{const value=btn.dataset.filter;document.querySelectorAll('[data-filter]').forEach(x=>x.classList.toggle('active',x===btn));document.querySelectorAll('.media-card').forEach(card=>card.hidden=value!=='all'&&card.dataset.category!==value)}));
});
