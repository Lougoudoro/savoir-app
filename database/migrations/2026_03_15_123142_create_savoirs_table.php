<?php

use App\Models\Maladie;
use App\Models\Plante;
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
        Schema::create('savoirs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Plante::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Maladie::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('savoirs');
    }
};
