<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('macro_results', function (Blueprint $table) {
            $table->dropColumn('bmr');
            $table->dropColumn('tdee');
            $table->dropColumn('goal');
            $table->dropColumn('result_date');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('macro_results', function (Blueprint $table) {
            //
        });
    }
};
