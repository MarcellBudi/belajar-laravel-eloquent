<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        {
            $image = new Image();
            $image->url = "https://inspire.ppb.ac.id/wp-content/uploads/2023/07/INSPIRE_page-0001-removebg-preview.png";
            $image->imageable_id = "MARCELL";
            $image->imageable_type = 'customer';
            $image->save();
        }
        {
            $image = new Image();
            $image->url = "https://baturhotspring.com/wp-content/uploads/2023/08/Sunrise-Mount-Batur-Jeep-Adventure-scaled-1-1536x1152.jpg";
            $image->imageable_id = "1";
            $image->imageable_type = 'product';
            $image->save();
        }
    }
}
