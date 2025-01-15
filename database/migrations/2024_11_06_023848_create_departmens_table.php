<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('departmens', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('desc');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departmens');
    }
};
