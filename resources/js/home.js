
  /* =========================================================
     DATA
  ==========================================================*/
  const SERVICES = [
    { id:'bathkitchen', icon:'bath',         base:9500, m2:900, key:'sv.bathkitchen' },
    { id:'electrical',  icon:'zap',          base:800,  m2:60,  key:'sv.electrical' },
    { id:'plumbing',    icon:'droplets',     base:1200, m2:80,  key:'sv.plumbing' },
    { id:'plaster',     icon:'paint-roller', base:600,  m2:35,  key:'sv.plaster' },
    { id:'carpentry',   icon:'ruler',        base:1500, m2:120, key:'sv.carpentry' },
    { id:'tiling',      icon:'grid-3x3',     base:900,  m2:70,  key:'sv.tiling' },
    { id:'demolition',  icon:'hammer',       base:700,  m2:45,  key:'sv.demolition' },
  ];

  const PROJECTS = [
    { cat:'bathrooms',    key:'pj.1', img:'https://georgebouw.nl/wp-content/uploads/2026/07/%D8%AD%D9%85%D8%A7%D9%85-%D9%85%D8%B7%D8%A8%D8%AE-%D8%AA%D9%88%D8%A7%D9%84%D9%8A%D8%AA-scaled.jpg' },
    { cat:'electrical',   key:'pj.2', img:'https://georgebouw.nl/wp-content/uploads/2026/07/%D9%83%D9%87%D8%B1%D8%A8%D8%A7.jpg' },
    { cat:'renovations',  key:'pj.3', img:'https://georgebouw.nl/wp-content/uploads/2026/07/%D8%AA%D9%8A%D9%85%D8%B1.jpg' },
    { cat:'bathrooms',    key:'pj.4', img:'https://georgebouw.nl/wp-content/uploads/2026/07/%D8%B3%D8%A8%D8%A7%D9%83%D8%A9.jpg' },
  ];

  /* =========================================================
     I18N DICTIONARY
  ==========================================================*/
  const I18N = {
    nl: {
      'nav.services':'Diensten','nav.assistant':'Kostenassistent','nav.portfolio':'Projecten','nav.process':'Werkwijze','nav.reviews':'Reviews','nav.contact':'Contact','nav.quote':'Offerte',
      'qr.badge':'Gescand vanaf visitekaartje','qr.title':'Welkom! Uw gratis inspectie wacht.','qr.body':'Bedankt voor het scannen van onze kaart. Claim nu een <strong class="text-white">gratis inspectie &amp; offerte op locatie</strong> — geheel vrijblijvend.','qr.cta':'Claim gratis inspectie','qr.alt':'Of bereken eerst een indicatie →',
      'hero.badge':'Bouw &amp; Renovatie · Regio Nederland','hero.title1':'Uw Partner In','hero.title2':'Bouw &amp; Renovatie','hero.sub':'Van badkamer tot volledige woningrenovatie — met vakmanschap, betrouwbaarheid en oog voor detail. Van A tot Z verzorgd.','hero.cta1':'Bereken uw project','hero.cta2':'Direct contact','hero.trust1':'Afspraak is afspraak','hero.trust2':'Topkwaliteit afwerking','hero.trust3':'Concurrerende prijzen','hero.card.k':'Kernwaarden','hero.stat1':'Diensten','hero.stat2':'Verzorgd','hero.stat3':'Vakwerk',
      'pillar.1':'Vakmanschap','pillar.2':'Betrouwbaarheid','pillar.3':'Kwaliteit in detail','pillar.4':'Van A tot Z verzorgd',
      'services.eyebrow':'Onze Diensten','services.title':'Alles onder één dak, van A tot Z','services.sub':'Zeven kernspecialismen — vakkundig uitgevoerd volgens de strengste normen.','services.more':'Meer over deze dienst',
      'sv.bathkitchen':'Badkamer, Toilet &amp; Keuken','sv.bathkitchen.d':'Complete renovatie van keukens, badkamers en toilet van A tot Z. Wij realiseren uw droomruimte met topkwaliteit en oog voor detail.',
      'sv.electrical':'Elektra &amp; Groepenkasten','sv.electrical.d':'Veilige installatie en moderne elektrotechniek. Bedrading en groepenkasten volgens de strengste veiligheidsnormen.',
      'sv.plumbing':'Loodgieterswerk &amp; Sanitair','sv.plumbing.d':'Betrouwbaar leidingwerk en waterinstallaties. Vakkundige montage van al uw sanitair, geheel lekvrij en duurzaam.',
      'sv.plaster':'Stuc- &amp; Schilderwerk','sv.plaster.d':'Strak stukwerk en vakkundig schilderwerk voor een luxe en verzorgde afwerking van wanden en plafonds.',
      'sv.carpentry':'Timmer- &amp; Renovatiewerk','sv.carpentry.d':'Maatwerk, grondige renovatie en vakkundig timmerwerk dat duurzaam aansluit bij uw wensen.',
      'sv.tiling':'Tegelwerk','sv.tiling.d':'Vakkundig tegelwerk voor wanden en vloeren — de perfecte, waterdichte basis met een verzorgde afwerking.',
      'sv.demolition':'Sloopwerk','sv.demolition.d':'Vakkundige en nette sloop als solide voorbereiding op elke renovatie, veilig en efficiënt uitgevoerd.',
      'wiz.eyebrow':'Slimme Projectassistent','wiz.title':'Bereken uw richtprijs in 4 stappen','wiz.sub':'Een indicatie op maat — direct, vrijblijvend en zonder verplichtingen.',
      'wiz.s1.title':'1. Welk werk wilt u laten uitvoeren?','wiz.s1.sub':'Kies één of meer diensten.',
      'wiz.s2.title':'2. Projectgegevens','wiz.s2.sub':'Vertel ons iets meer over de ruimte.','wiz.s2.type':'Type woning','wiz.s2.size':'Oppervlakte','wiz.s2.urgency':'Gewenste planning',
      'wiz.s3.title':'3. Materiaal &amp; budget','wiz.s3.sub':'Dit bepaalt de afwerking en het prijsniveau.','wiz.s3.material':'Materiaalvoorkeur','wiz.s3.budget':'Budgetindicatie',
      'wiz.s4.title':'4. Uw indicatie &amp; aanvraag','wiz.s4.estimate':'Geschatte richtprijs','wiz.s4.disclaimer':'Indicatief. Definitieve prijs volgt na gratis inspectie op locatie.','wiz.s4.name':'Naam','wiz.s4.photos':'Foto\'s uploaden','wiz.s4.upload':'Sleep foto\'s hierheen of klik','wiz.s4.wa':'Verstuur via WhatsApp','wiz.s4.email':'Verstuur via e-mail',
      'wiz.back':'Terug','wiz.next':'Volgende','wiz.finish':'Toon indicatie',
      'prop.apartment':'Appartement','prop.house':'Woning','prop.villa':'Villa','prop.commercial':'Bedrijfspand',
      'urg.flexible':'Flexibel','urg.soon':'Binnen 3 maanden','urg.urgent':'Zo snel mogelijk',
      'mat.standard':'Standaard','mat.premium':'Premium','mat.luxury':'Luxe / high-end',
      'bud.a':'€ 2.500 – 7.500','bud.b':'€ 7.500 – 20.000','bud.c':'€ 20.000+',
      'port.eyebrow':'Projecten','port.title':'Vakwerk dat voor zich spreekt','port.before':'Voor','port.after':'Na','port.ba.caption':'Sleep de schuifknop — Badkamerrenovatie van A tot Z.',
      'pf.all':'Alle','pf.bathrooms':'Badkamers','pf.kitchens':'Keukens','pf.electrical':'Elektra','pf.renovations':'Volledige renovaties',
      'pj.1':'Badkamer &amp; Toilet Renovatie','pj.1.loc':'Rotterdam','pj.1.dur':'3 weken','pj.1.del':'Tegelwerk, sanitair, verlichting',
      'pj.2':'Groepenkast &amp; Bedrading','pj.2.loc':'Den Haag','pj.2.dur':'4 dagen','pj.2.del':'Nieuwe groepenkast, keuring',
      'pj.3':'Volledige Woningrenovatie','pj.3.loc':'Delft','pj.3.dur':'8 weken','pj.3.del':'Timmerwerk, stucwerk, afwerking',
      'pj.4':'Keuken &amp; Sanitair','pj.4.loc':'Schiedam','pj.4.dur':'2 weken','pj.4.del':'Leidingwerk, montage, tegels',
      'pj.scope':'Scope','pj.duration':'Duur','pj.location':'Locatie',
      'proc.eyebrow':'Werkwijze','proc.title':'Van eerste contact tot oplevering',
      'pr.1':'Kennismaking','pr.1.d':'Gratis inspectie en advies op locatie. Wij luisteren naar uw wensen.',
      'pr.2':'Offerte','pr.2.d':'Heldere, concurrerende offerte zonder verrassingen achteraf.',
      'pr.3':'Uitvoering','pr.3.d':'Vakkundige uitvoering — afspraak is afspraak, netjes en op tijd.',
      'pr.4':'Oplevering','pr.4.d':'Perfecte afwerking en nazorg. Pas tevreden als u tevreden bent.',
      'rev.eyebrow':'Reviews','rev.title':'Wat onze klanten zeggen',
      'rv.1':'Badkamer volledig gerenoveerd binnen de afgesproken tijd. Strak tegelwerk en netjes achtergelaten. Echt vakwerk!','rv.1.n':'Familie de Vries','rv.1.r':'Badkamerrenovatie',
      'rv.2':'Snelle en veilige aanleg van de nieuwe groepenkast. Alles keurig gekeurd en uitgelegd. Aanrader.','rv.2.n':'Mohammed A.','rv.2.r':'Elektra',
      'rv.3':'Van sloop tot oplevering alles geregeld. Communicatie top en de prijs was eerlijk. Zeer tevreden.','rv.3.n':'J. Bakker','rv.3.r':'Volledige renovatie',
      'con.eyebrow':'Contact &amp; Social','con.title':'Klaar voor uw project?','con.sub':'Vraag een gratis inspectie &amp; offerte op locatie aan. Wij reageren snel.','con.follow':'Volg ons',
      'con.f.name':'Naam','con.f.phone':'Telefoon','con.f.service':'Dienst','con.f.msg':'Bericht','con.f.send':'Aanvraag versturen','con.f.note':'Reactie doorgaans binnen 24 uur.',
      'foot.tag':'Uw Partner In Bouw &amp; Renovatie','float.wa':'Chat',
    },
    en: {
      'nav.services':'Services','nav.assistant':'Cost Assistant','nav.portfolio':'Projects','nav.process':'Process','nav.reviews':'Reviews','nav.contact':'Contact','nav.quote':'Get Quote',
      'qr.badge':'Scanned from business card','qr.title':'Welcome! Your free inspection awaits.','qr.body':'Thanks for scanning our card. Claim a <strong class="text-white">free on-site inspection &amp; quote</strong> now — no obligation.','qr.cta':'Claim free inspection','qr.alt':'Or estimate your project first →',
      'hero.badge':'Construction &amp; Renovation · Netherlands','hero.title1':'Your Partner In','hero.title2':'Construction &amp; Renovation','hero.sub':'From bathrooms to full home renovations — with craftsmanship, reliability and an eye for detail. Cared for from A to Z.','hero.cta1':'Estimate your project','hero.cta2':'Contact us','hero.trust1':'A deal is a deal','hero.trust2':'Top-quality finish','hero.trust3':'Competitive pricing','hero.card.k':'Core Values','hero.stat1':'Services','hero.stat2':'Cared for','hero.stat3':'Craftsmanship',
      'pillar.1':'Craftsmanship','pillar.2':'Reliability','pillar.3':'Detail Quality','pillar.4':'A-to-Z Care',
      'services.eyebrow':'Our Services','services.title':'Everything under one roof, from A to Z','services.sub':'Seven core specialisms — expertly delivered to the strictest standards.','services.more':'More about this service',
      'sv.bathkitchen':'Bathroom, Toilet &amp; Kitchen','sv.bathkitchen.d':'Complete renovation of kitchens, bathrooms and toilets from A to Z. We build your dream space with top quality and an eye for detail.',
      'sv.electrical':'Electrical &amp; Fuse Boxes','sv.electrical.d':'Safe installation and modern electrical engineering. Wiring and fuse boxes to the strictest safety standards.',
      'sv.plumbing':'Plumbing &amp; Sanitary','sv.plumbing.d':'Reliable pipework and water installations. Expert fitting of all your sanitary ware — fully leak-free and durable.',
      'sv.plaster':'Plastering &amp; Painting','sv.plaster.d':'Smooth plastering and expert painting for a luxurious, refined finish on walls and ceilings.',
      'sv.carpentry':'Carpentry &amp; Renovation','sv.carpentry.d':'Bespoke work, thorough renovation and expert carpentry that lasts and fits your wishes.',
      'sv.tiling':'Tiling','sv.tiling.d':'Expert wall and floor tiling — the perfect, waterproof base with a refined finish.',
      'sv.demolition':'Demolition','sv.demolition.d':'Expert, tidy demolition as a solid foundation for any renovation — safe and efficient.',
      'wiz.eyebrow':'Smart Project Assistant','wiz.title':'Estimate your price in 4 steps','wiz.sub':'A tailored indication — instant, free and with no obligations.',
      'wiz.s1.title':'1. What work would you like done?','wiz.s1.sub':'Select one or more services.',
      'wiz.s2.title':'2. Project details','wiz.s2.sub':'Tell us a bit more about the space.','wiz.s2.type':'Property type','wiz.s2.size':'Surface area','wiz.s2.urgency':'Preferred timeline',
      'wiz.s3.title':'3. Material &amp; budget','wiz.s3.sub':'This determines the finish and price level.','wiz.s3.material':'Material preference','wiz.s3.budget':'Budget bracket',
      'wiz.s4.title':'4. Your estimate &amp; request','wiz.s4.estimate':'Estimated price','wiz.s4.disclaimer':'Indicative. Final price follows a free on-site inspection.','wiz.s4.name':'Name','wiz.s4.photos':'Upload photos','wiz.s4.upload':'Drop photos here or click','wiz.s4.wa':'Send via WhatsApp','wiz.s4.email':'Send via email',
      'wiz.back':'Back','wiz.next':'Next','wiz.finish':'Show estimate',
      'prop.apartment':'Apartment','prop.house':'House','prop.villa':'Villa','prop.commercial':'Commercial',
      'urg.flexible':'Flexible','urg.soon':'Within 3 months','urg.urgent':'As soon as possible',
      'mat.standard':'Standard','mat.premium':'Premium','mat.luxury':'Luxury / high-end',
      'bud.a':'€ 2,500 – 7,500','bud.b':'€ 7,500 – 20,000','bud.c':'€ 20,000+',
      'port.eyebrow':'Projects','port.title':'Craftsmanship that speaks for itself','port.before':'Before','port.after':'After','port.ba.caption':'Drag the slider — full A-to-Z bathroom renovation.',
      'pf.all':'All','pf.bathrooms':'Bathrooms','pf.kitchens':'Kitchens','pf.electrical':'Electrical','pf.renovations':'Full renovations',
      'pj.1':'Bathroom &amp; Toilet Renovation','pj.1.loc':'Rotterdam','pj.1.dur':'3 weeks','pj.1.del':'Tiling, sanitary, lighting',
      'pj.2':'Fuse Box &amp; Wiring','pj.2.loc':'The Hague','pj.2.dur':'4 days','pj.2.del':'New fuse box, inspection',
      'pj.3':'Full Home Renovation','pj.3.loc':'Delft','pj.3.dur':'8 weeks','pj.3.del':'Carpentry, plastering, finishing',
      'pj.4':'Kitchen &amp; Sanitary','pj.4.loc':'Schiedam','pj.4.dur':'2 weeks','pj.4.del':'Pipework, fitting, tiles',
      'pj.scope':'Scope','pj.duration':'Duration','pj.location':'Location',
      'proc.eyebrow':'Process','proc.title':'From first contact to handover',
      'pr.1':'Introduction','pr.1.d':'Free on-site inspection and advice. We listen to your wishes.',
      'pr.2':'Quote','pr.2.d':'A clear, competitive quote with no surprises afterwards.',
      'pr.3':'Execution','pr.3.d':'Expert execution — a deal is a deal, tidy and on time.',
      'pr.4':'Handover','pr.4.d':'Perfect finish and aftercare. Not done until you are happy.',
      'rev.eyebrow':'Reviews','rev.title':'What our clients say',
      'rv.1':'Bathroom fully renovated within the agreed time. Sharp tiling and left spotless. Real craftsmanship!','rv.1.n':'The de Vries Family','rv.1.r':'Bathroom renovation',
      'rv.2':'Fast and safe installation of the new fuse box. Everything neatly inspected and explained. Recommended.','rv.2.n':'Mohammed A.','rv.2.r':'Electrical',
      'rv.3':'Everything handled from demolition to handover. Great communication and a fair price. Very satisfied.','rv.3.n':'J. Bakker','rv.3.r':'Full renovation',
      'con.eyebrow':'Contact &amp; Social','con.title':'Ready for your project?','con.sub':'Request a free on-site inspection &amp; quote. We respond quickly.','con.follow':'Follow us',
      'con.f.name':'Name','con.f.phone':'Phone','con.f.service':'Service','con.f.msg':'Message','con.f.send':'Send request','con.f.note':'Typically a reply within 24 hours.',
      'foot.tag':'Your Partner In Construction &amp; Renovation','float.wa':'Chat',
    }
  };

  let LANG = 'nl';
  const t = (k) => (I18N[LANG][k] ?? I18N.nl[k] ?? k);

  /* =========================================================
     RENDER DYNAMIC SECTIONS
  ==========================================================*/
  function renderServices() {
    document.getElementById('servicesGrid').innerHTML = SERVICES.map((s,i) => `
      <a href="/service?id=${s.id}" class="reveal group block rounded-2xl border border-white/10 bg-charcoal p-6 transition hover:border-crimson/50 hover:bg-slate900" style="transition-delay:${i*40}ms">
        <span class="grid h-12 w-12 place-items-center rounded-xl bg-crimson/10 text-crimson2 transition group-hover:bg-crimson group-hover:text-white">
          <i data-lucide="${s.icon}" class="h-6 w-6"></i>
        </span>
        <h3 class="mt-5 font-display text-lg font-bold">${t(s.key)}</h3>
        <p class="mt-2 text-sm leading-relaxed text-neutral">${t(s.key+'.d')}</p>
        <span class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-crimson2">
          <span data-i18n="services.more">${t('services.more')}</span><i data-lucide="arrow-right" class="h-4 w-4 transition group-hover:translate-x-1"></i>
        </span>
      </a>`).join('');
  }

  const PROC = ['1','2','3','4'];
  function renderProcess() {
    document.getElementById('processGrid').innerHTML = PROC.map((n,i) => `
      <div class="reveal relative rounded-2xl border border-white/10 bg-charcoal p-6" style="transition-delay:${i*60}ms">
        <div class="font-display text-5xl font-black text-crimson/25">0${n}</div>
        <h3 class="mt-3 font-display text-lg font-bold">${t('pr.'+n)}</h3>
        <p class="mt-2 text-sm text-neutral">${t('pr.'+n+'.d')}</p>
      </div>`).join('');
  }

  function renderReviews() {
    document.getElementById('reviewsGrid').innerHTML = ['1','2','3'].map((n,i) => `
      <div class="reveal rounded-2xl border border-white/10 bg-charcoal p-6" style="transition-delay:${i*60}ms">
        <div class="flex gap-1 text-crimson2">${'<i data-lucide="star" class="h-4 w-4 fill-current"></i>'.repeat(5)}</div>
        <p class="mt-4 text-sm leading-relaxed text-white/90">"${t('rv.'+n)}"</p>
        <div class="mt-5 flex items-center gap-3 border-t border-white/10 pt-4">
          <span class="grid h-9 w-9 place-items-center rounded-full bg-crimson/15 font-display text-sm font-bold text-crimson2">${t('rv.'+n+'.n').charAt(0)}</span>
          <div><div class="text-sm font-semibold">${t('rv.'+n+'.n')}</div><div class="text-xs text-neutral">${t('rv.'+n+'.r')}</div></div>
        </div>
      </div>`).join('');
  }

  const FILTERS = ['all','bathrooms','kitchens','electrical','renovations'];
  let activeFilter = 'all';
  function renderFilters() {
    document.getElementById('portFilters').innerHTML = FILTERS.map(f => `
      <button onclick="setFilter('${f}')" data-filter="${f}"
        class="whitespace-nowrap rounded-full border px-4 py-2 text-sm font-semibold transition ${activeFilter===f?'border-crimson bg-crimson text-white':'border-white/10 bg-charcoal text-neutral hover:text-white'}">
        ${t('pf.'+f)}</button>`).join('');
  }
  function renderProjects() {
    const list = PROJECTS.filter(p => activeFilter==='all' || p.cat===activeFilter || (activeFilter==='kitchens'&&p.cat==='bathrooms'));
    document.getElementById('portGrid').innerHTML = (list.length?list:PROJECTS).map((p,i) => {
      const n = p.key.split('.')[1];
      return `
      <a href="/project?id=${n}" class="reveal group block overflow-hidden rounded-2xl border border-white/10 bg-charcoal transition hover:border-crimson/50" style="transition-delay:${i*50}ms">
        <div class="relative aspect-[4/3] overflow-hidden">
          <img src="${p.img}" alt="" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
          <span class="absolute left-3 top-3 rounded-full bg-crimson px-3 py-1 text-[11px] font-semibold">${t('pf.'+p.cat)||p.cat}</span>
          <span class="absolute right-3 bottom-3 grid h-9 w-9 place-items-center rounded-full bg-ink/80 text-crimson2 opacity-0 transition group-hover:opacity-100"><i data-lucide="arrow-up-right" class="h-4 w-4"></i></span>
        </div>
        <div class="p-5">
          <h3 class="font-display text-base font-bold">${t(p.key)}</h3>
          <div class="mt-3 flex flex-wrap gap-x-4 gap-y-1 text-xs text-neutral">
            <span class="inline-flex items-center gap-1"><i data-lucide="map-pin" class="h-3.5 w-3.5 text-crimson2"></i>${t(p.key+'.loc')}</span>
            <span class="inline-flex items-center gap-1"><i data-lucide="clock" class="h-3.5 w-3.5 text-crimson2"></i>${t(p.key+'.dur')}</span>
          </div>
          <p class="mt-3 border-t border-white/10 pt-3 text-xs text-neutral"><span class="font-semibold text-white/80">${t('pj.scope')}:</span> ${t(p.key+'.del')}</p>
        </div>
      </a>`;
    }).join('');
    lucide.createIcons();
  }
  function setFilter(f){ activeFilter=f; renderFilters(); renderProjects(); lucide.createIcons(); }

  /* =========================================================
     WIZARD
  ==========================================================*/
  let step = 1;
  const state = { scope:[], propertyType:null, size:25, urgency:null, material:null, budget:null, files:0 };

  function renderWizardSteps(){
    document.getElementById('wizardSteps').innerHTML = [1,2,3,4].map(n => `
      <div class="flex flex-1 items-center gap-2">
        <span class="wizard-dot grid h-8 w-8 shrink-0 place-items-center rounded-full text-xs font-bold ${n<=step?'bg-crimson text-white':'bg-slate900 text-neutral'}">${n<step?'✓':n}</span>
        ${n<4?`<span class="h-0.5 flex-1 rounded ${n<step?'bg-crimson':'bg-slate900'}"></span>`:''}
      </div>`).join('');
  }

  function chip(field, value, label, multi){
    const on = multi ? state[field].includes(value) : state[field]===value;
    return `<button type="button" onclick="pick('${field}','${value}',${!!multi})"
      class="rounded-lg border px-4 py-3 text-left text-sm font-semibold transition ${on?'border-crimson bg-crimson/15 text-white shadow-glow':'border-white/10 bg-ink text-neutral hover:border-crimson/40'}">
      ${label}</button>`;
  }

  function renderScope(){
    document.getElementById('scopeGrid').innerHTML = SERVICES.map(s =>
      chip('scope', s.id, t(s.key), true)).join('');
  }
  function renderStep2(){
    document.getElementById('propType').innerHTML = ['apartment','house','villa','commercial'].map(v=>chip('propertyType',v,t('prop.'+v))).join('');
    document.getElementById('urgency').innerHTML = ['flexible','soon','urgent'].map(v=>chip('urgency',v,t('urg.'+v))).join('');
  }
  function renderStep3(){
    document.getElementById('material').innerHTML = ['standard','premium','luxury'].map(v=>chip('material',v,t('mat.'+v))).join('');
    document.getElementById('budget').innerHTML = ['a','b','c'].map(v=>chip('budget',v,t('bud.'+v))).join('');
  }
  function pick(field,value,multi){
    if(multi){
      const i = state[field].indexOf(value);
      i>-1 ? state[field].splice(i,1) : state[field].push(value);
    } else state[field]=value;
    renderScope(); renderStep2(); renderStep3(); lucide.createIcons();
  }
  function updateSize(v){ state.size=+v; document.getElementById('sizeVal').textContent = v+' m²'; }

  function calcEstimate(){
    const matMul = { standard:1, premium:1.35, luxury:1.8 }[state.material] || 1.15;
    const urgMul = { flexible:1, soon:1.05, urgent:1.15 }[state.urgency] || 1;
    let low=0, high=0;
    state.scope.forEach(id => {
      const s = SERVICES.find(x=>x.id===id);
      const val = s.base + s.m2*state.size;
      low += val; high += val;
    });
    if(!state.scope.length){ low=2500; high=4000; }
    low = low*matMul*urgMul*0.9; high = high*matMul*urgMul*1.25;
    return [Math.round(low/100)*100, Math.round(high/100)*100];
  }
  const eur = n => '€ '+n.toLocaleString('nl-NL');

  function renderSummary(){
    const [lo,hi]=calcEstimate();
    document.getElementById('estimateBadge').textContent = `${eur(lo)} – ${eur(hi)}`;
    const scopeNames = state.scope.length ? state.scope.map(id=>t(SERVICES.find(x=>x.id===id).key)).join(', ') : '—';
    const row=(k,v)=>`<div class="flex justify-between gap-4"><span class="text-neutral">${k}</span><span class="text-right font-semibold">${v||'—'}</span></div>`;
    document.getElementById('estimateSummary').innerHTML =
      row(t('wiz.s1.title').replace(/^1\.\s*/,''), scopeNames) +
      row(t('wiz.s2.type'), state.propertyType?t('prop.'+state.propertyType):'—') +
      row(t('wiz.s2.size'), state.size+' m²') +
      row(t('wiz.s2.urgency'), state.urgency?t('urg.'+state.urgency):'—') +
      row(t('wiz.s3.material'), state.material?t('mat.'+state.material):'—');
  }

  function showStep(){
    document.querySelectorAll('.wizard-panel').forEach(p=>p.classList.toggle('hidden', +p.dataset.step!==step));
    document.getElementById('wizBack').disabled = step===1;
    const next = document.getElementById('wizNext');
    next.querySelector('span').textContent = step===3 ? t('wiz.finish') : (step===4? t('wiz.next') : t('wiz.next'));
    next.style.visibility = step===4 ? 'hidden' : 'visible';
    renderWizardSteps();
    if(step===4) renderSummary();
    lucide.createIcons();
  }
  function wizNav(d){
    if(d>0 && step===1 && state.scope.length===0){ flash(document.getElementById('scopeGrid')); return; }
    step = Math.min(4, Math.max(1, step+d));
    showStep();
    document.getElementById('assistant').scrollIntoView({behavior:'smooth',block:'start'});
  }
  function flash(el){ el.animate([{boxShadow:'0 0 0 2px #DC2626'},{boxShadow:'0 0 0 0 transparent'}],{duration:600}); }

  function buildMessage(){
    const [lo,hi]=calcEstimate();
    const L = LANG==='nl';
    const scope = state.scope.map(id=>t(SERVICES.find(x=>x.id===id).key).replace(/&amp;/g,'&')).join(', ')||'-';
    return (L?`Aanvraag GEORGE BOUW\n`:`Request GEORGE BOUW\n`)+
      `${L?'Naam':'Name'}: ${document.getElementById('leadName').value||'-'}\n`+
      `${L?'Werk':'Scope'}: ${scope}\n`+
      `${L?'Woning':'Property'}: ${state.propertyType?t('prop.'+state.propertyType):'-'}\n`+
      `${L?'Oppervlakte':'Area'}: ${state.size} m²\n`+
      `${L?'Planning':'Timeline'}: ${state.urgency?t('urg.'+state.urgency):'-'}\n`+
      `${L?'Materiaal':'Material'}: ${state.material?t('mat.'+state.material):'-'}\n`+
      `${L?'Budget':'Budget'}: ${state.budget?t('bud.'+state.budget).replace(/&amp;/g,'&'):'-'}\n`+
      `${L?'Richtprijs':'Estimate'}: ${eur(lo)} – ${eur(hi)}\n`+
      (state.files?`${L?'Foto\'s':'Photos'}: ${state.files}\n`:'');
  }
  function submitWhatsApp(){ window.open('https://wa.me/31684954212?text='+encodeURIComponent(buildMessage()),'_blank'); }
  function submitEmail(){
    const subj = LANG==='nl'?'Offerteaanvraag GEORGE BOUW':'Quote request GEORGE BOUW';
    window.location.href = `mailto:info@georgebouw.nl?subject=${encodeURIComponent(subj)}&body=${encodeURIComponent(buildMessage())}`;
  }
  function onUpload(input){
    state.files = input.files.length;
    document.getElementById('uploadLabel').textContent =
      state.files ? (LANG==='nl'?`${state.files} foto('s) geselecteerd`:`${state.files} photo(s) selected`) : t('wiz.s4.upload');
  }

  /* =========================================================
     CONTACT SELECT + SUBMIT
  ==========================================================*/
  function renderContactSelect(){
    document.getElementById('cService').innerHTML = SERVICES.map(s=>`<option>${t(s.key).replace(/&amp;/g,'&')}</option>`).join('');
  }
  function contactSubmit(e){
    e.preventDefault();
    const msg = `${LANG==='nl'?'Naam':'Name'}: ${cName.value}\n${LANG==='nl'?'Telefoon':'Phone'}: ${cPhone.value}\n${LANG==='nl'?'Dienst':'Service'}: ${cService.value}\n\n${cMsg.value}`;
    window.open('https://wa.me/31684954212?text='+encodeURIComponent(msg),'_blank');
    return false;
  }

  /* =========================================================
     LANGUAGE
  ==========================================================*/
  function applyI18n(){
    document.querySelectorAll('[data-i18n]').forEach(el=>{
      el.innerHTML = t(el.getAttribute('data-i18n'));
    });
    document.documentElement.lang = LANG;
    document.querySelectorAll('[data-lang-btn]').forEach(b=>{
      const on = b.dataset.langBtn===LANG;
      b.classList.toggle('bg-crimson', on);
      b.classList.toggle('text-white', on);
      b.classList.toggle('text-neutral', !on);
    });
    renderServices(); renderProcess(); renderReviews(); renderFilters(); renderProjects();
    renderScope(); renderStep2(); renderStep3(); renderContactSelect(); showStep();
    lucide.createIcons();
    observeReveal();
  }
  function setLang(l){ LANG=l; applyI18n(); }

  /* =========================================================
     UI HELPERS
  ==========================================================*/
  function toggleMenu(){ document.getElementById('mobileMenu').classList.toggle('hidden'); }
  function scrollToId(id){ document.getElementById(id).scrollIntoView({behavior:'smooth'}); }
  function closeQR(){ document.getElementById('qrModal').classList.add('hidden'); document.getElementById('qrModal').classList.remove('flex'); }
  function openQR(){ const m=document.getElementById('qrModal'); m.classList.remove('hidden'); m.classList.add('flex'); lucide.createIcons(); }

  // Before/After
  function setBA(v){
    document.getElementById('baAfter').style.width = v+'%';
    document.getElementById('baHandle').style.left = v+'%';
  }

  // Reveal on scroll
  let io;
  function observeReveal(){
    if(io) io.disconnect();
    io = new IntersectionObserver(es=>es.forEach(e=>{ if(e.isIntersecting){ e.target.classList.add('in'); io.unobserve(e.target);} }),{threshold:.12});
    document.querySelectorAll('.reveal').forEach(el=>io.observe(el));
  }

  // Nav shadow on scroll
  window.addEventListener('scroll',()=>{
    document.getElementById('nav').classList.toggle('shadow-lg', window.scrollY>20);
  });

  /* =========================================================
     INIT
  ==========================================================*/
  applyI18n();
  setBA(50);
  lucide.createIcons();
  // QR welcome — show if arriving via ?qr / ?utm_source=card, else after short delay first visit
  const params = new URLSearchParams(location.search);
  if(params.has('qr') || params.get('utm_source')==='card'){ setTimeout(openQR,600); }
  else { setTimeout(openQR, 4500); }
  