<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOauthLoginToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('social_media_oauth_provider', 100)->nullable();
            $table->string('social_media_oauth_id', 100)->nullable();
            $table->unique(['social_media_oauth_provider', 'social_media_oauth_id'], 'social_media_oauth_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('social_media_oauth_unique');
            $table->dropColumn('social_media_oauth_provider');
            $table->dropColumn('social_media_oauth_id');
        });
    }
}
