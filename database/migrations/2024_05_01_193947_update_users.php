<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            //$table->string('nom', 70)->nullable();
            $table->string('prenom', 70)->nullable();
            $table->string('adresse', 255)->nullable();
            $table->string('code_postal', 10)->nullable();
            $table->string('ville', 70)->nullable();
            $table->string('telephone', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
