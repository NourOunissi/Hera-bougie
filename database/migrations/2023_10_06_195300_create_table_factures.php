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
        Schema::create('factures', function (Blueprint $table) {
            $table->id(); 
            $table->string('num_facture');
            $table->unsignedBigInteger('user_id');
            $table->string('nom_contact',70);
            $table->text('adresse_contact');
            $table->string('code_postal', 20);
            $table->string('ville', 70);
            $table->date('date');
            $table->decimal('HT', 8, 2);
            $table->decimal('TVA', 8, 2);
            $table->decimal('TTC', 8, 2);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
