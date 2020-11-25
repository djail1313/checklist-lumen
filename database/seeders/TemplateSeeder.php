<?php


namespace Database\Seeders;


use App\Models\Template;
use App\Models\TemplateChecklist;
use App\Models\TemplateItem;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Template::factory()->count(500)->has(
            TemplateChecklist::factory()->count(1),
            'checklist'
        )->has(
            TemplateItem::factory()->count($faker->numberBetween(1, 100)),
            'items'
        )->create();
    }

}
