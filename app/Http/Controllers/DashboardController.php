<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index(){        
        $featured_games = Game::withCount([
            'review as recommended_count' => function (Builder $query){
                $query->where('status', 'Recommended');
            }
        ])->orderBy('recommended_count', 'desc')->get();

        $hot_games = Game::withCount([
            'transaction as transaction_count' => function (Builder $query){
                $query->whereDate('created_at', '>=', Carbon::now()->subDays(7));
            }
        ])->orderBy('transaction_count', 'desc')->get();

        return view('main.dashboard', [
            'featured_games' => $featured_games,
            'hot_games' => $hot_games,
            'page' => 'dashboard',
        ]);
    }
}
