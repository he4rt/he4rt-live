<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('streamers', function (Blueprint $table) {
            $table->id();
            $table->string('provider');
            $table->string('username');
            $table->string('avatar_url');
            $table->timestamp('last_seen');
            $table->boolean('is_online');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('streamers');
    }
};
