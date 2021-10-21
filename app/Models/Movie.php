<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title','poster','imdb_id','tmdb_id','allocine_id','boxoffice','trends','overview','is_anime','videos','belongs_to_collection','genres','original_language','original_title','release_date','runtime','similar','by','links_json_es','links_json_en','links_json_ar'];

    /**
     * Get the user that owns the Movie
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
