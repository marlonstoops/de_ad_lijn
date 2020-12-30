<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMessageIdFieldToAdLijnenTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('ad_lijnen', function (Blueprint $table) {
            $table->unsignedInteger('message_id')
                ->after('mobile')
                ->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('ad_lijnen', function (Blueprint $table) {
            $table->dropColumn('message_id');
        });
    }
}
