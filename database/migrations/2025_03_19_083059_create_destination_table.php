<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('country')->nullable();
            $table->text('city')->nullable();
            $table->string('visa')->nullable();
            $table->string('language')->nullable();
            $table->string('currency')->nullable();
            $table->text('activity')->nullable();
            $table->text('visit_time')->nullable();
            $table->text('safety')->nullable();
            $table->string('area')->nullable();
            $table->string('time_zone')->nullable();
            $table->string('featured_photo')->nullable();
            $table->integer('view_count')->nullable();
            $table->timestamps();
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destination');
    }
};
