<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = "Shooter";
        $category->save();

        $category = new Category();
        $category->name = "Open World";
        $category->save();

        $category = new Category();
        $category->name = "Sports";
        $category->save();

        $category = new Category();
        $category->name = "Card Game";
        $category->save();

        $category = new Category();
        $category->name = "Horror";
        $category->save();

        $categories = Category::all();
        foreach ($categories as $item) {
            $item->slug = Str::slug($item->name, '-');
            $item->save();
        }
    }
}
