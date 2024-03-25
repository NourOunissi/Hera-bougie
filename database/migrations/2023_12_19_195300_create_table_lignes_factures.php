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
        Schema::create('lignes_factures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facture_id');
            $table->unsignedBigInteger('produit_id');
            $table->string('nom_produit');
            $table->decimal('HT', 8, 2);
            $table->decimal('TTC', 8, 2);
            $table->decimal('TVA', 8, 2);
            $table->decimal('quantite', 8, 2);
            $table->timestamps();
            $table->foreign('facture_id')->references('id')->on('factures');
            $table->foreign('produit_id')->references('id')->on('produits');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lignes_factures');
    }
};
