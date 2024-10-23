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

        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->boolean('status');
            $table->string('brand');
            $table->string('model');
            $table->integer('nominal_size');
            $table->integer('nominal_impedance');
            $table->longText('description');
            $table->text('card_description');
            $table->string('mfg_url')->nullable();
            $table->double('mfg_price')->nullable();
            $table->enum('category', ["Subwoofer","Woofer","Midrange","Coaxial","Tweeter","Compression_Driver","Exciter"]);
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
            $table->foreignId('owner_id')->constrained('Users');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
