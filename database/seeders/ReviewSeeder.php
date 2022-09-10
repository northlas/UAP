<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $review = new Review();
        $review->user_id = 2;
        $review->game_id = 1;
        $review->status = "Recommended";
        $review->review = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit delectus sapiente, culpa totam amet natus dolorem ex, aperiam earum modi quod nisi asperiores, aliquid odio quo quos quisquam doloribus ea?";
        $review->save();

        $review = new Review();
        $review->user_id = 2;
        $review->game_id = 2;
        $review->status = "Recommended";
        $review->review = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit delectus sapiente, culpa totam amet natus dolorem ex, aperiam earum modi quod nisi asperiores, aliquid odio quo quos quisquam doloribus ea?";
        $review->save();

        $review = new Review();
        $review->user_id = 3;
        $review->game_id = 1;
        $review->status = "Recommended";
        $review->review = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit delectus sapiente, culpa totam amet natus dolorem ex, aperiam earum modi quod nisi asperiores, aliquid odio quo quos quisquam doloribus ea?";
        $review->save();

        $review = new Review();
        $review->user_id = 3;
        $review->game_id = 2;
        $review->status = "Not Recommended";
        $review->review = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit delectus sapiente, culpa totam amet natus dolorem ex, aperiam earum modi quod nisi asperiores, aliquid odio quo quos quisquam doloribus ea?";
        $review->save();

        $reviews = Review::all();
        foreach ($reviews as $item) {
            $item->symbol = Str::slug($item->status, '-');
            $item->save();
        }
    }
}
