<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAddSocAuth extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('id_in_soc',20)
                ->default('')
                ->comment('id в соцсети');
            $table->enum('type_auth', ['site', 'vkontakte', 'github'])
                ->default('site')
                ->comment('Тип используемой авторизации');
            $table->string('avatar', 250)->default('')->comment('Ссылка на аватар');
            $table->index('id_in_soc');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['id_in_soc', 'type_auth' , 'avatar']);
        });
    }
}
