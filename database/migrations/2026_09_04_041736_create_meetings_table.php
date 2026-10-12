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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('room_id');
            $table->enum('meeting_type', ['Internal', 'Eksternal']); // jenis rapat
            $table->date('meeting_date'); // tanggal
            $table->string('title'); // agenda rapat
            $table->time('start_time'); // jam mulai
            $table->time('end_time'); // jam selesai
            $table->string('organizer'); // moderator/pemimpin rapat
            $table->enum('status', ['Berlangsung', 'Selesai'])->default('Berlangsung'); // status
            $table->text('description')->nullable(); // keterangan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
