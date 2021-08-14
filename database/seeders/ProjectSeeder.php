<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            ['name' => "Cox's Bazar"],
            ['name' => "Auto Bricks & Kalshi"],
            ['name' => "SASEC II"],
            ['name' => "Kalshi"],
            ['name' => "Asphalt Mohammadpur"],
            ['name' => "Personal"],
            ['name' => "William Derrenger"],
            ['name' => "AML"],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
