<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description');
            $table->enum('status', ['en-attent', 'applique', 'Pas-applique']);
            $table->foreignId('id_user')->constrained('users', 'id');
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
