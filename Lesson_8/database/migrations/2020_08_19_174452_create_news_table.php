<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {

            $table->charset = 'utf8mb4';
            $table->id();
            $table->text('title')->nullable(false)->comment('Заголовок новости');
            $table->text('text')->nullable(false)->comment('Текст новости');
            $table->boolean('isPrivate')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
}
