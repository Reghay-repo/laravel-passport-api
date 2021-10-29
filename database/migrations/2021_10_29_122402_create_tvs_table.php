<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tvs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('imdb_id')->nullable();
            $table->string('tmdb_id')->nullable();
            $table->boolean('boxoffice')->default(false);
            $table->boolean('is_anime')->default(false);
            $table->string('slug')->nullable();
            $table->string('original_name')->nullable();
            $table->string('poster')->nullable();
            $table->string('cover')->nullable();
            $table->text('created_by')->nullable();
            $table->string('episode_run_time')->nullable();
            $table->string('first_air_date')->nullable();
            $table->string('last_air_date')->nullable();
            $table->longText('last_episode_to_air')->nullable();
            $table->longText('next_episode_to_air')->nullable();
            $table->text('genres')->nullable();
            $table->string('homepage')->nullable();
            $table->string('original_language')->nullable();
            $table->text('overview')->nullable();
            $table->float('popularity')->nullable();
            $table->text('production_companies_id')->nullable();
            $table->longText('production_countries')->nullable();
            $table->string('spoken_languages')->nullable();
            $table->string('status')->nullable();
            $table->string('tagline')->nullable();
            $table->float('vote_average')->default(0);
            $table->float('vote_count')->default(0);
            $table->longText('videos')->nullable();
            $table->longText('cast_id')->nullable();
            $table->longText('crew_id')->nullable();
            $table->longText('keywords')->nullable();
            $table->LongText('similar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tvs');
    }
}
