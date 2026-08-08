/* =========================================================
   GEORGE BOUW — shared data (services, projects, i18n)
   Used by project.html and service.html
========================================================= */
const IMG = {
  bath:   'https://georgebouw.nl/wp-content/uploads/2026/07/%D8%AD%D9%85%D8%A7%D9%85-%D9%85%D8%B7%D8%A8%D8%AE-%D8%AA%D9%88%D8%A7%D9%84%D9%8A%D8%AA-scaled.jpg',
  elec:   'https://georgebouw.nl/wp-content/uploads/2026/07/%D9%83%D9%87%D8%B1%D8%A8%D8%A7.jpg',
  heat:   'https://georgebouw.nl/wp-content/uploads/2026/07/%D8%B3%D8%AE%D8%A7%D9%86.jpg',
  plumb:  'https://georgebouw.nl/wp-content/uploads/2026/07/%D8%B3%D8%A8%D8%A7%D9%83%D8%A9.jpg',
  carp:   'https://georgebouw.nl/wp-content/uploads/2026/07/%D8%AA%D9%8A%D9%85%D8%B1.jpg',
  stuc:   'https://georgebouw.nl/wp-content/uploads/2026/07/%D8%B3%D8%AA%D9%88%D9%83.jpg',
};
// Public sample video used as a functional placeholder — replace with real project videos.
const SAMPLE_VIDEO = 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4';

const SERVICES = [
  { id:'bathkitchen', icon:'bath',          base:9500, m2:900, img:IMG.bath,  gallery:[IMG.bath, IMG.plumb, IMG.stuc, IMG.heat] },
  { id:'electrical',  icon:'zap',           base:800,  m2:60,  img:IMG.elec,  gallery:[IMG.elec, IMG.heat] },
  { id:'plumbing',    icon:'droplets',      base:1200, m2:80,  img:IMG.plumb, gallery:[IMG.plumb, IMG.heat, IMG.bath] },
  { id:'plaster',     icon:'paint-roller',  base:600,  m2:35,  img:IMG.stuc,  gallery:[IMG.stuc, IMG.carp] },
  { id:'carpentry',   icon:'ruler',         base:1500, m2:120, img:IMG.carp,  gallery:[IMG.carp, IMG.stuc, IMG.bath] },
  { id:'tiling',      icon:'grid-3x3',      base:900,  m2:70,  img:IMG.bath,  gallery:[IMG.bath, IMG.plumb] },
  { id:'demolition',  icon:'hammer',        base:700,  m2:45,  img:IMG.carp,  gallery:[IMG.carp] },
];

const PROJECTS = [
  { id:'1', cat:'bathrooms',   img:IMG.bath,  gallery:[IMG.bath, IMG.plumb, IMG.stuc, IMG.heat], videos:[SAMPLE_VIDEO] },
  { id:'2', cat:'electrical',  img:IMG.elec,  gallery:[IMG.elec, IMG.heat], videos:[] },
  { id:'3', cat:'renovations', img:IMG.carp,  gallery:[IMG.carp, IMG.stuc, IMG.bath, IMG.plumb, IMG.elec], videos:[SAMPLE_VIDEO] },
  { id:'4', cat:'kitchens',    img:IMG.plumb, gallery:[IMG.plumb, IMG.bath, IMG.heat], videos:[] },
  { id:'5', cat:'renovations', img:IMG.stuc,  gallery:[IMG.stuc, IMG.carp], videos:[] },
  { id:'6', cat:'bathrooms',   img:IMG.bath,  gallery:[IMG.bath, IMG.plumb], videos:[] },
];

