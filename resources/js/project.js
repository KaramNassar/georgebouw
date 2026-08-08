
  let LANG='nl';
  const t=(k)=>(I18N[LANG][k] ?? I18N.nl[k] ?? k);
  const strip=(s)=>s.replace(/&amp;/g,'&');

  const id = qp('id') || '1';
  const proj = PROJECTS.find(p=>p.id===id) || PROJECTS[0];

  function waLink(){
    const msg = (LANG==='nl'?'Ik heb interesse in een project zoals: ':'I\'m interested in a project like: ')+strip(t('pj.'+proj.id));
    return 'https://wa.me/31684954212?text='+encodeURIComponent(msg);
  }

  function render(){
    document.title = strip(t('pj.'+proj.id))+' — GEORGE BOUW';
    document.getElementById('pCatBadge').textContent = strip(t('pf.'+proj.cat));
    document.getElementById('pTitle').innerHTML = t('pj.'+proj.id);
    document.getElementById('pHeroImg').src = proj.img;
    document.getElementById('pWa').href = waLink();

    const metaItem=(icon,txt)=>`<span class="inline-flex items-center gap-2"><i data-lucide="${icon}" class="h-4 w-4 text-crimson2"></i>${txt}</span>`;
    document.getElementById('pMeta').innerHTML =
      metaItem('map-pin', t('pj.'+proj.id+'.loc')) + metaItem('clock', t('pj.'+proj.id+'.dur')) + metaItem('layers', strip(t('pf.'+proj.cat)));

    document.getElementById('pOverview').innerHTML = t('pj.'+proj.id+'.overview');
    document.getElementById('pDeliverables').innerHTML = ['d1','d2','d3'].map(d=>
      `<li class="flex items-start gap-3"><i data-lucide="check-circle-2" class="mt-0.5 h-5 w-5 shrink-0 text-crimson2"></i><span>${t('pj.'+proj.id+'.'+d)}</span></li>`).join('');

    const fact=(k,v)=>`<div><div class="text-xs uppercase tracking-wide text-neutral">${t(k)}</div><div class="mt-1 font-semibold">${v}</div></div>`;
    document.getElementById('pFacts').innerHTML =
      fact('lbl.location', t('pj.'+proj.id+'.loc')) +
      fact('lbl.duration', t('pj.'+proj.id+'.dur')) +
      fact('lbl.category', strip(t('pf.'+proj.cat))) +
      fact('lbl.scope', t('pj.'+proj.id+'.del'));

    // album
    document.getElementById('pAlbum').innerHTML = proj.gallery.map((src,i)=>
      `<button onclick="openLB(${i})" class="group relative aspect-square overflow-hidden rounded-xl border border-white/10">
        <img src="${src}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" alt="" />
        <span class="absolute inset-0 grid place-items-center bg-black/0 transition group-hover:bg-black/40">
          <i data-lucide="zoom-in" class="h-6 w-6 text-white opacity-0 transition group-hover:opacity-100"></i>
        </span>
      </button>`).join('');

    // videos
    if(proj.videos && proj.videos.length){
      document.getElementById('pVideoSection').classList.remove('hidden');
      document.getElementById('pVideos').innerHTML = proj.videos.map((v,i)=>
        `<button onclick="openVideo(${i})" class="group relative aspect-video overflow-hidden rounded-xl border border-white/10">
          <img src="${proj.img}" class="h-full w-full object-cover opacity-70 transition group-hover:opacity-90" alt="" />
          <span class="absolute inset-0 grid place-items-center">
            <span class="grid h-16 w-16 place-items-center rounded-full bg-crimson/90 text-white transition group-hover:scale-110"><i data-lucide="play" class="h-7 w-7"></i></span>
          </span>
          <span class="absolute bottom-3 left-3 rounded bg-black/60 px-2 py-1 text-xs font-semibold">${t('lbl.play')}</span>
        </button>`).join('');
    }

    // other projects
    document.getElementById('pOthers').innerHTML = PROJECTS.filter(p=>p.id!==proj.id).slice(0,4).map(p=>
      `<a href="/project?id=${p.id}" class="group overflow-hidden rounded-xl border border-white/10 bg-charcoal transition hover:border-crimson/50">
        <div class="aspect-[4/3] overflow-hidden"><img src="${p.img}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" alt=""></div>
        <div class="p-4"><div class="text-[11px] font-semibold uppercase tracking-wide text-crimson2">${strip(t('pf.'+p.cat))}</div><div class="mt-1 font-display text-sm font-bold">${t('pj.'+p.id)}</div></div>
      </a>`).join('');

    applyLang();
    lucide.createIcons();
    observe();
  }

  /* Lightbox (photos + video) */
  let lbIndex=0, lbMode='photo';
  function paintLB(){
    const el=document.getElementById('lbContent');
    if(lbMode==='photo'){
      el.innerHTML = `<img src="${proj.gallery[lbIndex]}" class="mx-auto max-h-[85vh] w-auto rounded-lg" alt="">`;
    } else {
      el.innerHTML = `<video src="${proj.videos[lbIndex]}" class="mx-auto max-h-[85vh] w-full rounded-lg" controls autoplay playsinline></video>`;
    }
    lucide.createIcons();
  }
  function openLB(i){ lbMode='photo'; lbIndex=i; show(); }
  function openVideo(i){ lbMode='video'; lbIndex=i; show(); }
  function show(){ const m=document.getElementById('lightbox'); m.classList.remove('hidden'); m.classList.add('flex'); paintLB(); }
  function closeLB(){ const m=document.getElementById('lightbox'); m.classList.add('hidden'); m.classList.remove('flex'); m.querySelectorAll('video').forEach(v=>v.pause()); }
  function stepLB(d){
    const len = lbMode==='photo'?proj.gallery.length:proj.videos.length;
    lbIndex=(lbIndex+d+len)%len; paintLB();
  }
  document.addEventListener('keydown',e=>{
    if(document.getElementById('lightbox').classList.contains('hidden'))return;
    if(e.key==='Escape')closeLB(); if(e.key==='ArrowRight')stepLB(1); if(e.key==='ArrowLeft')stepLB(-1);
  });
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
  