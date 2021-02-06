<?php

namespace Database\Factories;

use App\Models\Deliveryman;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class DeliverymanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Deliveryman::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'salary' => $this->faker->randomElement([900, 1000, 1100]),
            'state' => $this->faker->boolean,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];
    }
}
