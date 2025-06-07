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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug");
            $table->string("email");
            $table->string("phone");
            $table->bigInteger("category_id");
            $table->bigInteger("sub_category_id");
            $table->string("city");
            $table->string("business_address");
            $table->string("website")->nullable();
            $table->string("instagram_url")->nullable();
            $table->string("facebook_url")->nullable();
            $table->tinyInteger("status")->default(0);
            $table->string("password")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
