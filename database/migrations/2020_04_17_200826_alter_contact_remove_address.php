<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterContactRemoveAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('address1');
            $table->dropColumn('address2');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('zip');
        });
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('contact_id');
            $table->string('type');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zip', 5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('address1')->after('birthday');
            $table->string('address2')->nullable()->after('address1');
            $table->string('city')->nullable()->after('address2');
            $table->string('state')->nullable()->after('city');
            $table->string('zip', 5)->nullable()->after('state');
        });
    }
}
