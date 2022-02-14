<?php

use App\Models\Feedback;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feedback::create([
            'name' => "Sayed mansour",
            'message'  => "great work keep it up",
            'avatar_gender'  => "male",
            'status' => 1
        ]);
        Feedback::create([
            'name' => "menna emam",
            'message'  => "بالتوفيق يا بشمهندس",
            'avatar_gender'  => "female",
            'status' => 1
        ]);
        Feedback::create([
            'name' => "محمود بكرى",
            'message'  => "عظمة يا صاحبي",
            'avatar_gender'  => "male",
            'status' => 1
        ]);
    }
}
