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
    Schema::table('vehiculos', function (Blueprint $table) {
        $table->enum('tipo', ['auto', 'camioneta', 'minibus', 'bus'])
              ->after('modelo');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('vehiculos', function (Blueprint $table) {
        $table->dropColumn('tipo');
    });
}
};
