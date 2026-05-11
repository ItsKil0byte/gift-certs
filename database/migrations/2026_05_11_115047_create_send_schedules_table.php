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
        Schema::create('send_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Certificate::class)->unique()->constrained()->onDelete('cascade');
            $table->timestamp('send_at')->nullable();
            $table->string('status', length: 255)->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('send_schedules');
    }
};
