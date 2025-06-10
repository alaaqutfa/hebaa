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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name');                                    // اسم اللغة (مثل "العربية")
            $table->string('code');                                    // كود اللغة (مثل "ar", "en")
            $table->enum('direction', ['ltr', 'rtl'])->default('ltr'); // اتجاه الكتابة
            $table->boolean('is_active')->default(true);               // هل اللغة مفعلة
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
