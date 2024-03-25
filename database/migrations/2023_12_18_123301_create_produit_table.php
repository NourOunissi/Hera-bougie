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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom',70);
            $table->text('description');
            $table->boolean('actif');
            $table->integer('stock');
            $table->unsignedBigInteger('couleur_id');
            $table->unsignedBigInteger('parfum_id');
            $table->unsignedBigInteger('cire_id');
            $table->decimal('prix', 8, 2);
            $table->enum('taille', ['S', 'M', 'L']);
            $table->enum('type', ['Bougie', 'DIY']);
            $table->string('image', 255);
            $table->timestamps();


            $table->index('nom');
            $table->index('description');
            $table->index('actif');
            $table->index('stock');
            $table->index('couleur_id');
            $table->index('parfum_id');
            $table->index('cire_id');
            $table->index('prix');
            $table->index('taille');
            $table->index('type');
            $table->index('image');









            $table->foreign('couleur_id')->references('id')->on('couleurs');
            $table->foreign('parfum_id')->references('id')->on('parfums');
            $table->foreign('cire_id')->references('id')->on('cires');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
