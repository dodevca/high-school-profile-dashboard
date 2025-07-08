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
        Schema::table('teachers', function (Blueprint $table) {
            $table->integer('priority')->default(0)->after('nip');
            
            if(Schema::hasColumn('teachers', 'description'))
                $table->dropColumn('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            if(Schema::hasColumn('teachers', 'priority'))
                $table->dropColumn('priority');

            $table->text('description')->nullable()->after('subject');
        });
    }
};
