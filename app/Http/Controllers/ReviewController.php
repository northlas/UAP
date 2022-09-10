<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;
Use Illuminate\Support\Str;

class ReviewController extends Controller
{
    public function add(Game $game, Request $request){
        $request->validate([
            'flexRadioDefault' => 'required',
            'txtReview' => 'required'
        ],[
            'flexRadioDefault.required' => 'Please choose the review status.',
            'txtReview.required' => 'The review text field is required.'
        ]);

        $review = new Review();
        $review->user_id = auth()->user()->id;
        $review->game_id = $game->id;
        $review->status = $request->flexRadioDefault;
        $review->symbol = Str::slug($request->flexRadioDefault);
        $review->review = trim($request->txtReview);
        $review->save();

        return redirect()->back();
    }
}
