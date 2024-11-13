<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Foto;
use App\Models\Galery;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('foto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('galery_id')->constrained('galery')->onDelete('cascade');
            $table->string('file');
            $table->string('judul');
            $table->timestamps();
        });

        // Insert sample photo
        $galery = Galery::first();
        if ($galery) {
            Foto::create([
                'galery_id' => $galery->id,
                'file' => 'default.jpg',
                'judul' => 'Sample Photo'
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto');
    }
};
