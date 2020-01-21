<?php

use Illuminate\Database\Seeder;
use App\PostCategory;

class PostCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post_category = new PostCategory();
        $post_category ->category = 'Mathematics';
        $post_category->save();

        $post_category = new PostCategory();
        $post_category -> category = 'Programming';
        $post_category->save();

        $post_category = new PostCategory();
        $post_category -> category = 'Others';
        $post_category->save();
    }
}
