<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Infrastructure\User\Eloquent\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         User::factory(10)->create();
//
//         User::factory()->create([
//             'name' => 'Test App\Domain\IdentityAccess\User\Entities\User',
//             'email' => 'test@example.com',
//         ]);
        $this->call([
            ProductsTableSeeder::class,
            // Other table seeders
        ]);

    }
}
