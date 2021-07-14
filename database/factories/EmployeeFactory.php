<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Employee::class;

    /**
     * @return int
     */
    private function companyId(): int
    {
        return \App\Models\Company::all()->random(1)->first()->id;
    }

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'company_id' => $this->companyId()
        ];
    }
}
