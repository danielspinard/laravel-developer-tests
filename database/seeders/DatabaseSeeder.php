<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        \App\Models\Company::factory(5)->create();
        \App\Models\Employee::factory(50)->create();

        $this->call([
            UserSeeder::class
        ]);
    }
}
