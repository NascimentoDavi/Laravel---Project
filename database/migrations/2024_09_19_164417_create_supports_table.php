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
        Schema::create('supports', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('subject');
            $table->enum('status', ['o', 'p', 'c'])->default('o'); // 'o' means opened, 'p' means pending and 'c' means closed. 
            $table->text('body');

            $table->date('created_at');
            $table->date('updated_at')->nullable();
            
            // In a case where i wanted to explicitly define a nullable field. i'd implement the following: ->nullable();
            
        });
    }

    /**
     * Reverse the migrations.  
     */
    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};
