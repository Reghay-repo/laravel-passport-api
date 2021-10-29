<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tv extends Model
{
    use HasFactory;


    
    protected $fillable = [
        'name',
         'slug',
        'original_name',
        'poster',
        'imdb_id',
         'tmdb_id' ,
        'cover',
        'created_by',
        'episode_run_time',
         'first_air_date',
        'last_air_date',
         'last_episode_to_air',
        'next_episode_to_air',
         'genres', 'homepage',
        'original_language',
         'overview', 'popularity',
        'production_companies_id',
        'production_countries',
         'spoken_languages',
         'status', 'tagline',
        'vote_average',
        ' vote_count',
        'videos',
        'cast_id',
        'crew_id',
        'keywords',
        'similar'
    ];
}
