<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Post;
use App\Models\Petugas;
use App\Models\Kategori;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
            $table->text('isi');
            $table->foreignId('petugas_id')->constrained('petugas')->onDelete('cascade');
            $table->string('status');
            $table->timestamps();
        });

        // Insert sample post
        $admin = Petugas::where('username', 'admin')->first();
        $kategori = Kategori::where('judul', 'Berita')->first();

        if ($admin && $kategori) {
            Post::create([
                'judul' => 'Selamat Datang di Website SMKN 4 Bogor',
                'kategori_id' => $kategori->id,
                'isi' => 'Selamat datang di website resmi SMKN 4 Bogor. Website ini merupakan sarana informasi dan komunikasi bagi seluruh warga sekolah dan masyarakat.',
                'petugas_id' => $admin->id,
                'status' => 'publish'
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
