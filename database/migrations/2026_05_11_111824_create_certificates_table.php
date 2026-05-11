<?php

use App\Models\Design;
use App\Models\Nominal;
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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('promo_code')->unique()->nullable();
            $table->uuid('hash')->unique();
            $table->foreignIdFor(Design::class)->nullable()->constrained();
            $table->string('custom_image_path', length: 255)->nullable();
            $table->foreignIdFor(Nominal::class)->nullable()->constrained();
            $table->integer('custom_nominal_value')->nullable();
            $table->string('sender_name');
            $table->string('sender_email');
            $table->string('sender_phone')->nullable();
            $table->string('receiver_email');
            $table->text('message')->nullable();
            $table->string('status', length: 255)->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
