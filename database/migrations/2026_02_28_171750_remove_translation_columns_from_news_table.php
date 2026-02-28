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
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn([
                'title_en',
                'title_lv',
                'content_en',
                'content_lv',
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('title_en')->nullable();
            $table->string('title_lv')->nullable();
            $table->text('content_en')->nullable();
            $table->text('content_lv')->nullable();
        });
    }
};
