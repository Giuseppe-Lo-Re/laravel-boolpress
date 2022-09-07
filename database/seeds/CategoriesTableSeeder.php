<?php

use Illuminate\Database\Seeder;
use App\Category;
use illuminate\Support\Str;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // creo le categorie
        $categories = [
            'Attualità',
            'Cronaca',
            'Politica',
            'Sport',
            'Viaggi'
        ];
        // creo una nuova riga nel database per ogni elemento di $categories 
        foreach($categories as $category_name) {
            $new_category = new Category();
            $new_category->name = $category_name;
            $new_category->slug = Str::slug($category_name, '-');
            $new_category->save();

        }
    }
}