const I18N = {
  nl: {
    // shared nav / footer
    'nav.home':'Home','nav.services':'Diensten','nav.portfolio':'Projecten','nav.contact':'Contact','nav.quote':'Offerte','nav.back':'Terug naar home',
    'foot.tag':'Uw Partner In Bouw &amp; Renovatie',
    // pillars
    'pillar.1':'Vakmanschap','pillar.2':'Betrouwbaarheid','pillar.3':'Kwaliteit in detail','pillar.4':'Van A tot Z verzorgd',
    // services (name + short + long + included)
    'sv.bathkitchen':'Badkamer, Toilet &amp; Keuken','sv.bathkitchen.d':'Complete renovatie van keukens, badkamers en toilet van A tot Z, met topkwaliteit en oog voor detail.',
    'sv.bathkitchen.long':'Wij verzorgen de volledige renovatie van uw badkamer, toilet en keuken — van sloop en leidingwerk tot tegelwerk, sanitair en de laatste afwerking. U heeft één aanspreekpunt en een strakke planning, zodat uw droomruimte zonder zorgen wordt gerealiseerd.',
    'sv.bathkitchen.inc1':'Sloop en afvoer van oude installatie','sv.bathkitchen.inc2':'Leidingwerk, sanitair en elektra','sv.bathkitchen.inc3':'Wand- en vloertegels waterdicht gezet','sv.bathkitchen.inc4':'Montage meubels, verlichting en afwerking',
    'sv.electrical':'Elektra &amp; Groepenkasten','sv.electrical.d':'Veilige installatie en moderne elektrotechniek volgens de strengste veiligheidsnormen.',
    'sv.electrical.long':'Van een enkele groep tot een complete nieuwe installatie: wij leggen bedrading aan, plaatsen en keuren groepenkasten en zorgen dat alles voldoet aan de geldende NEN-normen. Veilig, netjes weggewerkt en volledig gedocumenteerd.',
    'sv.electrical.inc1':'Nieuwe groepenkast en aardlekbeveiliging','sv.electrical.inc2':'Bedrading en aansluitpunten','sv.electrical.inc3':'Verlichting en data-aansluitingen','sv.electrical.inc4':'Keuring en oplevering volgens norm',
    'sv.plumbing':'Loodgieterswerk &amp; Sanitair','sv.plumbing.d':'Betrouwbaar leidingwerk en waterinstallaties, geheel lekvrij en duurzaam aangelegd.',
    'sv.plumbing.long':'Betrouwbaar leiding- en installatiewerk voor water en afvoer, plus de vakkundige montage van al uw sanitair. Wij werken lekvrij, duurzaam en volgens de regels, zodat u jarenlang zorgeloos gebruik heeft.',
    'sv.plumbing.inc1':'Aanleg en vervanging van leidingwerk','sv.plumbing.inc2':'Montage kranen, wastafels en toiletten','sv.plumbing.inc3':'Aansluiten wasmachine en vaatwasser','sv.plumbing.inc4':'Lekdetectie en duurzame afdichting',
    'sv.plaster':'Stuc- &amp; Schilderwerk','sv.plaster.d':'Strak stukwerk en vakkundig schilderwerk voor een luxe en verzorgde afwerking.',
    'sv.plaster.long':'Strak stucwerk en vakkundig schilderwerk geven elke ruimte een luxe, verzorgde uitstraling. Wanden en plafonds worden glad afgewerkt en netjes geschilderd — de perfecte basis voor uw interieur.',
    'sv.plaster.inc1':'Wanden en plafonds glad of spachtel stucen','sv.plaster.inc2':'Voorbehandeling en plamuren','sv.plaster.inc3':'Grond- en aflakwerk','sv.plaster.inc4':'Nette afplak- en opruimservice',
    'sv.carpentry':'Timmer- &amp; Renovatiewerk','sv.carpentry.d':'Maatwerk, grondige renovatie en vakkundig timmerwerk dat aansluit bij uw wensen.',
    'sv.carpentry.long':'Van maatwerkkasten en kozijnen tot volledige verbouwingen: ons timmerwerk is duurzaam, strak en op maat. Wij denken mee over indeling en detail, zodat het resultaat precies past bij uw wensen en woning.',
    'sv.carpentry.inc1':'Maatwerk kasten, wanden en kozijnen','sv.carpentry.inc2':'Plaatsen deuren en vloeren','sv.carpentry.inc3':'Constructief timmerwerk','sv.carpentry.inc4':'Afwerking en detaillering',
    'sv.tiling':'Tegelwerk','sv.tiling.d':'Vakkundig wand- en vloertegelwerk — de perfecte, waterdichte basis met verzorgde afwerking.',
    'sv.tiling.long':'Vakkundig tegelwerk voor wanden en vloeren, strak uitgelijnd en waterdicht. Van kleine formaten tot grote tegels: wij zorgen voor een perfecte, verzorgde afwerking die jaren meegaat.',
    'sv.tiling.inc1':'Egaliseren en waterdicht maken ondergrond','sv.tiling.inc2':'Wand- en vloertegels strak zetten','sv.tiling.inc3':'Voegen en kitwerk','sv.tiling.inc4':'Afwerking hoeken en profielen',
    'sv.demolition':'Sloopwerk','sv.demolition.d':'Vakkundige en nette sloop als solide voorbereiding op elke renovatie.',
    'sv.demolition.long':'Een goede renovatie begint met nette sloop. Wij verwijderen bestaande constructies en installaties veilig en efficiënt, voeren het puin af en leveren de ruimte schoon op, klaar voor de opbouw.',
    'sv.demolition.inc1':'Veilig verwijderen van constructies','sv.demolition.inc2':'Afkoppelen installaties','sv.demolition.inc3':'Puinafvoer en containers','sv.demolition.inc4':'Bezemschone oplevering',
    // filters
    'pf.all':'Alle','pf.bathrooms':'Badkamers','pf.kitchens':'Keukens','pf.electrical':'Elektra','pf.renovations':'Volledige renovaties',
    // projects
    'pj.1':'Badkamer &amp; Toilet Renovatie','pj.1.loc':'Rotterdam','pj.1.dur':'3 weken','pj.1.del':'Tegelwerk, sanitair, verlichting',
    'pj.1.overview':'Een gedateerde badkamer en toilet volledig gestript en opnieuw opgebouwd. Nieuw leidingwerk, waterdicht tegelwerk, inloopdouche en sfeervolle verlichting — van A tot Z verzorgd binnen de afgesproken tijd.',
    'pj.1.d1':'Volledige sloop en nieuw leidingwerk','pj.1.d2':'Wand- en vloertegels waterdicht gezet','pj.1.d3':'Inloopdouche, meubel en LED-verlichting',
    'pj.2':'Groepenkast &amp; Bedrading','pj.2.loc':'Den Haag','pj.2.dur':'4 dagen','pj.2.del':'Nieuwe groepenkast, keuring',
    'pj.2.overview':'Verouderde meterkast vervangen door een moderne groepenkast met aardlekbeveiliging. Nieuwe bedrading aangelegd, alles gekeurd en netjes gedocumenteerd volgens de geldende normen.',
    'pj.2.d1':'Nieuwe groepenkast met aardlek','pj.2.d2':'Bedrading en extra groepen','pj.2.d3':'Keuring en opleverrapport',
    'pj.3':'Volledige Woningrenovatie','pj.3.loc':'Delft','pj.3.dur':'8 weken','pj.3.del':'Timmerwerk, stucwerk, afwerking',
    'pj.3.overview':'Een complete woning van onder tot boven gerenoveerd: sloop, nieuwe indeling, timmerwerk, stucwerk, elektra en volledige afwerking. Eén team, één planning, één aanspreekpunt van start tot oplevering.',
    'pj.3.d1':'Nieuwe indeling en constructief timmerwerk','pj.3.d2':'Stucwerk, schilderwerk en vloeren','pj.3.d3':'Elektra, sanitair en eindafwerking',
    'pj.4':'Keuken &amp; Sanitair','pj.4.loc':'Schiedam','pj.4.dur':'2 weken','pj.4.del':'Leidingwerk, montage, tegels',
    'pj.4.overview':'Nieuwe keuken geplaatst inclusief aangepast leidingwerk, aansluitingen en een strakke tegelwand. Alles waterdicht en netjes weggewerkt, klaar voor jarenlang gebruik.',
    'pj.4.d1':'Leidingwerk en aansluitingen aangepast','pj.4.d2':'Keukenmontage en apparatuur','pj.4.d3':'Tegelwand en afwerking',
    'pj.5':'Stuc- &amp; Schilderwerk','pj.5.loc':'Rotterdam','pj.5.dur':'1 week','pj.5.del':'Stucwerk, schilderwerk',
    'pj.5.overview':'Wanden en plafonds strak gestuukt en geschilderd voor een frisse, luxe uitstraling. Nette voorbereiding, gladde afwerking en een schoon opgeleverd resultaat.',
    'pj.5.d1':'Wanden en plafonds glad gestuukt','pj.5.d2':'Grond- en aflakwerk','pj.5.d3':'Nette afplak en oplevering',
    'pj.6':'Tegelwerk Vloer &amp; Wand','pj.6.loc':'Vlaardingen','pj.6.dur':'5 dagen','pj.6.del':'Vloer- en wandtegels',
    'pj.6.overview':'Grote vloer- en wandtegels strak en waterdicht gezet. Egale ondergrond, perfecte uitlijning en verzorgde voegen — een duurzame basis met een luxe afwerking.',
    'pj.6.d1':'Ondergrond egaliseren en waterdicht maken','pj.6.d2':'Vloer- en wandtegels strak zetten','pj.6.d3':'Voegen, kitwerk en profielen',
    // labels
    'lbl.scope':'Werkzaamheden','lbl.duration':'Doorlooptijd','lbl.location':'Locatie','lbl.category':'Categorie','lbl.deliverables':'Opgeleverd','lbl.overview':'Over dit project','lbl.album':'Fotoalbum','lbl.videos':'Video\'s','lbl.included':'Wat is inbegrepen','lbl.gallery':'Voorbeelden','lbl.other_projects':'Andere projecten','lbl.other_services':'Andere diensten','lbl.from':'Vanaf',
    // service detail extras
    'svd.process':'Zo werken wij','svd.cta':'Vraag deze dienst aan','svd.pricenote':'Indicatief vanafbedrag — exacte prijs na gratis inspectie.',
    'pr.1':'Kennismaking','pr.1.d':'Gratis inspectie en advies op locatie.','pr.2':'Offerte','pr.2.d':'Heldere, concurrerende prijs zonder verrassingen.','pr.3':'Uitvoering','pr.3.d':'Vakkundig, netjes en op tijd — afspraak is afspraak.','pr.4':'Oplevering','pr.4.d':'Perfecte afwerking en nazorg.',
    // CTA
    'cta.title':'Iets soortgelijks nodig?','cta.sub':'Vraag een gratis inspectie &amp; offerte op locatie aan.','cta.wa':'Direct via WhatsApp','cta.quote':'Bereken uw project','vid.note':'Demovideo — vervang door uw eigen projectvideo.','lbl.play':'Bekijk video',
  },
  en: {
    'nav.home':'Home','nav.services':'Services','nav.portfolio':'Projects','nav.contact':'Contact','nav.quote':'Get Quote','nav.back':'Back to home',
    'foot.tag':'Your Partner In Construction &amp; Renovation',
    'pillar.1':'Craftsmanship','pillar.2':'Reliability','pillar.3':'Detail Quality','pillar.4':'A-to-Z Care',
    'sv.bathkitchen':'Bathroom, Toilet &amp; Kitchen','sv.bathkitchen.d':'Complete renovation of kitchens, bathrooms and toilets from A to Z, with top quality and an eye for detail.',
    'sv.bathkitchen.long':'We handle the full renovation of your bathroom, toilet and kitchen — from demolition and pipework to tiling, sanitary ware and the final finish. One point of contact and a tight schedule, so your dream space is delivered without worries.',
    'sv.bathkitchen.inc1':'Demolition and removal of old fittings','sv.bathkitchen.inc2':'Pipework, sanitary ware and electrical','sv.bathkitchen.inc3':'Waterproof wall and floor tiling','sv.bathkitchen.inc4':'Furniture, lighting and finishing',
    'sv.electrical':'Electrical &amp; Fuse Boxes','sv.electrical.d':'Safe installation and modern electrical engineering to the strictest safety standards.',
    'sv.electrical.long':'From a single circuit to a complete new installation: we run wiring, fit and inspect fuse boxes and ensure everything meets applicable standards. Safe, neatly finished and fully documented.',
    'sv.electrical.inc1':'New fuse box and earth-leakage protection','sv.electrical.inc2':'Wiring and connection points','sv.electrical.inc3':'Lighting and data connections','sv.electrical.inc4':'Inspection and handover to standard',
    'sv.plumbing':'Plumbing &amp; Sanitary','sv.plumbing.d':'Reliable pipework and water installations, fully leak-free and durable.',
    'sv.plumbing.long':'Reliable pipe and installation work for water and drainage, plus expert fitting of all your sanitary ware. We work leak-free, durable and to code, so you enjoy years of worry-free use.',
    'sv.plumbing.inc1':'Installing and replacing pipework','sv.plumbing.inc2':'Fitting taps, basins and toilets','sv.plumbing.inc3':'Connecting washer and dishwasher','sv.plumbing.inc4':'Leak detection and durable sealing',
    'sv.plaster':'Plastering &amp; Painting','sv.plaster.d':'Smooth plastering and expert painting for a luxurious, refined finish.',
    'sv.plaster.long':'Smooth plastering and expert painting give any room a luxurious, refined look. Walls and ceilings are finished smooth and neatly painted — the perfect base for your interior.',
    'sv.plaster.inc1':'Smooth or textured plastering of walls and ceilings','sv.plaster.inc2':'Preparation and filling','sv.plaster.inc3':'Primer and top-coat painting','sv.plaster.inc4':'Tidy masking and clean-up',
    'sv.carpentry':'Carpentry &amp; Renovation','sv.carpentry.d':'Bespoke work, thorough renovation and expert carpentry tailored to your wishes.',
    'sv.carpentry.long':'From bespoke cabinets and frames to full remodels: our carpentry is durable, sharp and made to measure. We think along on layout and detail, so the result fits your wishes and home exactly.',
    'sv.carpentry.inc1':'Bespoke cabinets, walls and frames','sv.carpentry.inc2':'Fitting doors and floors','sv.carpentry.inc3':'Structural carpentry','sv.carpentry.inc4':'Finishing and detailing',
    'sv.tiling':'Tiling','sv.tiling.d':'Expert wall and floor tiling — the perfect, waterproof base with a refined finish.',
    'sv.tiling.long':'Expert wall and floor tiling, precisely aligned and waterproof. From small formats to large tiles: we deliver a perfect, refined finish that lasts for years.',
    'sv.tiling.inc1':'Levelling and waterproofing the substrate','sv.tiling.inc2':'Sharp wall and floor tiling','sv.tiling.inc3':'Grouting and sealant work','sv.tiling.inc4':'Finishing corners and profiles',
    'sv.demolition':'Demolition','sv.demolition.d':'Expert, tidy demolition as a solid foundation for any renovation.',
    'sv.demolition.long':'A good renovation starts with tidy demolition. We remove existing structures and installations safely and efficiently, clear the debris and hand over a clean space, ready to build.',
    'sv.demolition.inc1':'Safe removal of structures','sv.demolition.inc2':'Disconnecting installations','sv.demolition.inc3':'Debris removal and containers','sv.demolition.inc4':'Broom-clean handover',
    'pf.all':'All','pf.bathrooms':'Bathrooms','pf.kitchens':'Kitchens','pf.electrical':'Electrical','pf.renovations':'Full renovations',
    'pj.1':'Bathroom &amp; Toilet Renovation','pj.1.loc':'Rotterdam','pj.1.dur':'3 weeks','pj.1.del':'Tiling, sanitary, lighting',
    'pj.1.overview':'A dated bathroom and toilet fully stripped and rebuilt. New pipework, waterproof tiling, a walk-in shower and atmospheric lighting — cared for from A to Z within the agreed time.',
    'pj.1.d1':'Full demolition and new pipework','pj.1.d2':'Waterproof wall and floor tiling','pj.1.d3':'Walk-in shower, vanity and LED lighting',
    'pj.2':'Fuse Box &amp; Wiring','pj.2.loc':'The Hague','pj.2.dur':'4 days','pj.2.del':'New fuse box, inspection',
    'pj.2.overview':'Outdated meter cupboard replaced with a modern fuse box with earth-leakage protection. New wiring installed, everything inspected and neatly documented to applicable standards.',
    'pj.2.d1':'New fuse box with earth-leakage','pj.2.d2':'Wiring and extra circuits','pj.2.d3':'Inspection and handover report',
    'pj.3':'Full Home Renovation','pj.3.loc':'Delft','pj.3.dur':'8 weeks','pj.3.del':'Carpentry, plastering, finishing',
    'pj.3.overview':'A complete home renovated top to bottom: demolition, new layout, carpentry, plastering, electrical and full finishing. One team, one schedule, one point of contact from start to handover.',
    'pj.3.d1':'New layout and structural carpentry','pj.3.d2':'Plastering, painting and floors','pj.3.d3':'Electrical, sanitary and final finish',
    'pj.4':'Kitchen &amp; Sanitary','pj.4.loc':'Schiedam','pj.4.dur':'2 weeks','pj.4.del':'Pipework, fitting, tiles',
    'pj.4.overview':'New kitchen installed including adjusted pipework, connections and a sharp tiled splashback. Everything waterproof and neatly finished, ready for years of use.',
    'pj.4.d1':'Pipework and connections adjusted','pj.4.d2':'Kitchen fitting and appliances','pj.4.d3':'Tiled splashback and finishing',
    'pj.5':'Plastering &amp; Painting','pj.5.loc':'Rotterdam','pj.5.dur':'1 week','pj.5.del':'Plastering, painting',
    'pj.5.overview':'Walls and ceilings sharply plastered and painted for a fresh, luxurious look. Tidy preparation, a smooth finish and a clean handover.',
    'pj.5.d1':'Walls and ceilings smoothly plastered','pj.5.d2':'Primer and top-coat painting','pj.5.d3':'Tidy masking and handover',
    'pj.6':'Floor &amp; Wall Tiling','pj.6.loc':'Vlaardingen','pj.6.dur':'5 days','pj.6.del':'Floor and wall tiles',
    'pj.6.overview':'Large floor and wall tiles laid sharp and waterproof. A level substrate, perfect alignment and refined grouting — a durable base with a luxurious finish.',
    'pj.6.d1':'Levelling and waterproofing the substrate','pj.6.d2':'Sharp floor and wall tiling','pj.6.d3':'Grouting, sealant and profiles',
    'lbl.scope':'Scope of work','lbl.duration':'Duration','lbl.location':'Location','lbl.category':'Category','lbl.deliverables':'Delivered','lbl.overview':'About this project','lbl.album':'Photo album','lbl.videos':'Videos','lbl.included':'What\'s included','lbl.gallery':'Examples','lbl.other_projects':'Other projects','lbl.other_services':'Other services','lbl.from':'From',
    'svd.process':'How we work','svd.cta':'Request this service','svd.pricenote':'Indicative starting price — exact price after a free inspection.',
    'pr.1':'Introduction','pr.1.d':'Free on-site inspection and advice.','pr.2':'Quote','pr.2.d':'A clear, competitive price with no surprises.','pr.3':'Execution','pr.3.d':'Expert, tidy and on time — a deal is a deal.','pr.4':'Handover','pr.4.d':'Perfect finish and aftercare.',
    'cta.title':'Need something similar?','cta.sub':'Request a free on-site inspection &amp; quote.','cta.wa':'Chat on WhatsApp','cta.quote':'Estimate your project','vid.note':'Demo video — replace with your own project footage.','lbl.play':'Watch video',
  }
};

// tiny helper shared by pages
function qp(name){ return new URLSearchParams(location.search).get(name); }
