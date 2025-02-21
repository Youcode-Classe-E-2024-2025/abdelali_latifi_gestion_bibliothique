<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign Key vers users(id)
            $table->foreignId('book_id')->constrained()->onDelete('cascade'); // Foreign Key vers books(id)
            $table->timestamp('borrowed_at')->default(now()); // date d'emprunt du livre 
            $table->timestamp('returned_at')->nullable(); // date de retour du livre 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
};
