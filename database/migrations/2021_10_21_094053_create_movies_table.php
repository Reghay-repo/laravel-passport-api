<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->string('poster');
            $table->string('imdb_id');
            $table->string('tmdb_id');
            $table->string('allocine_id');
            $table->boolean('boxoffice')->nullable()->default(false);
            $table->boolean('trends')->nullable()->default(false);
            $table->string('overview');
            $table->boolean('is_anime')->nullable()->default(false);
            $table->string('videos')->nullable();
            $table->string('belongs_to_collection');
            $table->string('genres');
            $table->string('original_language');
            $table->string('original_title');
            $table->date('release_date')->nullable();
            $table->string('runtime');
            $table->string('similar');
            $table->boolean('populars')->nullable()->default(false);
            $table->string('by');
            $table->boolean('links_json_es')->nullable()->default(false);
            $table->boolean('links_json_en')->nullable()->default(false);
            $table->boolean('links_json_ar')->nullable()->default(false);


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
        Schema::dropIfExists('movies');
    }
}
