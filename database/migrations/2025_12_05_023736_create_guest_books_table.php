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
        Schema::create('guest_books', function (Blueprint $table) {
            $table->id();

            $table->string('name');              // Guest name
            $table->string('email')->nullable(); // Guest email
            $table->string('phone')->nullable(); // Guest phone
            $table->string('organization')->nullable(); // Company / institution
            $table->string('purpose');           // Visit purpose
            $table->text('message')->nullable(); // Guest message
            $table->date('visit_date');          // Visit date
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_books');
    }
};
