<?php


namespace Database\Factories;


use App\Models\Template;
use App\Models\TemplateChecklist;
use Illuminate\Database\Eloquent\Factories\Factory;

class TemplateChecklistFactory extends Factory
{

    protected $model = TemplateChecklist::class;

    public function definition()
    {
        return [
            'template_id' => Template::factory(),
            'description' => $this->faker->text,
            'due_unit' => $this->faker->randomElement(['second', 'minute', 'hour', 'day', 'week', 'month', 'year']),
            'due_interval' => $this->faker->numberBetween(0, 60),
        ];
    }
}
