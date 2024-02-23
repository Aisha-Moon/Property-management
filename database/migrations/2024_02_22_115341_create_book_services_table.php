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
        Schema::create('book_services', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('user_id')->nullable();
            $table->tinyInteger('service_type_id')->nullable();
            $table->tinyInteger('category_id')->nullable();
            $table->tinyInteger('sub_category_id')->nullable();
            $table->tinyInteger('amc_free_service_id')->nullable();
            $table->string('description')->nullable();
            $table->string('special_instructions')->nullable();
            $table->string('pet')->nullable()->comment('0:yes,1:no');
            $table->date('available_date')->nullable();
            $table->string('service_request')->nullable();
            $table->string('expert_comments')->nullable();
            $table->tinyInteger('vendor_id')->nullable();
            $table->string('service_completion');
            $table->tinyInteger('status')->default(0)->comment('0:pending, 1:waiting,2:confirm,3:reject');
            $table->date('vendor_date')->nullable();
            $table->string('vendor_time')->nullable();
            $table->string('vendor_description')->nullable();
            $table->string('vendor_price')->nullable();
            $table->tinyInteger('pay_status')->default(0)->comment('0:admin send payment, 1:user payment done,2:user reject payment');
            $table->tinyInteger('modal_status')->default(0)->comment('0:show, 1:hide');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_services');
    }
};
