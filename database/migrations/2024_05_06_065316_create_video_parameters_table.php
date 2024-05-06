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
        Schema::create('video_parameters', function (Blueprint $table) {
            $table->id();
            $table->integer('audio_bitrate');
            $table->string('regulation_name');
            $table->integer('video_bitrate');
            $table->string('rtmp_url')->nullable();
            $table->integer('flag')->default(0);
            $table->integer('status')->default(0);
            $table->integer('write_to_nginx')->default(0);
            $table->integer('read_from_nginx')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_parameters');
    }
};
