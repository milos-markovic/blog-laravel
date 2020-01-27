<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat1 = ['name' => 'Music'];

        $cat2 = ['name' => 'Film'];

        $cat3 = ['name' => 'Sport'];


        $category1 = Category::create($cat1);

        $category2 = Category::create($cat2);

        $category3 = Category::create($cat3);
    }
}
