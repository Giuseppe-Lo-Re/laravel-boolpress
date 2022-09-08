<?php

use Illuminate\Database\Seeder;
use App\Tag;
use illuminate\Support\Str;

class TagsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Ultima ora',
            'Reportage',
            'Sport',
            'Politica',
            'notizie dal mondo'
        ];

        foreach ($tags as $tag_name) {
            $new_tag = new Tag();
            $new_tag->name = $tag_name;
            $new_tag->slug = Str::slug($tag_name, '-'); // funzione che sostituisce gli spazi con i trattini
            $new_tag->save();
        }
    }
}
