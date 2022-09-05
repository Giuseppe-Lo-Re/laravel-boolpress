<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker )
    {
        for($i = 0; $i < 10; $i++) {
            $new_post = New post();
            $new_post->title = ucfirst($faker->words(rand(5,10), true)); //genera da 5 a 10 parole random con prima lettera maiuscola
            $new_post->content = $faker->paragraphs(rand(5,10), true); //genera da 5 a 10 paragrafi random 
            $new_post->slug = Str::slug($new_post->title, '-'); // funzione che sostituisce gli spazi con i trattini
            $new_post->save();
        }
    }
}
