<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id(); // Primary Key (id)
            $table->boolean('is_logged_in')->default(false);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key (user_id)
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
