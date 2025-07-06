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
        Schema::dropIfExists('facilities');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('major_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->string('photo');
            $table->timestamps();
        });
    }
};
