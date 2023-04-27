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
        $technologies = ['css', 'html', 'js', 'sass', 'vue', 'sql', 'php', 'laravel'];

        foreach($technologies as $tecnology) {
            $new_tecnology->name = new Technology();
            $new_tecnology->slug = Str::slug($tecnology);
        }
    }
}
