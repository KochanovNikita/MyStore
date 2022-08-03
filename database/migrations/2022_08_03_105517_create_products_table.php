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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('price');
            $table->unsignedSmallInteger('discount')->nullable();
            $table->string('content');
            $table->string('description');
            $table->string('main_image');
            $table->string('preview_image');
            $table->unsignedBigInteger('count')->nullable()->default(0);
            $table->foreignId('category_id')->index()->constrained('categories');
            $table->foreignId('company_id')->index()->constrained('companies');
            $table->foreignId('color_id')->index()->constrained('colors');
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
        Schema::dropIfExists('products');
    }
};
