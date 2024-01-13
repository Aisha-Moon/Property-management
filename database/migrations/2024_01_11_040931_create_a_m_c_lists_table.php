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
        Schema::create('a_m_c_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('amount');
            $table->tinyInteger('business_category')->default('0')->comment('0:business,1:non-business');
            $table->string('series');
            $table->tinyInteger('is_delete')->default('0')->comment('0:not delete,1:yes,delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_m_c_lists');
    }
};
