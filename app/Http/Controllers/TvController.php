<?php

namespace App\Http\Controllers;

use App\Models\Tv;
use Illuminate\Http\Request;

class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tvs = Tv::all();
        return response()->json(['message' => 'success', 'tvs' => $tvs]);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => ['required', 'unique:tvs'],
            'imdb_id' => ['required', 'unique:tvs'],
            'tmdb_id' => ['required', 'unique:tvs'],
        ]);
        
        Tv::create($request->all());
       $tv = Tv::create($request->all());
          return response()->json(['message' => 'tv show created', 'tv' => $tv]);
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tv  $tv
     * @return \Illuminate\Http\Response
     */
    public function show(Tv $tv)
    {
        return response()->json([
            'success' =>true,
            'tv' => $tv
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tv  $tv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tv $tv)
    {
        $request->validate([
            'name' => ['required', 'unique:tvs'],
            'imdb_id' => ['required', 'unique:tvs'],
            'tmdb_id' => ['required', 'unique:tvs']
        ]);

        $tv->update([
            'name' => $request->name,
            'imdb_id' => $request->imdb_id,
            'tmdb_id' => $request->tmdb_id
        ]);
        return response()->json([
            'message' => 'updated',
            'tv updated' => $tv
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tv  $tv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tv $tv)
    {
        $tv->delete();

        return response()->json(
            [
                'message' => 'success! tv show deleted',
                'tv' => $tv
            ]
            );
    }
}
