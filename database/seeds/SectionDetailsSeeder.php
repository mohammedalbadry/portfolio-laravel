<?php

use App\Models\SectionDetails;
use Illuminate\Database\Seeder;

class SectionDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SectionDetails::create([
            'section_id' => 1,
            'title' => "full stack developer",
            'prop_name' => "================",
            'prop_value' => "designing and programming websites compatible with the latest standards and search engines",
            'options' => json_encode([
                'background' => 'http://localhost:8000/portfolio/public/storage/files/1/header.png?timestamp=1634871079'
            ])
        ]);

        SectionDetails::create([
            'section_id' => 2,
            'title' => "================",
            'prop_name' => "================",
            'prop_value' => "================",
            'options' => json_encode([
                'cv' => 'http://localhost:8000/portfolio/public/storage/files/1/mohammed-albadry-CV.pdf'
            ])
        ]);

        SectionDetails::create([
            'section_id' => 3,
            'title' => "front end",
            'prop_name' => "================",
            'prop_value' => "fas fa-code",
            'options' => json_encode([
                'one' => 'html5',
                'two' => 'css3',
                'three' => 'bootstrap',
                'four' => 'js-jq',
            ])
        ]);

        SectionDetails::create([
            'section_id' => 3,
            'title' => "back end",
            'prop_name' => "================",
            'prop_value' => "fas fa-database",
            'options' => json_encode([
                'one' => 'php',
                'two' => 'mysql',
                'three' => 'laravel',
            ])
        ]);

        SectionDetails::create([
            'section_id' => 3,
            'title' => "other",
            'prop_name' => "================",
            'prop_value' => "fas fa-globe",
            'options' => json_encode([
                'one' => 'git',
                'two' => 'json',
                'three' => 'ajax',
                'four' => 'seo',
            ])
        ]);

        SectionDetails::create([
            'section_id' => 5,
            'title' => "send message",
            'prop_name' => "================",
            'prop_value' => "let me know more about you",
        ]);

        SectionDetails::create([
            'section_id' => 5,
            'title' => "contact information",
            'prop_name' => "address",
            'prop_value' => "El Manzala, Dakahlia, Egypt",
            'options' => json_encode([
                'icon' => 'fas fa-map-marker-alt'
            ])
        ]);

        SectionDetails::create([
            'section_id' => 5,
            'title' => "contact information",
            'prop_name' => "phone",
            'prop_value' => "01095840260",
            'options' => json_encode([
                'icon' => 'fas fa-phone-alt'
            ])
        ]);

        SectionDetails::create([
            'section_id' => 5,
            'title' => "contact information",
            'prop_name' => "mail",
            'prop_value' => "mohammed.albadry.dev@gmail.com",
            'options' => json_encode([
                'icon' => 'fas fa-envelope'
            ])
        ]);

        SectionDetails::create([
            'section_id' => 5,
            'title' => "follow me",
            'prop_name' => "facebook",
            'prop_value' => "https://www.facebook.com/mohammed.elbadry.dev",
            'options' => json_encode([
                'icon' => 'fab fa-facebook-f',
                'color' => '#1877F2',
            ])
        ]);

        SectionDetails::create([
            'section_id' => 5,
            'title' => "follow me",
            'prop_name' => "linkedin",
            'prop_value' => "https://www.linkedin.com/in/mohammed-albadry-dev",
            'options' => json_encode([
                'icon' => 'fab fa-linkedin-in',
                'color' => '#0A66C2',
            ])
        ]);
    }
}
