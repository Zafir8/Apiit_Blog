<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('allowed_users', function (Blueprint $table) {
            $table->id();
            $table->string('name') ;
            $table->string('NIC_or_passport')->unique();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('allowed_users');
    }
};
