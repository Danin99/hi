<?php

use App\Models\Menu;
use App\Models\MenuHasCategory;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menuData = [
            [
                'name' => 'Computers',
                'categoryIds' => [1, 2, 3, 4, 6, 5],
            ],
            [
                'name' => 'Projector',
                'categoryIds' => [7, 8, 9, 10, 11, 12],
            ],
            [
                'name' => 'Docking Station',
                'categoryIds' => [13, 14, 15, 16],
            ],
            [
                'name' => 'Connector',
                'categoryIds' => [18, 19, 20, 21],
            ],
            [
                'name' => 'Drone & Camcoders',
                'categoryIds' => [17, 22, 23, 24, 25, 26, 27, 28],
            ],
            [
                'name' => 'Cables',
                'categoryIds' => [17, 22, 23, 24, 25, 26, 27, 28],
            ],
            [
                'name' => 'Audio-Visual',
                'categoryIds' => [29, 30, 31, 32,],
            ],
            [
                'name' => 'Software',
                'categoryIds' => [3, 5],
            ],
            [
                'name' => 'Survalliance',
                'categoryIds' => [3, 5],
            ],
            [
                'name' => 'Clearance',
                'categoryIds' => [3, 5],
            ],
            [
                'name' => 'Special Education',
                'categoryIds' => [3, 5],
            ],
        ];

        // Menu::truncate();
        // MenuHasCategory::truncate();

        foreach ($menuData as $data) {
            $menu = Menu::create([
                'name' => $data['name'],
            ]);

            // Associate the categories with the menu
            $menu->categories()->attach($data['categoryIds']);
        }
    }
}
