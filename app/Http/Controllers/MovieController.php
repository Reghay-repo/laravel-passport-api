<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $movies = Movie::all();

       return response()->json(['success' => true, 'movies' => $movies]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'title' => ['required'] ,
            'poster' => ['required'] ,
            'imdb_id' => ['required'] ,
            'tmdb_id' =>['required'],
            'allocine_id' =>['required'] ,
            'overview' => ['required'] ,
            'genres' => ['required'] ,
            'original_language' => ['required'] ,
            'original_title' => ['required'] ,
            'runtime' => ['required'],
            'similar' => ['required'] ,
            'by' =>['required'] ,
            'belongs_to_collection' => ['required'] 
        ]);

        $movie = $user->movies()->create([
            'title' => $request->title ,
            'poster' => $request->poster ,
            'imdb_id' => $request->imdb_id ,
            'tmdb_id' => $request->tmdb_id ,
            'allocine_id' => $request->allocine_id ,
            'overview' => $request->overview ,
            'genres' => $request->genres ,
            'original_language' => $request->original_language ,
            'original_title' => $request->original_title ,
            'runtime' => $request->runtime ,
            'similar' => $request->similar ,
            'by' => $request->by ,
            'belongs_to_collection' => $request->belongs_to_collection ,
        ]);

        if (auth()->user()->movies()->save($movie)) {
            return response()->json(['success' => true, 'movie' => $movie]);
            
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post not added'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        if($movie) {
            return response()->json(['movie' => $movie]);
        }
        else {
            
            return response()->json(['error' => 'movie doesn\'t exist']);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        if(! Gate::allows('delete-movie', $movie)) {
            abort(403);
        }
       
           $movie->delete();
           
           return response()->json(['movie' => $movie,'message' => 'movie deleted']);
           
        } else {
            return response()->json(['error' => 'unauthorized']);
        }
        

      
    }
}
