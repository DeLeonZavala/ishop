<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Subcategory;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            //Celulares y tablets.
            [
                'category_id' => 1,
                'name' => 'Celulares y smartphones',
                'slug' => Str::slug('Celulares y smartphones'),
                'color' => true
            ],
            [
                'category_id' => 1,
                'name' => 'Accesorios para celulares',
                'slug' => Str::slug('Accesorios para celulares')
            ],
            [
                'category_id' => 1,
                'name' => 'Smartwatches',
                'slug' => Str::slug('Smartwatches'),
                'color' => true
            ],
            //TV, audio y video
            [
                'category_id' => 2,
                'name' => 'Smart TVs',
                'slug' => Str::slug('Smart TVs')
            ],
            [
                'category_id' => 2,
                'name' => 'Home theater',
                'slug' => Str::slug('Home theater')
            ],
            [
                'category_id' => 2,
                'name' => 'Reproductores de media',
                'slug' => Str::slug('Reproductores de media')
            ],
            //Consola y videojuegos
            [
                'category_id' => 3,
                'name' => 'Xbox',
                'slug' => Str::slug('Consolas')
            ],
            [
                'category_id' => 3,
                'name' => 'Nintendo',
                'slug' => Str::slug('Nintendo')
            ],
            [
                'category_id' => 3,
                'name' => 'Playstation',
                'slug' => Str::slug('Playstation')
            ],
            //Computacion
            [
                'category_id' => 4,
                'name' => 'Laptops',
                'slug' => Str::slug('Laptops'),
                'color' => true
            ],
            [
                'category_id' => 4,
                'name' => 'Perifericos',
                'slug' => Str::slug('Perifericos')
            ],
            [
                'category_id' => 4,
                'name' => 'Accesorios de computacion',
                'slug' => Str::slug('Accesorios de computacion')
            ],
            //Moda
            [
                'category_id' => 5,
                'name' => 'Hombres',
                'slug' => Str::slug('Hombres'),
                'color' => true,
                'size' => true
            ],
            [
                'category_id' => 5,
                'name' => 'Mujeres',
                'slug' => Str::slug('Mujeres'),
                'color' => true,
                'size' => true
            ],
            [
                'category_id' => 5,
                'name' => 'Niños',
                'slug' => Str::slug('Niños'),
                'color' => true,
                'size' => true
            ],
            [
                'category_id' => 5,
                'name' => 'Accesorios',
                'slug' => Str::slug('Accesorios'),
            ],
        ];

        foreach($subcategories as $subcategory){
            Subcategory::factory(1)->create($subcategory);
        }

    }
}
