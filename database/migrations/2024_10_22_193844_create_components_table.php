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
        Schema::disableForeignKeyConstraints();

        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->enum('position', ["LF","MF","HF","Other"]);
            $table->longText('description')->nullable();
            $table->double('freq_low');
            $table->double('freq_hi');
            $table->text('FRD')->nullable();
            $table->text('ZMA')->nullable();
            $table->text('Other')->nullable();
            $table->double('bl')->nullable();
            $table->double('mms')->nullable();
            $table->double('cms')->nullable();
            $table->double('rms')->nullable();
            $table->double('le')->nullable();
            $table->double('re')->nullable();
            $table->double('sd')->nullable();
            $table->double('fs')->nullable();
            $table->double('qes')->nullable();
            $table->double('qms')->nullable();
            $table->double('qts')->nullable();
            $table->double('vas')->nullable();
            $table->double('xmax')->nullable();
            $table->double('xlim')->nullable();
            $table->double('pe')->nullable();
            $table->double('vd')->nullable();
            $table->double('spl')->nullable();
            $table->foreignId('design_id');
            $table->unsignedInteger('driver_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};
