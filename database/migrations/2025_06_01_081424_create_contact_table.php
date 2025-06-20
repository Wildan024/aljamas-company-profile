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
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('logo');
            $table->string('alamat');
            $table->string('email');
            $table->string('telepon');
            $table->string('maps_embed');
            $table->timestamps();
            $table->renameColumn('telepom', 'telepon');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
        Schema::table('contact', function (Blueprint $table) {
            $table->renameColumn('telepon', 'telepom');
        });
        
    }
};
