<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Game;
use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class GameController extends Controller
{
    public function index(Game $game){
        $games = Game::where('category_id', $game->category_id)->where('id', '!=', $game->id)->get();
        $reviews = Review::where('game_id', $game->id)->get();
        if(auth()->user()){
            $cart_status = !Cart::where('user_id', auth()->user()->id)->where('game_id', $game->id)->get()->isEmpty();
            $trans_status = !Transaction::where('user_id', auth()->user()->id)->where('game_id', $game->id)->get()->isEmpty();
        }
        else{
            $cart_status = false;
            $trans_status = false;
        }
       
        $status = Game::withCount([
            'review as recommended_count' => function (Builder $query){
                $query->where('status', 'Recommended');
            }, 
            'review as not_recommended_count' => function (Builder $query){
                $query->where('status', 'Not Recommended');
            }])->where('id', $game->id)->first();

        return view('game.detailGame', [
            'game' => $game,
            'games' => $games,
            'reviews' => $reviews,
            'status' => $status,
            'in_cart' => $cart_status,
            'in_trans' => $trans_status,
            'slides' => explode(',', $game->slides),
            'page' => 'dashboard',
        ]);
    }

    public function search(Request $req){
        $games = Game::where('title', 'LIKE', "%$req->title%")->orderBy('title')->paginate(15);

        return view('main.search', [
            'games' => $games,
            'page' => 'dashboard',
            'keyword' => $req->title,
        ]);
    }

    public function manage(){
        $games = Game::orderBy('title')->paginate(10);

        return view('game.manageGame', [
            'games' => $games,
            'page' => 'admin',
        ]);
    }

    public function add(){
        $categories = Category::all();

        return view('game.addGame', [
            'categories' => $categories,
            'page' => 'admin',
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'title'         => 'required|unique:games',
            'category'      => 'required',
            'price'         => 'required|numeric|min:0',
            'thumbnail'     => 'required|image|mimes:jpg,jpeg,svg,png',
            'slides'        => 'required|min:3', 
            'slides.*'      => 'mimes:jpg,jpeg,svg,png',
            'desc'          => 'required|min:10'
        ],
        [
            'slides.min'     => 'The slides field must contains at least 3 images',
            'slides.*.mimes' => 'The slides must be a file of type: jpg, jpeg, svg, png'
        ]);

        $slides = [];
        $title = Str::title($request->title);
        $slug = Str::slug($request->title);

        $fileSlug = Str::slug($request->title, '_');
        $fileExtension = $request->thumbnail->extension();
        $thumbnailName = $fileSlug.".".$fileExtension;
        $request->thumbnail->storeAs("public/Assets/Image/{$slug}/Thumbnail", $thumbnailName);

        foreach ($request->slides as $key => $slide) {
            $fileExtension = $slide->extension();
            $slideName = $fileSlug."_".($key+1).".".$fileExtension;
            $slide->storeAs("public/Assets/Image/{$slug}/Carousel", $slideName);
            array_push($slides, $slideName);
        }

        $slides = implode(',', $slides);
        
        $game = new Game();
        $game->category_id = $request->category;
        $game->title = $title;
        $game->slug = $slug;
        $game->price = $request->price;
        $game->thumbnail = $thumbnailName;
        $game->slides = $slides;
        $game->description = $request->desc;
		$game->save();

        return redirect()->route('manage-games');
    }

    public function delete(Game $game){
        $game->delete();
        Storage::deleteDirectory("public/Assets/Image/{$game->slug}");

        return redirect()->back();
    }

    public function update(Game $game){
        $categories = Category::all();

        return view('game.updateGame',[
            'game' => $game,
            'categories' => $categories,
            'slides' => explode(',', $game->slides),
            'page' => 'admin',
        ]);
    }

    public function change(Request $request, Game $game){
        $request->validate([
            'title'         => ['required',Rule::unique('games')->ignore($game->id)],
            'category'      => 'required',
            'price'         => 'required|numeric|min:0',
            'thumbnail'     => 'required|image|mimes:jpg,jpeg,svg,png',
            'slides'        => 'required|min:3', 
            'slides.*'      => 'mimes:jpg,jpeg,svg,png',
            'desc'          => 'required|min:10'
        ],
        [
            'slides.min'     => 'The slides field must contains at least 3 images',
            'slides.*.mimes' => 'The slides must be a file of type: jpg, jpeg, svg, png'
        ]);

        $slides = [];
        $slug = Str::slug($request->title);

        Storage::deleteDirectory("public/Assets/Image/{$game->slug}/Carousel");
        Storage::makeDirectory("public/Assets/Image/{$game->slug}/Carousel");

        $fileSlug = Str::slug($request->title, '_');
        $fileExtension = $request->thumbnail->extension();
        $thumbnailName = $fileSlug.".".$fileExtension;
        $request->thumbnail->storeAs("public/Assets/Image/{$slug}/Thumbnail", $thumbnailName);

        foreach ($request->slides as $key => $slide) {
            $fileExtension = $slide->extension();
            $slideName = $fileSlug."_".($key+1).".".$fileExtension;
            $slide->storeAs("public/Assets/Image/{$slug}/Carousel", $slideName);
            array_push($slides, $slideName);
        }

        $slides = implode(',', $slides);
        
        $game->category_id = $request->category;
        $game->title = $request->title;
        $game->slug = $slug;
        $game->price = $request->price;
        $game->thumbnail = $thumbnailName;
        $game->slides = $slides;
        $game->description = $request->desc;
		$game->save();

        return redirect()->route('manage-games');
    }
}
