<?php

use App\Models\Certificate;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Certificate::class)->unique()->constrained()->onDelete('cascade');
            $table->string('payment_url', length: 255);
            $table->string('provider', length: 255);
            $table->string('payment_id', length: 255);
            // Сделать ENUMs?
            $table->string('status', length: 255);
            $table->integer('amount');
            $table->json('raw_response');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
