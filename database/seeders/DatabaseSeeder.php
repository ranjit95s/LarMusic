<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Artist;
use App\Models\User;
use App\Models\Event;
use App\Models\Genre;
use App\Models\Venue;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(1)->create();

        \App\Models\User::factory()->create([
            'name' => 'Minato Namikaze',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password')
        ]);

        $gs = [
            ['id' => 1, 'name' => 'Rock'],
            ['id' => 2, 'name' => 'Pop'],
            ['id' => 3, 'name' => 'Jazz'],
            ['id' => 4, 'name' => 'Blues'],
            ['id' => 5, 'name' => 'Traditional'],
            ['id' => 6, 'name' => 'EDM'],
        ];
        $as = [
            ['id' => 1, 'name' => 'Raghu Dixit'],
            ['id' => 2, 'name' => 'Nucleya'],
            ['id' => 3, 'name' => 'Ritviz'],
            ['id' => 4, 'name' => 'Nirali Kartik'],
        ];
        $vs = [
            ['id' => 1, 'name' => 'Asiatic library steps', 'address' => 'Mumbai', 'contact' => '9877744125'],
            ['id' => 2, 'name' => 'JIO Garden', 'address' => 'Mumbai', 'contact' => '9877744125'],
            ['id' => 3, 'name' => 'Grease Monkey', 'address' => 'Mumbai', 'contact' => '9877744125'],
        ];
        // 	id	artist_Name	image	gerne	shortDesc	amount	date	venue
        $es = [
            ['id' => '1', 'artist_Name' => 'Raghu Dixit', 'image' => 'image/3.jpg', 'gerne' => 'Pop,EDM,Rock,Blues', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2024-12-25', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '2', 'artist_Name' => 'Nucleya', 'image' => 'image/1.jpg', 'gerne' => 'Pop,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2022-12-14', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '3', 'artist_Name' => 'Raghu Dixit', 'image' => 'image/3.jpg', 'gerne' => 'Pop,EDM,Rock,Blues', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2024-12-25', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '4', 'artist_Name' => 'Nucleya', 'image' => 'image/1.jpg', 'gerne' => 'Pop,EDM,Rock,Blues', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2022-12-14', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '5', 'artist_Name' => 'Raghu Dixit', 'image' => 'image/2.jpg', 'gerne' => 'Pop,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2024-12-25', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '6', 'artist_Name' => 'Nucleya', 'image' => 'image/1.jpg', 'gerne' => 'Pop,Jazz,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2022-12-14', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '7', 'artist_Name' => 'Nirali Kartik', 'image' => 'image/6.jpg', 'gerne' => 'Pop,EDM,Rock,Blues', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2022-12-14', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '8', 'artist_Name' => 'Nucleya', 'image' => 'image/5.jpg', 'gerne' => 'Pop,Jazz,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2024-12-25', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '9', 'artist_Name' => 'Ritviz', 'image' => 'image/2.jpg', 'gerne' => 'Pop,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2022-12-14', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '10', 'artist_Name' => 'Nirali Kartik', 'image' => 'image/4.jpg', 'gerne' => 'Pop,EDM,Rock,Blues', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2024-12-25', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '11', 'artist_Name' => 'Ritviz', 'image' => 'image/3.jpg', 'gerne' => 'Pop,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2022-12-14', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '12', 'artist_Name' => 'Nucleya', 'image' => 'image/4.jpg', 'gerne' => 'Pop,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2022-12-14', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '13', 'artist_Name' => 'Nucleya', 'image' => 'image/6.jpg', 'gerne' => 'Pop,EDM,Rock,Blues', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2024-12-25', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '14', 'artist_Name' => 'Ritviz', 'image' => 'image/4.jpg', 'gerne' => 'Pop,Jazz,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2022-12-14', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '15', 'artist_Name' => 'Nucleya', 'image' => 'image/7.jpg', 'gerne' => 'Pop,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2026-10-05', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '16', 'artist_Name' => 'Nirali Kartik', 'image' => 'image/4.jpg', 'gerne' => 'Pop,EDM,Rock,Blues', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2026-10-05', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '17', 'artist_Name' => 'Ritviz', 'image' => 'image/1.jpg', 'gerne' => 'Pop,Jazz,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2022-12-14', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '18', 'artist_Name' => 'Nucleya', 'image' => 'image/4.jpg', 'gerne' => 'Pop,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2026-10-05', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '19', 'artist_Name' => 'Nirali Kartik', 'image' => 'image/7.jpg', 'gerne' => 'Pop,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2022-12-14', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '20', 'artist_Name' => 'Ritviz', 'image' => 'image/6.jpg', 'gerne' => 'Pop,Jazz,EDM,Rock,Blues', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2022-12-14', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '21', 'artist_Name' => 'Nucleya', 'image' => 'image/4.jpg', 'gerne' => 'Pop,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2026-10-05', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '22', 'artist_Name' => 'Nirali Kartik', 'image' => 'image/5.jpg', 'gerne' => 'Pop,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2022-12-14', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '23', 'artist_Name' => 'Ritviz', 'image' => 'image/4.jpg', 'gerne' => 'Pop,Jazz,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2026-10-05', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '24', 'artist_Name' => 'Nucleya', 'image' => 'image/5.jpg', 'gerne' => 'Pop,EDM,Rock,Blues', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2022-12-14', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '25', 'artist_Name' => 'Nirali Kartik', 'image' => 'image/6.jpg', 'gerne' => 'Pop,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2026-10-05', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '26', 'artist_Name' => 'Nucleya', 'image' => 'image/7.jpg', 'gerne' => 'Pop,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2022-12-14', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '27', 'artist_Name' => 'Nucleya', 'image' => 'image/5.jpg', 'gerne' => 'Pop,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2026-10-05', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '28', 'artist_Name' => 'Nirali Kartik', 'image' => 'image/1.jpg', 'gerne' => 'Pop,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2022-12-14', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '29', 'artist_Name' => 'Nucleya', 'image' => 'image/6.jpg', 'gerne' => 'Pop,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2022-12-14', 'venue' => 'JIO Garden, Mumbai, 52'],
            ['id' => '30', 'artist_Name' => 'Nirali Kartik', 'image' => 'image/5.jpg', 'gerne' => 'Pop,EDM,Rock', 'shortDesc' => 'genjutsu master', 'amount' => '24000', 'date' => '2022-12-14', 'venue' => 'JIO Garden, Mumbai, 52'],
        ];

        foreach ($gs as $g) {
            Genre::create($g);
        }
        foreach ($as as $a) {
            Artist::create($a);
        }
        foreach ($vs as $v) {
            Venue::create($v);
        }
        foreach ($es as $e) {
            Event::create($e);
        }
    }
}
