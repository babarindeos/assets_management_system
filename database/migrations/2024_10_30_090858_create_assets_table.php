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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('asset_categories')->onDelete('cascade');
            $table->string('uuid')->unique();
            $table->string('item');
            $table->string('description');
            $table->unsignedBigInteger('userlocation_id');
            $table->foreign('userlocation_id')->references('id')->on('user_locations')->onDelete('cascade');
            $table->string('purchase_date')->nullable();
            $table->string('supplier')->nullable();
            $table->decimal('cost', 16, 2)->nullable();
            $table->string('life_span')->nullable();
            $table->string('depreciation_rate')->nullable();
            $table->string('disposal_date')->nullable();
            $table->string('disposal_revenue')->nullable();
            $table->string('dispose_authority')->nullable();
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
