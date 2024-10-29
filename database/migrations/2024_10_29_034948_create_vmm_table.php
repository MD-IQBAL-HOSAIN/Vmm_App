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
        Schema::create('vmm', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('lifetime');
            $table->integer('minimum_invest');
            $table->integer('distribute_coin');
            $table->integer('execution_time');
            $table->integer('preparation_time');
            $table->dateTime('start_time');
            $table->enum('status', ['draft', 'active', 'in_preparation', 'running', 'finished']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v_m_m_s');
    }
};
