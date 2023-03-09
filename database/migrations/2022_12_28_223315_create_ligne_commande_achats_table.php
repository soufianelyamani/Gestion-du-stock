<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_commande_achats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commande_achat_id')->constrained();
            $table->foreignId('produit_id')->constrained();
            $table->integer('qt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ligne_commande_achats');
    }
};