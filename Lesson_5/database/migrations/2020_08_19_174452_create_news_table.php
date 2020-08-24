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
            $table->string('title', 1024)->nullable(false)->comment('Заголовок новости');
            $table->string('text',2048)->nullable(false)->comment('Текст новости');
            $table->unsignedBigInteger('category_id')->comment('ID категории');
            $table->boolean('isPrivate')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
