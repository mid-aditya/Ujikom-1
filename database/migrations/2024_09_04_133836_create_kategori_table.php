<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Kategori;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->timestamps();
        });

        // Insert default categories
        $categories = [
            ['judul' => 'Berita'],
            ['judul' => 'Pengumuman'],
            ['judul' => 'Agenda'],
            ['judul' => 'Galeri'],
        ];

        foreach ($categories as $category) {
            Kategori::create($category);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori');
    }
};
