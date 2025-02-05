<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // M:N 관계설정 필드
            $table->unsignedBigInteger('role_id');
            $table->string('role')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();

            $table->string('_read')->nullable(); // 목록보기 권환
            $table->string('_view')->nullable(); // 상세보기 권환
            $table->string('_write')->nullable(); // 쓰기 권환
            $table->string('_update')->nullable(); // 수정 권환
            $table->string('_delete')->nullable(); // 삭제 권환

            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // $table->foreignId('role_id')->constrained()->onDelete('casecade');
            //$table->foreignId('user_id')->constrained()->onDelete('casecade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        Schema::table('role_user',function(Blueprint $table){
            $table->dropForeign('role_user_role_id_foreign');
            $table->dropForeign('role_user_user_id_foreign');
        });
        */

        Schema::dropIfExists('role_user');
    }
}
