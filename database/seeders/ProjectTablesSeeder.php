<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public Function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $newProject = new Project();
            $newProject->name = $faker->domainName();
            $newProject->slug = Str::slug($newProject->name, '-');
            $newProject->client_name = $faker->company();
            $newProject->summary = $faker->text(400);
            $newProject->save();
        }

    }
}
