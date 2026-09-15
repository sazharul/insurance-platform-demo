<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommitteeBoardMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('committee_board_members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('committee_name_id')->nullable();
            $table->string('en_name');
            $table->string('bn_name');
            $table->string('profile_image')->nullable();
            $table->string('en_designation')->nullable();
            $table->string('bn_designation')->nullable();
            $table->string('link_owner_name_id')->nullable();
            $table->integer('position');
            $table->string('status')->nullable()->default(1);
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
        Schema::drop('committee_board_members');
    }
}
