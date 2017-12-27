<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCareerToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->date('bday')->nullable();
            $table->string('company')->nullable();
            $table->string('picture')->nullable();
            $table->string('nickname')->nullable();
            $table->string('introduce')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('bday');
            $table->dropColumn('company');
            $table->dropColumn('picture');
            $table->dropColumn('nickname');
            $table->dropColumn('introduce');
        });
    }
}
