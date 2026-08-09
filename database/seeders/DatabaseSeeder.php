<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ProcessStep;
use App\Models\Project;
use App\Models\Review;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        SiteSetting::current()->update([
            'whatsapp_number' => '+31684954212',
            'contact_email' => 'info@georgebouw.nl',
            'website_url' => 'https://georgebouw.nl',
            'tiktok_url' => null,
            'instagram_url' => null,
            'default_locale' => 'nl',
        ]);

        $categories = [
            [
                'slug' => 'bathrooms',
                'name' => [
                    'nl' => 'Badkamers',
                    'en' => 'Bathrooms',
                ],
                'sort_order' => 1,
            ],
            [
                'slug' => 'kitchens',
                'name' => [
                    'nl' => 'Keukens',
                    'en' => 'Kitchens',
                ],
                'sort_order' => 2,
            ],
            [
                'slug' => 'electrical',
                'name' => [
                    'nl' => 'Elektra',
                    'en' => 'Electrical',
                ],
                'sort_order' => 3,
            ],
            [
                'slug' => 'renovations',
                'name' => [
                    'nl' => 'Renovatie',
                    'en' => 'Renovations',
                ],
                'sort_order' => 4,
            ],
            [
                'slug' => 'plumbing',
                'name' => [
                    'nl' => 'Loodgieter',
                    'en' => 'Plumbing',
                ],
                'sort_order' => 5,
            ],
            [
                'slug' => 'plastering',
                'name' => [
                    'nl' => 'Stucwerk',
                    'en' => 'Plastering',
                ],
                'sort_order' => 6,
            ],
            [
                'slug' => 'tiling',
                'name' => [
                    'nl' => 'Tegelwerk',
                    'en' => 'Tiling',
                ],
                'sort_order' => 7,
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                [
                    'name' => $category['name'],
                    'sort_order' => $category['sort_order'],
                    'is_active' => true,
                ]
            );
        }

        $services = [
            [
                'slug' => 'bathroom-toilet-kitchen',
                'icon' => 'bath', 'base_price' => 9500, 'price_per_m2' => 900,
                'name' => ['nl' => 'Badkamer, Toilet & Keuken', 'en' => 'Bathroom, Toilet & Kitchen'],
                'short_description' => [
                    'nl' => 'Complete renovatie van keukens, badkamers en toilet van A tot Z, met topkwaliteit en oog voor detail.',
                    'en' => 'Full renovation of kitchens, bathrooms and toilets from A to Z, with top quality and an eye for detail.',
                ],
                'long_description' => [
                    'nl' => 'Wij verzorgen de volledige renovatie van uw badkamer, toilet en keuken — van sloop en leidingwerk tot tegelwerk, sanitair en de laatste afwerking. U heeft één aanspreekpunt en een strakke planning, zodat uw droomruimte zonder zorgen wordt gerealiseerd.',
                    'en' => 'We handle the full renovation of your bathroom, toilet and kitchen — from demolition and plumbing to tiling, fixtures and the final finish. One point of contact and a tight schedule, so your dream space comes together worry-free.',
                ],
                'included' => [
                    'nl' => ['Sloop en afvoer van oude installatie', 'Leidingwerk, sanitair en elektra', 'Wand- en vloertegels waterdicht gezet', 'Montage meubels, verlichting en afwerking'],
                    'en' => ['Demolition and removal of the old installation', 'Plumbing, fixtures and electrics', 'Waterproof wall and floor tiling', 'Fitting cabinets, lighting and finishing'],
                ],
            ],
            [
                'slug' => 'electrical-fuse-boxes',
                'icon' => 'zap', 'base_price' => 800, 'price_per_m2' => 60,
                'name' => ['nl' => 'Elektra & Groepenkasten', 'en' => 'Electrical & Fuse Boxes'],
                'short_description' => [
                    'nl' => 'Veilige installatie en moderne elektrotechniek volgens de strengste veiligheidsnormen.',
                    'en' => 'Safe installation and modern electrical work to the strictest safety standards.',
                ],
                'long_description' => [
                    'nl' => 'Van een enkele groep tot een complete nieuwe installatie: wij leggen bedrading aan, plaatsen en keuren groepenkasten en zorgen dat alles voldoet aan de geldende NEN-normen. Veilig, netjes weggewerkt en volledig gedocumenteerd.',
                    'en' => 'From a single circuit to a complete new installation: we run wiring, install and certify fuse boxes, and make sure everything meets current safety standards. Safe, neatly finished and fully documented.',
                ],
                'included' => [
                    'nl' => ['Nieuwe groepenkast en aardlekbeveiliging', 'Bedrading en aansluitpunten', 'Verlichting en data-aansluitingen', 'Keuring en oplevering volgens norm'],
                    'en' => ['New fuse box with earth-leakage protection', 'Wiring and connection points', 'Lighting and data connections', 'Inspection and sign-off to code'],
                ],
            ],
            [
                'slug' => 'plumbing-fixtures',
                'icon' => 'droplets', 'base_price' => 1200, 'price_per_m2' => 80,
                'name' => ['nl' => 'Loodgieterswerk & Sanitair', 'en' => 'Plumbing & Fixtures'],
                'short_description' => [
                    'nl' => 'Betrouwbaar leidingwerk en waterinstallaties, geheel lekvrij en duurzaam aangelegd.',
                    'en' => 'Reliable pipework and water installations, fitted leak-free and built to last.',
                ],
                'long_description' => [
                    'nl' => 'Betrouwbaar leiding- en installatiewerk voor water en afvoer, plus de vakkundige montage van al uw sanitair. Wij werken lekvrij, duurzaam en volgens de regels, zodat u jarenlang zorgeloos gebruik heeft.',
                    'en' => 'Reliable pipework and installation for water and drainage, plus expert fitting of all your fixtures. Leak-free, durable and code-compliant, so you get years of worry-free use.',
                ],
                'included' => [
                    'nl' => ['Aanleg en vervanging van leidingwerk', 'Montage kranen, wastafels en toiletten', 'Aansluiten wasmachine en vaatwasser', 'Lekdetectie en duurzame afdichting'],
                    'en' => ['Installing and replacing pipework', 'Fitting taps, sinks and toilets', 'Connecting washing machine and dishwasher', 'Leak detection and durable sealing'],
                ],
            ],
            [
                'slug' => 'plastering-painting',
                'icon' => 'paint-roller', 'base_price' => 600, 'price_per_m2' => 35,
                'name' => ['nl' => 'Stuc- & Schilderwerk', 'en' => 'Plastering & Painting'],
                'short_description' => [
                    'nl' => 'Strak stukwerk en vakkundig schilderwerk voor een luxe en verzorgde afwerking.',
                    'en' => 'Crisp plasterwork and skilled painting for a premium, polished finish.',
                ],
                'long_description' => [
                    'nl' => 'Strak stucwerk en vakkundig schilderwerk geven elke ruimte een luxe, verzorgde uitstraling. Wanden en plafonds worden glad afgewerkt en netjes geschilderd — de perfecte basis voor uw interieur.',
                    'en' => 'Crisp plastering and skilled painting give any room a premium, polished look. Walls and ceilings are finished smooth and painted neatly — the perfect base for your interior.',
                ],
                'included' => [
                    'nl' => ['Wanden en plafonds glad of spachtel stucen', 'Voorbehandeling en plamuren', 'Grond- en aflakwerk', 'Nette afplak- en opruimservice'],
                    'en' => ['Smooth or spatula plastering of walls and ceilings', 'Preparation and filling', 'Primer and top coats', 'Tidy masking and clean-up'],
                ],
            ],
            [
                'slug' => 'carpentry-renovation',
                'icon' => 'ruler', 'base_price' => 1500, 'price_per_m2' => 120,
                'name' => ['nl' => 'Timmer- & Renovatiewerk', 'en' => 'Carpentry & Renovation'],
                'short_description' => [
                    'nl' => 'Maatwerk, grondige renovatie en vakkundig timmerwerk dat aansluit bij uw wensen.',
                    'en' => 'Custom joinery, thorough renovation and skilled carpentry tailored to your wishes.',
                ],
                'long_description' => [
                    'nl' => 'Van maatwerkkasten en kozijnen tot volledige verbouwingen: ons timmerwerk is duurzaam, strak en op maat. Wij denken mee over indeling en detail, zodat het resultaat precies past bij uw wensen en woning.',
                    'en' => 'From custom cabinets and window frames to full renovations: our carpentry is durable, precise and made to measure. We help plan layout and detail, so the result fits your home exactly.',
                ],
                'included' => [
                    'nl' => ['Maatwerk kasten, wanden en kozijnen', 'Plaatsen deuren en vloeren', 'Constructief timmerwerk', 'Afwerking en detaillering'],
                    'en' => ['Custom cabinets, partitions and frames', 'Fitting doors and flooring', 'Structural carpentry', 'Finishing and detailing'],
                ],
            ],
            [
                'slug' => 'tiling',
                'icon' => 'grid-3x3', 'base_price' => 900, 'price_per_m2' => 70,
                'name' => ['nl' => 'Tegelwerk', 'en' => 'Tiling'],
                'short_description' => [
                    'nl' => 'Vakkundig wand- en vloertegelwerk — de perfecte, waterdichte basis met verzorgde afwerking.',
                    'en' => 'Skilled wall and floor tiling — a perfect, waterproof base with a polished finish.',
                ],
                'long_description' => [
                    'nl' => 'Vakkundig tegelwerk voor wanden en vloeren, strak uitgelijnd en waterdicht. Van kleine formaten tot grote tegels: wij zorgen voor een perfecte, verzorgde afwerking die jaren meegaat.',
                    'en' => 'Skilled tiling for walls and floors, precisely aligned and waterproof. From small formats to large tiles: we deliver a perfect, polished finish that lasts for years.',
                ],
                'included' => [
                    'nl' => ['Egaliseren en waterdicht maken ondergrond', 'Wand- en vloertegels strak zetten', 'Voegen en kitwerk', 'Afwerking hoeken en profielen'],
                    'en' => ['Leveling and waterproofing the substrate', 'Precise wall and floor tiling', 'Grouting and sealant work', 'Finishing corners and profiles'],
                ],
            ],
            [
                'slug' => 'demolition',
                'icon' => 'hammer', 'base_price' => 700, 'price_per_m2' => 45,
                'name' => ['nl' => 'Sloopwerk', 'en' => 'Demolition'],
                'short_description' => [
                    'nl' => 'Vakkundige en nette sloop als solide voorbereiding op elke renovatie.',
                    'en' => 'Skilled, tidy demolition — a solid start for any renovation.',
                ],
                'long_description' => [
                    'nl' => 'Een goede renovatie begint met nette sloop. Wij verwijderen bestaande constructies en installaties veilig en efficiënt, voeren het puin af en leveren de ruimte schoon op, klaar voor de opbouw.',
                    'en' => 'A good renovation starts with tidy demolition. We remove existing structures and installations safely and efficiently, haul away the debris, and hand the space back clean and ready to rebuild.',
                ],
                'included' => [
                    'nl' => ['Veilig verwijderen van constructies', 'Afkoppelen installaties', 'Puinafvoer en containers', 'Bezemschone oplevering'],
                    'en' => ['Safe removal of structures', 'Disconnecting installations', 'Debris removal and skips', 'Broom-clean hand-over'],
                ],
            ],
        ];

        foreach ($services as $index => $data) {
            Service::query()->updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'slug' => $data['slug'],
                    'icon' => $data['icon'],
                    'base_price' => $data['base_price'],
                    'price_per_m2' => $data['price_per_m2'],
                    'name' => $data['name'],
                    'short_description' => $data['short_description'],
                    'long_description' => $data['long_description'],
                    'included' => $data['included'],
                    'sort_order' => $index,
                    'is_active' => true,
                ]
            );
        }

        $projects = [
            [
                'slug' => 'bathroom-toilet-renovation-rotterdam',
                'category_id' => 1, 'location' => 'Rotterdam', 'duration' => '3 weken',
                'title' => ['nl' => 'Badkamer & Toilet Renovatie', 'en' => 'Bathroom & Toilet Renovation'],
                'scope_summary' => ['nl' => 'Tegelwerk, sanitair, verlichting', 'en' => 'Tiling, fixtures, lighting'],
                'overview' => [
                    'nl' => 'Een gedateerde badkamer en toilet volledig gestript en opnieuw opgebouwd. Nieuw leidingwerk, waterdicht tegelwerk, inloopdouche en sfeervolle verlichting — van A tot Z verzorgd binnen de afgesproken tijd.',
                    'en' => 'An outdated bathroom and toilet stripped completely and rebuilt. New plumbing, waterproof tiling, a walk-in shower and warm lighting — handled from A to Z within the agreed schedule.',
                ],
                'deliverables' => [
                    'nl' => ['Volledige sloop en nieuw leidingwerk', 'Wand- en vloertegels waterdicht gezet', 'Inloopdouche, meubel en LED-verlichting'],
                    'en' => ['Full demolition and new plumbing', 'Waterproof wall and floor tiling', 'Walk-in shower, vanity and LED lighting'],
                ],
                'is_featured' => true,
            ],
            [
                'slug' => 'fuse-box-wiring-den-haag',
                'category_id' => 2, 'location' => 'Den Haag', 'duration' => '4 dagen',
                'title' => ['nl' => 'Groepenkast & Bedrading', 'en' => 'Fuse Box & Wiring'],
                'scope_summary' => ['nl' => 'Nieuwe groepenkast, keuring', 'en' => 'New fuse box, inspection'],
                'overview' => [
                    'nl' => 'Verouderde meterkast vervangen door een moderne groepenkast met aardlekbeveiliging. Nieuwe bedrading aangelegd, alles gekeurd en netjes gedocumenteerd volgens de geldende normen.',
                    'en' => 'An outdated meter cupboard replaced with a modern fuse box with earth-leakage protection. New wiring installed, everything inspected and documented to current standards.',
                ],
                'deliverables' => [
                    'nl' => ['Nieuwe groepenkast met aardlek', 'Bedrading en extra groepen', 'Keuring en opleverrapport'],
                    'en' => ['New fuse box with earth-leakage protection', 'Wiring and extra circuits', 'Inspection and hand-over report'],
                ],
                'is_featured' => false,
            ],
            [
                'slug' => 'full-home-renovation-delft',
                'category_id' => 3, 'location' => 'Delft', 'duration' => '8 weken',
                'title' => ['nl' => 'Volledige Woningrenovatie', 'en' => 'Full Home Renovation'],
                'scope_summary' => ['nl' => 'Timmerwerk, stucwerk, afwerking', 'en' => 'Carpentry, plastering, finishing'],
                'overview' => [
                    'nl' => 'Een complete woning van onder tot boven gerenoveerd: sloop, nieuwe indeling, timmerwerk, stucwerk, elektra en volledige afwerking. Eén team, één planning, één aanspreekpunt van start tot oplevering.',
                    'en' => 'A complete home renovated top to bottom: demolition, a new layout, carpentry, plastering, electrics and full finishing. One team, one schedule, one point of contact from start to hand-over.',
                ],
                'deliverables' => [
                    'nl' => ['Nieuwe indeling en constructief timmerwerk', 'Stucwerk, schilderwerk en vloeren', 'Elektra, sanitair en eindafwerking'],
                    'en' => ['New layout and structural carpentry', 'Plastering, painting and flooring', 'Electrics, fixtures and final finishing'],
                ],
                'is_featured' => true,
            ],
            [
                'slug' => 'kitchen-fixtures-schiedam',
                'category_id' => 4, 'location' => 'Schiedam', 'duration' => '2 weken',
                'title' => ['nl' => 'Keuken & Sanitair', 'en' => 'Kitchen & Fixtures'],
                'scope_summary' => ['nl' => 'Leidingwerk, montage, tegels', 'en' => 'Plumbing, installation, tiling'],
                'overview' => [
                    'nl' => 'Nieuwe keuken geplaatst inclusief aangepast leidingwerk, aansluitingen en een strakke tegelwand. Alles waterdicht en netjes weggewerkt, klaar voor jarenlang gebruik.',
                    'en' => 'A new kitchen installed including adapted plumbing, connections and a clean tiled wall. Everything waterproof and neatly finished, ready for years of use.',
                ],
                'deliverables' => [
                    'nl' => ['Leidingwerk en aansluitingen aangepast', 'Keukenmontage en apparatuur', 'Tegelwand en afwerking'],
                    'en' => ['Adapted plumbing and connections', 'Kitchen installation and appliances', 'Tiled wall and finishing'],
                ],
                'is_featured' => false,
            ],
            [
                'slug' => 'plastering-painting-rotterdam',
                'category_id' => 5, 'location' => 'Rotterdam', 'duration' => '1 week',
                'title' => ['nl' => 'Stuc- & Schilderwerk', 'en' => 'Plastering & Painting'],
                'scope_summary' => ['nl' => 'Stucwerk, schilderwerk', 'en' => 'Plastering, painting'],
                'overview' => [
                    'nl' => 'Wanden en plafonds strak gestuukt en geschilderd voor een frisse, luxe uitstraling. Nette voorbereiding, gladde afwerking en een schoon opgeleverd resultaat.',
                    'en' => 'Walls and ceilings plastered and painted crisp for a fresh, premium look. Tidy preparation, a smooth finish and a clean hand-over.',
                ],
                'deliverables' => [
                    'nl' => ['Wanden en plafonds glad gestuukt', 'Grond- en aflakwerk', 'Nette afplak en oplevering'],
                    'en' => ['Walls and ceilings smooth plastered', 'Primer and top coats', 'Tidy masking and hand-over'],
                ],
                'is_featured' => false,
            ],
            [
                'slug' => 'floor-wall-tiling-vlaardingen',
                'category_id' => 6, 'location' => 'Vlaardingen', 'duration' => '5 dagen',
                'title' => ['nl' => 'Tegelwerk Vloer & Wand', 'en' => 'Floor & Wall Tiling'],
                'scope_summary' => ['nl' => 'Vloer- en wandtegels', 'en' => 'Floor and wall tiles'],
                'overview' => [
                    'nl' => 'Grote vloer- en wandtegels strak en waterdicht gezet. Egale ondergrond, perfecte uitlijning en verzorgde voegen — een duurzame basis met een luxe afwerking.',
                    'en' => 'Large floor and wall tiles laid crisp and waterproof. A level substrate, perfect alignment and neat grouting — a durable base with a premium finish.',
                ],
                'deliverables' => [
                    'nl' => ['Ondergrond egaliseren en waterdicht maken', 'Vloer- en wandtegels strak zetten', 'Voegen, kitwerk en profielen'],
                    'en' => ['Leveling and waterproofing the substrate', 'Precise floor and wall tiling', 'Grouting, sealant and profiles'],
                ],
                'is_featured' => false,
            ],
        ];

        foreach ($projects as $index => $data) {
            Project::query()->updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'slug' => $data['slug'],
                    'category_id' => $data['category_id'],
                    'location' => $data['location'],
                    'duration' => $data['duration'],
                    'title' => $data['title'],
                    'scope_summary' => $data['scope_summary'],
                    'overview' => $data['overview'],
                    'deliverables' => $data['deliverables'],
                    'sort_order' => $index,
                    'is_featured' => $data['is_featured'],
                    'is_active' => true,
                ]
            );
        }

        $processSteps = [
            ['slug' => 'introduction', 'icon' => 'handshake', 'title' => ['nl' => 'Kennismaking', 'en' => 'Introduction'], 'description' => ['nl' => 'Gratis inspectie en advies op locatie.', 'en' => 'Free on-site inspection and advice.']],
            ['slug' => 'quote', 'icon' => 'file-text', 'title' => ['nl' => 'Offerte', 'en' => 'Quote'], 'description' => ['nl' => 'Heldere, concurrerende prijs zonder verrassingen.', 'en' => 'A clear, competitive price with no surprises.']],
            ['slug' => 'execution', 'icon' => 'hard-hat', 'title' => ['nl' => 'Uitvoering', 'en' => 'Execution'], 'description' => ['nl' => 'Vakkundig, netjes en op tijd — afspraak is afspraak.', 'en' => 'Skilled, tidy and on time — a deal is a deal.']],
            ['slug' => 'hand-over', 'icon' => 'check-circle-2', 'title' => ['nl' => 'Oplevering', 'en' => 'Hand-over'], 'description' => ['nl' => 'Perfecte afwerking en nazorg.', 'en' => 'A perfect finish and aftercare.']],
        ];

        foreach ($processSteps as $index => $data) {
            ProcessStep::query()->updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'slug' => $data['slug'],
                    'icon' => $data['icon'],
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'is_active' => true,
                ]
            );
        }

        $reviews = [
            ['slug' => 'familie-de-vries-bathroom-renovation', 'client_name' => 'Familie de Vries', 'service_label' => ['nl' => 'Badkamerrenovatie', 'en' => 'Bathroom renovation'], 'quote' => ['nl' => 'Strakke planning, top afwerking en altijd bereikbaar. Precies wat beloofd was.', 'en' => 'Tight schedule, great finish and always reachable. Exactly what was promised.'], 'rating' => 5],
            ['slug' => 'm-jansen-electrical', 'client_name' => 'M. Jansen', 'service_label' => ['nl' => 'Elektra', 'en' => 'Electrical'], 'quote' => ['nl' => 'Snel, netjes en volgens de regels. Aanrader voor iedereen die zijn meterkast wil vervangen.', 'en' => 'Fast, tidy and to code. Recommended for anyone replacing their fuse box.'], 'rating' => 5],
            ['slug' => 'r-bakker-full-renovation', 'client_name' => 'R. Bakker', 'service_label' => ['nl' => 'Volledige renovatie', 'en' => 'Full renovation'], 'quote' => ['nl' => 'Van sloop tot oplevering één aanspreekpunt. Dat scheelt enorm veel stress.', 'en' => 'One point of contact from demolition to hand-over. Saves an enormous amount of stress.'], 'rating' => 5],
        ];

        foreach ($reviews as $index => $data) {
            Review::query()->updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'slug' => $data['slug'],
                    'client_name' => $data['client_name'],
                    'service_label' => $data['service_label'],
                    'quote' => $data['quote'],
                    'rating' => $data['rating'],
                    'sort_order' => $index,
                    'is_active' => true,
                ]
            );
        }
    }
}
