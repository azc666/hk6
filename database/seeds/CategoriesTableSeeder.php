<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'cat_name' => 'Business Cards'
            ],
            [
                'cat_name' => 'Letterheads'
            ],
            [
                'cat_name' => 'Envelopes'
            ],
            [
                'cat_name' => 'Corporate'
            ],
            [
                'cat_name' => 'Labels'
            ],
            [
                'cat_name' => 'Note Pads'
            ],
            [
                'cat_name' => 'ARH &quot;Our Process&quot; Brochures'
            ],
            [
                'cat_name' => 'Franchise'
            ],
            [
                'cat_name' => 'Franchise Note Pads'
            ],
            [
                'cat_name' => 'Franchise Business Cards'
            ],
            [
                'cat_name' => 'Franchise Letterheads'
            ],
            [
                'cat_name' => 'Franchise Envelopes'
            ],
            [
                'cat_name' => 'Franchise Crack & Peel Labels'
            ],
        ]);
    }
}

