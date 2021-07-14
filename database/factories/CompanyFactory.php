<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Company::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail(),
            'logo' => 'company.jpg',
            'website' => 'website.com'
        ];
    }
}
