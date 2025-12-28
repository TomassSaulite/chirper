<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Chirp;
use Illuminate\Database\Seeder;

class ChirpSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 users
        $users = User::factory()->count(10)->create();

        // Sample chirp messages
        $messages = [
            'Just discovered Laravel - where has this been all my life? 🚀',
            'Building something cool with Chirper today!',
            'Laravel\'s Eloquent ORM is pure magic ✨',
            'Deployed my first app with Laravel Cloud. So smooth!',
            'Who else is loving Blade components?',
            'Friday deploys with Laravel? No problem! 😎',
            'Testing some new features today!',
            'Refactoring my code like a pro 💪',
            'Database migrations are fun, right?',
            'Debugging till midnight... again 😅'
        ];

        // Create 50 chirps randomly assigned to users
        for ($i = 0; $i < 50; $i++) {
            $user = $users->random();
            $createdAt = now()->subDays(rand(0, 6))->subMinutes(rand(0, 1440));

            $chirp = $user->chirps()->create([
                'message' => "Sample chirp #$i by {$user->name}",
                'created_at' => $createdAt,
                'updated_at' => $createdAt, // ensures "edited" does not appear
                'likes' => rand(0, 20),    // random like count
            ]);

            // Optionally attach random likes
            for ($j = 0; $j < $chirp->likes; $j++) {
                $likeUser = $users->random();
                $likeUser->likes()->firstOrCreate([
                    'chirp_id' => $chirp->id,
                ]);
            }
        }
    }
}