<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('personal_access_tokens', 'grant_type')) {
            Schema::table('personal_access_tokens', function (Blueprint $table) {
                $table->bigInteger('grant_type')->unsigned();
                $table->foreign('grant_type')->references('id')->on('type_login_token');
            });
        }
        //function (Blueprint $table) {
        //            $table->bigIncrements('grant_type')->unsigned();
        //            $table->foreign('grant_type')->references('id')->on('type_login_token');
        //        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
