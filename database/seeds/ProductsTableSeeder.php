<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'prod_name' => 'Franchise BC<br>&nbsp;',
                'slug' => 'franchise-bc',
                'prod_layout' => 'fbc',
                'imagePath' => '/assets/bc/thumbs/Franchise BC.jpg',
                'description' => '<strong>"Standard" Business Card </strong><br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Heavy, Uncoated Cover Stock <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;3.5" x 2" <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Full Color, 1-sided <br>',
                'price' => 10
            ],
            [
                'prod_name' => 'Sales Rep BC<br>&nbsp;',
                'slug' => '/assets/bc/thumbs/Sales Rep BC.jpg',
                'prod_layout' => 'srbc',
                'imagePath' => '',
                'description' => '<strong>"Sales Rep" Business Card </strong><br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Heavy, Uncoated Cover Stock <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;3.5" x 2" <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Full Color, 1-sided <br>',
                'price' => 10
            ],
            [
                'prod_name' => 'Photo Sales Rep BC<br>&nbsp;',
                'slug' => '',
                'prod_layout' => 'psrbc',
                'imagePath' => '/assets/bc/thumbs/Photo Sales Rep BC.jpg',
                'description' => '<strong>"Photo" Business Card </strong><br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Heavy, Coated Cover Stock <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;3.5" x 2" <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Full Color, 1-sided <br>',
                'price' => 10
            ],
            [
                'prod_name' => 'Corporate BC',
                'slug' => '',
                'prod_layout' => 'cbc',
                'imagePath' => '/assets/corp/thumbs/Corporate BC.jpg',
                'description' => '',
                'price' => 10
            ],
            [
                'prod_name' => 'Corporate Letterhead',
                'slug' => '',
                'prod_layout' => 'lh',
                'imagePath' => '/assets/corp/thumbs/Corporate Letterhead.jpg',
                'description' => '',
                'price' => 10
            ],
            [
                'prod_name' => 'Corporate Envelope',
                'slug' => '',
                'prod_layout' => 'env',
                'imagePath' => '/assets/corp/thumbs/Corporate Envelope.jpg',
                'description' => '',
                'price' => 10
            ],
            [
                'prod_name' => 'Crack & Peel Label<br>&nbsp;',
                'slug' => '',
                'prod_layout' => 'lbl',
                'imagePath' => '/assets/lbl/thumbs/Crack & Peel Label.jpg',
                'description' => '',
                'price' => 10
            ],
            [
                'prod_name' => 'Franchise Letterhead<br>&nbsp;',
                'slug' => '',
                'prod_layout' => 'lh',
                'imagePath' => '/assets/lh/thumbs/Franchise Letterhead.jpg',
                'description' => '',
                'price' => 10
            ],
            [
                'prod_name' => 'Franchise Envelope<br>&nbsp;',
                'slug' => '',
                'prod_layout' => 'env',
                'imagePath' => '/assets/env/thumbs/Franchise Envelope.jpg',
                'description' => '',
                'price' => 10
            ],
            [
                'prod_name' => 'Franchise BC<br>&nbsp;with 60 Yr. Logo',
                'slug' => '',
                'prod_layout' => 'fbc6',
                'imagePath' => '/assets/bc/thumbs/Franchise BC - 60 Yr. .jpg',
                'description' => '<strong>"Logo" Business Card </strong><br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Heavy, Uncoated Cover Stock <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;3.5" x 2" <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Full Color, 1-sided <br>',
                'price' => 10
            ],
            [
                'prod_name' => 'Sales Rep BC<br>&nbsp;with 60 Yr. Logo',
                'slug' => '',
                'prod_layout' => 'srbc6',
                'imagePath' => '/assets/bc/thumbs/Sales Rep BC - 60 Yr. Logo.jpg',
                'description' => '<strong>"Sales Rep" Business Card  with Logo</strong><br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Heavy, Uncoated Cover Stock <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;3.5" x 2" <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Full Color, 1-sided <br>',
                'price' => 10
            ],
            [
                'prod_name' => 'Photo Sales Rep BC<br>&nbsp;with 60 Yr. Logo',
                'slug' => '',
                'prod_layout' => 'psrbc6',
                'imagePath' => '/assets/bc/thumbs/Photo Sales Rep BC - 60 Yr. Logo.jpg',
                'description' => '<strong>"Photo" Business Card with Logo </strong><br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Heavy, Coated Cover Stock <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;3.5" x 2" <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Full Color, 1-sided <br>',
                'price' => 10
            ],
            [
                'prod_name' => 'Corporate BC - 60 Yr. Logo',
                'slug' => '',
                'prod_layout' => 'bc',
                'imagePath' => '/assets/corp/thumbs/Corporate BC - 60 Yr. Logo.jpg',
                'description' => '',
                'price' => 10
            ],
            [
                'prod_name' => 'Corporate LH - 60 Yr. Logo',
                'slug' => '',
                'prod_layout' => 'lh',
                'imagePath' => '/assets/np/thumbs/Franchise Note Pad.jpg',
                'description' => '',
                'price' => 10
            ],
            [
                'prod_name' => 'Corporate Envelope - 60 Yr. Logo',
                'slug' => '',
                'prod_layout' => 'env',
                'imagePath' => '/assets/np/thumbs/Franchise Note Pad.jpg',
                'description' => '',
                'price' => 10
            ],
            [
                'prod_name' => 'Crack & Peel Label<br>&nbsp;with 60 Yr. Logo',
                'slug' => '',
                'prod_layout' => 'lbl',
                'imagePath' => '',
                'description' => '',
                'price' => 10
            ],
            [
                'prod_name' => 'Franchise Letterhead<br>&nbsp;with 60 Yr. Logo',
                'slug' => '',
                'prod_layout' => 'lh',
                'imagePath' => '/assets/lh/thumbs/Franchise LH - 60 Yr. Logo.jpg',
                'description' => '',
                'price' => 10
            ],
            [
                'prod_name' => 'Franchise Envelope<br>&nbsp;with 60 Yr. Logo',
                'slug' => '',
                'prod_layout' => 'env',
                'imagePath' => '/assets/env/thumbs/Franchise Envelope - 60 Yr. Logo.jpg',
                'description' => '',
                'price' => 10
            ],
            [
                'prod_name' => 'Corporate Note Pad',
                'slug' => '',
                'prod_layout' => 'np',
                'imagePath' => '/assets/np/thumbs/Corporate Note Pad.jpg',
                'description' => '',
                'price' => 10
            ],
            [
                'prod_name' => 'Corporate Note Pad - 60 Yr. Logo',
                'slug' => '',
                'prod_layout' => 'np',
                'imagePath' => '/assets/np/thumbs/Corporate Note Pad - 60 Yr. Logo.jpg',
                'description' => '',
                'price' => 10
            ],
            [
                'prod_name' => 'Franchise Note Pad<br>&nbsp;',
                'slug' => '',
                'prod_layout' => 'np',
                'imagePath' => '/assets/np/thumbs/Franchise Note Pad.jpg',
                'description' => '<strong>Custom Note Pads </strong><br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Text Weight Stock <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;5.5" x 8.5" Pads <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Full Color, 50 sheets per pad <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Heavy Chipboard Backer <br>',
                'price' => 10
            ],
            [
                'prod_name' => 'Franchise Note Pad<br>&nbsp;with 60 Yr. Logo',
                'slug' => '',
                'prod_layout' => 'np',
                'imagePath' => '/assets/np/thumbs/Franchise Note Pad - 60 Yr. Logo.jpg',
                'description' => '<strong>Custom Note Pads with Logo </strong><br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Text Weight Stock <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;5.5" x 8.5" Pads <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Full Color, 50 sheets per pad <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Heavy Chipboard Backer <br>',
                'price' => 10
            ],
            [
                'prod_name' => 'ARH &quot;Our Process&quot; Brochure - Classics',
                'slug' => '',
                'prod_layout' => 'opb',
                'imagePath' => '/assets/opb/thumbs/Classics Plan Collection.jpg',
                'description' => '<strong>"Classics" Version </strong><br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;8 Page Saddle Stitched Brochure <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Glossy Heavy Text Weight Stock <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;8.5" x 11" <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Full Color <br>',
                'price' => 10
            ],
            [
                'prod_name' => 'ARH &quot;Our Process&quot; Brochure - Coastal',
                'slug' => '',
                'prod_layout' => 'opb',
                'imagePath' => '/assets/opb/thumbs/Coastal Plan Collection.jpg',
                'description' => '<strong>"Coastal" Version </strong><br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;8 Page Saddle Stitched Brochure <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Glossy Heavy Text Weight Stock <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;8.5" x 11" <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Full Color <br>',
                'price' => 10
            ],
            [
                'prod_name' => 'ARH &quot;Our Process&quot; Brochure - Mountain',
                'slug' => '',
                'prod_layout' => 'opb',
                'imagePath' => '/assets/opb/thumbs/Mountain Plan Collection.jpg',
                'description' => '<strong>"Mountain" Version </strong><br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;8 Page Saddle Stitched Brochure <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Glossy Heavy Text Weight Stock <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;8.5" x 11" <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Full Color <br>',
                'price' => 10
            ],
            [
                'prod_name' => 'ARH &quot;Our Process&quot; Brochure - Sunbelt',
                'slug' => '',
                'prod_layout' => 'opb',
                'imagePath' => '/assets/opb/thumbs/Sunbelt Plan Collection.jpg',
                'description' => '<strong>"Sunbelt" Version </strong><br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;8 Page Saddle Stitched Brochure <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Glossy Heavy Text Weight Stock <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;8.5" x 11" <br>
                    &nbsp;&nbsp;&nbsp;•&nbsp;Full Color <br>',
                'price' => 10
            ]
        ]);
    }
}

