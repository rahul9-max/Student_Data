<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('customers', function (Blueprint $table) {
        $table->string('password')->nullable()->after('email');
        $table->string('confirm_password')->nullable()->after('password');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            //
            $table->dropColumn(['password','confirm_password']);
        });
    }
};
