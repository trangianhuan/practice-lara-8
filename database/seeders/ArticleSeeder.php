<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = Category::all()->pluck('id');
        for ($i=0; $i < 1000000; $i++) {
            Article::factory([
                'category_id' => $ids->random(),
            ])->create();
        }
    }
}
