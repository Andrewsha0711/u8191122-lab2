<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::all();
        Article::all()->each(function ($article) use ($tags) {
            // $article->tags()
            //     ->attach(array_rand($tags->toArray(), rand(1, 5)));
            $number_of_tags = rand(0, 5);
            if($number_of_tags != 0){
                $article->tags()->attach(
                    $tags->random($number_of_tags)->pluck('id')->toArray());
            }
        });
    }
}
