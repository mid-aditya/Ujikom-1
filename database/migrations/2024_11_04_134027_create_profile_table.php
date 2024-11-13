<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Profile;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->timestamps();
        });

        // Insert default profile
        Profile::create([
            'judul' => 'Profil SMKN 4 Bogor',
            'isi' => 'SMKN 4 Bogor adalah sekolah menengah kejuruan yang berkomitmen untuk memberikan pendidikan terbaik.'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
