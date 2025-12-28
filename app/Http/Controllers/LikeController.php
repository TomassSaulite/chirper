<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirp;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LikeController extends Controller
{
    use AuthorizesRequests;
    /**
     * Handle the incoming request.
     */
    public function store(Request $request, Chirp $chirp)
    {
        $like = auth()->user()->likes()->where('chirp_id', $chirp->id)->first();

        if (!$like) {
            // Create a new like
            auth()->user()->likes()->create([
                'chirp_id' => $chirp->id,
            ]);

            $chirp->timestamps = false;
            $chirp->increment('likes');

            return redirect('/')->with('success', 'Chirp liked!');
        }

        // Unlike the chirp
        $like->delete();

        $chirp->timestamps = false;
        $chirp->decrement('likes');

        return redirect('/')->with('info', 'Chirp unliked!');
    }
}
