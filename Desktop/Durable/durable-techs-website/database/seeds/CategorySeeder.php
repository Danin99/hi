<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $categoryData = [
            // 1 (Laptop)
            [
                'name' => 'Lenovo',
                'slug' => 'lenovo',
                'thumbnail' => 'images/lenovo.jpeg',
            ],
            // 2
            [
                'name' => 'MSI',
                'slug' => 'msi',
                'thumbnail' => 'images/MSI.jpeg',
            ],
            // 3
            [
                'name' => 'ASUS',
                'slug' => 'asus',
                'thumbnail' => 'images/ASUS.jpeg',
            ],
            // 4
            [
                'name' => 'MacBook',
                'slug' => 'macbook',
                'thumbnail' => 'images/mac.jpeg',
            ],
            // 5
            [
                'name' => 'Microsoft Surface',
                'slug' => 'microsoft-surface',
                'thumbnail' => 'images/surface.png',
            ],
            // 6
            [
                'name' => 'DeskTop',
                'slug' => 'desktop',
                'thumbnail' => 'images/desktop.png',
            ],
            // 7 (Projector)
            [
                'name' => 'Panasonic Projector',
                'slug' => 'panasonic',
                'thumbnail' => 'images/panasonic.png',
            ],
            // 8
            [
                'name' => 'EPSON Projector',
                'slug' => 'epson',
                'thumbnail' => 'images/epson.jpeg',
            ],
            // 9
            [
                'name' => 'ASUS Projector',
                'slug' => 'asus-projector',
                'thumbnail' => 'images/asus.pro.jpeg',
            ],
            // 10
            [
                'name' => 'Projector Screen',
                'slug' => 'projector-screen',
                'thumbnail' => 'images/screen.pro.jpeg',
            ],
            // 11
            [
                'name' => 'LCD Projector Screen',
                'slug' => 'lcd-projector-screen',
                'thumbnail' => 'images/LCD.pro.jpeg',
            ],
            // 12
            [
                'name' => 'VGA Converter',
                'slug' => 'vga-converter',
                'thumbnail' => 'images/VGA con.png',
            ],
            // 13 (Docking Station)
            [
                'name' => 'DELL Docking',
                'slug' => 'dell-docking',
                'thumbnail' => 'images/dell.dock.png',
            ],
            // 14
            [
                'name' => 'Targus Dockig',
                'slug' => 'targus-docking',
                'thumbnail' => 'images/targus.dock.png',
            ],
            // 15
            [
                'name' => 'DELL 7-in-1 docking',
                'slug' => 'dell-7in1',
                'thumbnail' => 'images/Dell 7-in-1.jpeg',
            ],
            // 16
            [
                'name' => 'Anker USB-C Docking',
                'slug' => 'anker-usb-c',
                'thumbnail' => 'images/Anker.chub.png',
            ],
            // 17 (connector)
            [
                'name' => 'Cable',
                'slug' => 'cable',
                'thumbnail' => 'images/cable.jpeg',
            ],
            // 18
            [
                'name' => 'Cable Deconn',
                'slug' => 'cable-deconn',
                'thumbnail' => 'images/cabledeconn.jpeg',
            ],
            // 19
            [
                'name' => 'Lenovo Connector',
                'slug' => 'lenovo-connector',
                'thumbnail' => 'images/lenovo-con.png',
            ],
            // 20
            [
                'name' => 'Delock Connector',
                'slug' => 'Delock-connector',
                'thumbnail' => 'images/delock.jpeg',
            ],
            // 21
            [
                'name' => 'Thunderbolt',
                'slug' => 'Thunderbolt',
                'thumbnail' => 'images/Thunderbolt .jpg',
            ],
            // 22 (cable)
            [
                'name' => 'Meki HDMI Cable',
                'slug' => 'meki',
                'thumbnail' => 'images/meki.png',
            ],
            // 23
            [
                'name' => 'DTECH Cable',
                'slug' => 'dtech',
                'thumbnail' => 'images/dtech.png',
            ],
            // 24
            [
                'name' => 'DVI Monitor Cable',
                'slug' => 'dvi',
                'thumbnail' => 'images/dvi.png',
            ],
            // 25
            [
                'name' => 'Optical Fiber Cable',
                'slug' => 'fiber-cable',
                'thumbnail' => 'images/fiber cable.jpeg',
            ],
            // 26
            [
                'name' => 'NoteBook Cable',
                'slug' => 'notebook-cable',
                'thumbnail' => 'images/notebook.cab.jpg',
            ],
            // 27
            [
                'name' => 'Serial Cable',
                'slug' => 'serial-cable',
                'thumbnail' => 'images/serial cable.jpeg',
            ],
            // 28
            [
                'name' => 'Network Cable',
                'slug' => 'network-cable',
                'thumbnail' => 'images/network-cab.jpeg',
            ],
            // 29 (audio-visual)
            [
                'name' => 'Speaker',
                'slug' => 'speaker',
                'thumbnail' => 'images/speaker.png',
            ],
            // 30
            [
                'name' => 'Headphone',
                'slug' => 'headphone',
                'thumbnail' => 'images/headphone.webp',
            ],
            // 31
            [
                'name' => 'Microphone',
                'slug' => 'microphone',
                'thumbnail' => 'images/Microphone.jpeg',
            ],
            // 32
            [
                'name' => 'Voice Recorder',
                'slug' => 'voice-recorder',
                'thumbnail' => 'images/voice-record.png',
            ],
        ];

        // Category::truncate();


        // Create the categories
        foreach ($categoryData as $data) {
            Category::create([
                'name' => $data['name'],
                'slug' => $data['slug'],
                'thumbnail' => $data['thumbnail'],
            ]);
        }
    }
}
