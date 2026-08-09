<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'slug' => 'badkamers',
                'name' => [
                    'nl' => 'Badkamers',
                    'en' => 'Bathrooms',
                ],
                'sort_order' => 1,
            ],
            [
                'slug' => 'keukens',
                'name' => [
                    'nl' => 'Keukens',
                    'en' => 'Kitchens',
                ],
                'sort_order' => 2,
            ],
            [
                'slug' => 'elektra',
                'name' => [
                    'nl' => 'Elektra',
                    'en' => 'Electrical',
                ],
                'sort_order' => 3,
            ],
            [
                'slug' => 'renovatie',
                'name' => [
                    'nl' => 'Renovatie',
                    'en' => 'Renovations',
                ],
                'sort_order' => 4,
            ],
            [
                'slug' => 'loodgieter',
                'name' => [
                    'nl' => 'Loodgieter',
                    'en' => 'Plumbing',
                ],
                'sort_order' => 5,
            ],
            [
                'slug' => 'stucwerk',
                'name' => [
                    'nl' => 'Stucwerk',
                    'en' => 'Plastering',
                ],
                'sort_order' => 6,
            ],
            [
                'slug' => 'tegelwerk',
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
    }
}
