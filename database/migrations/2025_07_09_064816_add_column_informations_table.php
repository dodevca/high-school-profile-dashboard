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
        Schema::table('informations', function (Blueprint $table) {
            $table->text('short_profile')->nullable()->after('mission');
            $table->string('youtube_url')->nullable()->after('short_profile');
            $table->string('youtube_url_2')->nullable()->after('youtube_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('informations', function (Blueprint $table) {
            $table->dropColumn([
                'short_profile',
                'youtube_url',
                'youtube_url_2',
            ]);
        });
    }
};
