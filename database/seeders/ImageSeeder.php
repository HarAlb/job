<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date('Y-m-d H:i:s');
        \DB::table('images')->insert([
            [
                'user_id'    => 1,
                'path'       => 'default/photo-girl.svg',
                'alt'        => 'Girl Photo',
                'slider'     => 1,
                'created_at' => $date,
                'updated_at' => $date 
            ],
            [
                'user_id'    => 1,
                'path'       => 'default/photo-girl-palaroid.svg',
                'alt'        => 'Palaroid Picture',
                'slider'     => 1,
                'created_at' => $date,
                'updated_at' => $date 
            ],
            [
                'user_id'    => 1,
                'path'       => 'default/optional-image-resizing.svg',
                'alt'        => 'Image Resizing',
                'slider'     => 1,
                'created_at' => $date,
                'updated_at' => $date 
            ]
        ]);
    }
}
