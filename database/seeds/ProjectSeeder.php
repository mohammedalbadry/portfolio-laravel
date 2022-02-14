<?php

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'title' => 'title',
            'job_title' => 'front end',
            'details' => '<p><strong><span style="font-size:24px">responsive multipage design for sports websites Short and fast codes that are responsive to all devices and screens</span></strong></p>

            <p><span style="font-size:24px"><strong>pages :-</strong></span></p>
            
            <div>
            <p><span style="font-size:24px"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; home (</strong> It contains an overview of each section in an aesthetic way <strong>)</strong></span></p>
            
            <p><span style="font-size:24px"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; about</strong> <strong>(</strong> It contains an overview of each section in an aesthetic way <strong>)</strong></span></p>
            
            <p><span style="font-size:24px"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; contact</strong> <strong>(</strong> It contains an overview of each section in an aesthetic way <strong>)</strong></span></p>
            
            <p><span style="font-size:24px"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; news</strong> <strong>(</strong> It contains an overview of each section in an aesthetic way <strong>)</strong></span></p>
            
            <p><span style="font-size:24px"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; services</strong> <strong>(</strong> It contains an overview of each section in an aesthetic way )</span></p>
            
            <p>&nbsp;</p>
            
            <h1><strong>Main Features</strong></h1>
            
            <p>&nbsp;&nbsp;<span style="font-size:24px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; easy to use </span></p>
            
            <p><span style="font-size:24px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; full responseve </span></p>
            
            <p><span style="font-size:24px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; support all divice</span></p>
            
            <p>&nbsp;</p>
            
            <h1 style="text-align:left"><strong>Languages ​​and technologies used</strong></h1>
            
            <p><span style="font-size:22px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; HTML - CSS - bootstrap - js </span></p>
            
            <p>&nbsp;</p>
            
            <p style="text-align:center"><a class="simple-button-plugin" href="" style="display:inline-block;background-color:#27AE61;border:1px solid #27AE61;color:#fff !important;padding:5px 10px;border-radius:5px;font-size:14px;text-decoration: none !important; cursor: pointer;" target="_blank">ONE</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="simple-button-plugin" href="" style="display: inline-block; background-color: rgb(1, 187, 212); border: 1px solid rgb(1, 187, 212); color: rgb(255, 255, 255) !important; padding: 5px 10px; border-radius: 5px; font-size: 14px; text-decoration: none !important; cursor: pointer;" target="_blank">TWO</a></p>
            
            <p>&nbsp;</p>
            </div>
            ',
            'img'  => '1642012552UntAitled.png',
        ]);
    }
}
