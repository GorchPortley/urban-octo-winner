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

        Schema::create('designs', function (Blueprint $table) {
            $table->id();
            $table->boolean('status');
            $table->string('name');
            $table->text('card_description')->nullable();
            $table->double('price')->nullable();
            $table->double('cost')->nullable();
            $table->longText('public_description')->nullable();
            $table->longText('private_description')->nullable();
            $table->enum('category', ["Subwoofer","Full-Range","Two-Way","Three-Way","Four-Way","Portable","Esoteric","Upgrades"]);
            $table->double('freq_low')->nullable();
            $table->double('freq_high')->nullable();
            $table->enum('amplification', ["Passive","Active","Hybrid"]);
            $table->text('amp_details')->nullable();
            $table->foreignId('owner_id')->constrained('Users')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designs');
    }
};
