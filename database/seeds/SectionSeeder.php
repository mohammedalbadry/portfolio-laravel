<?php

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::create([
            'title' => 'header',
            'about' => '================'
        ]);

        Section::create([
            'title' => 'overview',
            'about' => 'I have more than 3 years of experience building web applications for clients all over the world below you can have an overview of my technical skills sets and tool i use, want to find more about my experience !'
        ]);

        Section::create([
            'title' => 'skills',
            'about' => '================'
        ]);

        Section::create([
            'title' => 'testmonials',
            'about' => 'if we already work together, or you have seen my work, you can leave your feedback'
        ]);

        Section::create([
            'title' => 'contact me',
            'about' => '================'
        ]);
    }
}
