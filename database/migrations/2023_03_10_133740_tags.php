<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('tags')->insert([
            ['name' => 'Feel-good'],
            ['name' => 'Family-friendly'],
            ['name' => 'Inspiring'],
            ['name' => 'Educational'],
            ['name' => 'Humorous'],
            ['name' => 'Heartwarming'],
            ['name' => 'Wholesome'],
            ['name' => 'Romantic comedy'],
            ['name' => 'Adventure-filled'],
            ['name' => 'Musical'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
