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
     * @param string $name
     * @return string
     */
    private function companyWebsite(string $name): string
    {
        return strtolower(explode(' ', $name)[1]) . '.com';
    }

    /**
     * @return array
     */
    public function definition(): array
    {
        $name = $this->faker->name();

        return [
            'name' => $name,
            'address' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail(),
            'logo' => 'company.jpg',
            'website' => $this->companyWebsite($name)
        ];
    }
}
