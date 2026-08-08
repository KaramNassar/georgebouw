
  let LANG='nl';
  const t=(k)=>(I18N[LANG][k] ?? I18N.nl[k] ?? k);
  const strip=(s)=>s.replace(/&amp;/g,'&');

  const sid = qp('id') || 'bathkitchen';
  const svc = SERVICES.find(s=>s.id===sid) || SERVICES[0];
  const PROC=['1','2','3','4'];

  function waLink(){
    const msg=(LANG==='nl'?'Ik heb interesse in de dienst: ':'I\'m interested in the service: ')+strip(t('sv.'+svc.id));
    return 'https://wa.me/31684954212?text='+encodeURIComponent(msg);
  }

  function render(){
    document.title = strip(t('sv.'+svc.id))+' — GEORGE BOUW';
    document.getElementById('svIconEl').setAttribute('data-lucide', svc.icon);
    document.getElementById('svTitle').innerHTML = t('sv.'+svc.id);
    document.getElementById('svShort').innerHTML = t('sv.'+svc.id+'.d');
    document.getElementById('svLong').innerHTML = t('sv.'+svc.id+'.long');
    document.getElementById('svHeroImg').src = svc.img;
    document.getElementById('svPrice').textContent = '€ '+svc.base.toLocaleString('nl-NL');
    document.getElementById('svWa').href = waLink();
    document.getElementById('svWa2').href = waLink();

    document.getElementById('svIncluded').innerHTML = ['inc1','inc2','inc3','inc4'].map(k=>
      `<li class="flex items-start gap-3 rounded-lg border border-white/10 bg-charcoal p-3"><i data-lucide="check-circle-2" class="mt-0.5 h-5 w-5 shrink-0 text-crimson2"></i><span class="text-sm">${t('sv.'+svc.id+'.'+k)}</span></li>`).join('');

    document.getElementById('svProcess').innerHTML = PROC.map(n=>
      `<div class="rounded-2xl border border-white/10 bg-charcoal p-6">
        <div class="font-display text-4xl font-black text-crimson/25">0${n}</div>
        <h3 class="mt-2 font-display text-base font-bold">${t('pr.'+n)}</h3>
        <p class="mt-2 text-sm text-neutral">${t('pr.'+n+'.d')}</p>
      </div>`).join('');

    document.getElementById('svGallery').innerHTML = svc.gallery.map((src,i)=>
      `<button onclick="openLB(${i})" class="group relative aspect-square overflow-hidden rounded-xl border border-white/10">
        <img src="${src}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" alt="">
        <span class="absolute inset-0 grid place-items-center bg-black/0 transition group-hover:bg-black/40"><i data-lucide="zoom-in" class="h-6 w-6 text-white opacity-0 transition group-hover:opacity-100"></i></span>
      </button>`).join('');

    document.getElementById('svOthers').innerHTML = SERVICES.filter(s=>s.id!==svc.id).slice(0,6).map(s=>
      `<a href="/service?id=${s.id}" class="group flex items-center gap-4 rounded-xl border border-white/10 bg-charcoal p-4 transition hover:border-crimson/50">
        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-lg bg-crimson/10 text-crimson2 transition group-hover:bg-crimson group-hover:text-white"><i data-lucide="${s.icon}" class="h-5 w-5"></i></span>
        <span class="font-display text-sm font-bold">${t('sv.'+s.id)}</span>
        <i data-lucide="arrow-right" class="ml-auto h-4 w-4 text-neutral transition group-hover:text-crimson2"></i>
      </a>`).join('');

    applyLang();
    lucide.createIcons();
    observe();
  }

  /* Lightbox */
  let lbIndex=0;
  function paintLB(){ document.getElementById('lbContent').innerHTML=`<img src="${svc.gallery[lbIndex]}" class="mx-auto max-h-[85vh] w-auto rounded-lg" alt="">`; }
  function openLB(i){ lbIndex=i; const m=document.getElementById('lightbox'); m.classList.remove('hidden'); m.classList.add('flex'); paintLB(); lucide.createIcons(); }
  function closeLB(){ const m=document.getElementById('lightbox'); m.classList.add('hidden'); m.classList.remove('flex'); }
  function stepLB(d){ lbIndex=(lbIndex+d+svc.gallery.length)%svc.gallery.length; paintLB(); }
  document.addEventListener('keydown',e=>{ if(document.getElementById('lightbox').classList.contains('hidden'))return;
    if(e.key==='Escape')closeLB(); if(e.key==='ArrowRight')stepLB(1); if(e.key==='ArrowLeft')stepLB(-1); });
  document.getElementById('lightbox').addEventListener('click',e=>{ if(e.target.id==='lightbox')closeLB(); });

  /* Language */
  function applyLang(){
    document.querySelectorAll('[data-i18n]').forEach(el=>el.innerHTML=t(el.getAttribute('data-i18n')));
    document.documentElement.lang=LANG;
    document.querySelectorAll('[data-lang-btn]').forEach(b=>{
      const on=b.dataset.langBtn===LANG;
      b.classList.toggle('bg-crimson',on); b.classList.toggle('text-white',on); b.classList.toggle('text-neutral',!on);
    });
  }
  function setLang(l){ LANG=l; render(); }

  let io;
  function observe(){ if(io)io.disconnect();
    io=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target);}}),{threshold:.1});
    document.querySelectorAll('.reveal').forEach(el=>io.observe(el));
  }

  render();
  