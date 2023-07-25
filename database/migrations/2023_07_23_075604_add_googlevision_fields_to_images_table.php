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
        Schema::table('images', function (Blueprint $table) {
        
            $table->text('labels')->nullable()->after('ad_id');
            $table->string('adult')->nullable()->after('ad_id');
            $table->string('spoof')->nullable()->after('ad_id');
            $table->string('medical')->nullable()->after('ad_id');
            $table->string('violence')->nullable()->after('ad_id');
            $table->string('racy')->nullable()->after('ad_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn(['labels','adult','spoof','medical','violence','racy']);
        });
    }
};
