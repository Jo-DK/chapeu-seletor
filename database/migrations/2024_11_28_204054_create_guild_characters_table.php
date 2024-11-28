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
        Schema::create('guild_characters', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Character::class)->constrained('characters')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Guild::class)->constrained('guilds')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guild_characters');
    }
};
