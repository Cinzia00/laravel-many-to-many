<?php

namespace Database\Seeders;

use App\Models\Technology;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technology_ids = Technology::all()->pluck('id')->all();
        $technologies = ['css', 'html', 'js', 'sass', 'vue', 'sql', 'php', 'laravel'];

        foreach($technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->name = $technology;
            $new_technology->slug = Str::slug($technology);
            $new_technology->save();
        }
    }
}
