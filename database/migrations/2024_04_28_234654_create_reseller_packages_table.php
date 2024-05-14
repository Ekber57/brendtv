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
        Schema::create('reseller_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("original_package_id");
            $table->string("package_name");
            $table->text("bouquets");
            // $table->unsignedBigInteger("parent_user");
            $table->float("original_official_credits",100,2);
            $table->float("official_credits",100,2);
            $table->smallInteger("official_duration");
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseller_packages');
    }
};
