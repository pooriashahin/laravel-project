<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MongoListing;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Listings;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'me7@yahoo.com'
        ]);
//        MongoListing::factory(5000)->create([
//            'user_id' => $user->id
//        ]);
        Listings::factory(500)->create([
            'user_id' => $user->id
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
