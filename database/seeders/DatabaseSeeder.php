<?php

namespace Database\Seeders;

use App\Models\Partners\Seller;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->command->info("Seeding:");

        $this->command->info("\t Users:");
        User::Factory(30)->create();

        $this->command->info("\t Sellers:");
        Seller::Factory(30)->create();
    }
}
