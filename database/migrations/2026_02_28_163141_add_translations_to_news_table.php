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
            $table->string('title_en')->after('title')->nullable();
            $table->text('content_en')->after('content')->nullable();
            $table->string('title_lv')->after('title_en')->nullable();
            $table->text('content_lv')->after('content_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn(['title_en','content_en','title_lv','content_lv']);
        });
    }
};
