<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $arr = ["Witch Of The Light", "Descendant Without Hate", "Heroes Of Fortune", "Snakes Without Shame", "Agents And Gods", "Invaders And Girls", "Name Of Rainbows", "Fruit Without Faith", "Question My Destiny", "Altering My Destiny"];
            Book::create([
                "unique_book_id" => '#'.time().$i,
                "book_name" => $arr[$i],
                "book_image" => 'https://placeimg.com/100/100/book?' . rand(1, 100)
            ]);
        }
    }
}
