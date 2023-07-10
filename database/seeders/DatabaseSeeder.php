<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\UrlShortener;
use App\models\UrlShortenerAnalytics;
use Redirect;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'test1234',
        ]);

        $websitesArray = ['https://www.google.com/', 'https://twitter.com', 'https://www.twitch.tv/', 'https://www.facebook.com/', 'https://github.com/', 'https://www.youtube.com/'];
        foreach ($websitesArray as $website) {           
      
            $urlShortener = UrlShortener::create([
                'user_id' => $user->id,
                'url' => $website,
                'string' =>  \Str::random(15),
                'custom_alias' => null
            ]);

            $randomNumerOfUses = rand(5, 10);            
            for ($i=0; $i < $randomNumerOfUses; $i++) { 
                UrlShortenerAnalytics::create([
                    'url_shortener_id' => $urlShortener->id,
                    'created_at' =>  Carbon::now()->subDays(rand(1, 7)),
                    'updated_at' =>  Carbon::now()->subDays(rand(1, 7))
                ]);
            }

            $randomNumerOfUses = rand(10, 30);            
            for ($i=0; $i < $randomNumerOfUses; $i++) { 
                UrlShortenerAnalytics::create([
                    'url_shortener_id' => $urlShortener->id,
                    'created_at' =>  Carbon::now()->subDays(rand(1, 30)),
                    'updated_at' =>  Carbon::now()->subDays(rand(1, 30)),
                ]);
            }

            $randomNumerOfUses = rand(10, 30);            
            for ($i=0; $i < $randomNumerOfUses; $i++) { 
                UrlShortenerAnalytics::create([
                    'url_shortener_id' => $urlShortener->id,
                    'created_at' =>  Carbon::now()->subDays(rand(1, 365)),
                    'updated_at' =>  Carbon::now()->subDays(rand(1, 365)),
                ]);
            }
        }   

    }
}
