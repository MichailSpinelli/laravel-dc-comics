<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Comic;

class ComicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comicsData = config('comics');
        //Comic::truncate();
        
        foreach ($comicsData as $key => $singleComic) {
            $comic = new Comic();
            $comic->title = $singleComic['title'];
            $comic->description = $singleComic['description'];
            $comic->thumb = $singleComic['thumb'];

            $replacePrice = str_replace('$', '', $singleComic['price']);
            $comic->price = floatval($replacePrice);

            $comic->series = $singleComic['series'];
            $comic->sale_date = $singleComic['sale_date'];
            $comic->type = $singleComic['type'];

            $comic->artists = json_encode($singleComic['artists']);
            $comic->writers = json_encode($singleComic['writers']);
            
            $comic->save();
        }
    }
}