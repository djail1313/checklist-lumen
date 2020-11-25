<?php


namespace Database\Factories;


use App\Models\Template;
use App\Models\TemplateItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class TemplateItemFactory extends Factory
{

    protected $model = TemplateItem::class;

    public function definition()
    {
        return [
            'template_id' => Template::factory(),
            'description' => $this->faker->text,
            'due_unit' => $this->faker->randomElement(['second', 'minute', 'hour', 'day', 'week', 'month', 'year']),
            'due_interval' => $this->faker->numberBetween(0, 60),
            'urgency' => $this->faker->numberBetween(0, 10),
        ];
    }
}
