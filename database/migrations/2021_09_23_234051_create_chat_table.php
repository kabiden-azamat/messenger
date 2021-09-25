<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название чата');
            $table->longText('description')->comment('Описание чата');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('chat_members', function (Blueprint $table) {
            $table->id();
            $table->integer('chat_id')->comment('Чат участника');
            $table->integer('user_id')->comment('Участник');
            $table->integer('user_status')->default(1)->comment('Статус пользователя (Пользователь, Модератор, Владелец)');
            $table->dateTime('last_activity')->comment('Последний онлайн');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('chat_blocks', function (Blueprint $table) {
            $table->id();
            $table->integer('chat_id')->comment('Чат в котором заблокировали');
            $table->integer('user_id')->comment('Пользователь, которого заблокировали');
            $table->string('comment')->comment('Комментарий с причиной блокировки');
            $table->dateTime('block_until')->nullable()->comment('Заблокирован до. Если null, то навсегда');
            $table->integer('decided_user_id')->nullable()->comment('Пользователь, который заблокировал. Если null, был заблокирован системой');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->integer('chat_id')->comment('Чат сообщения');
            $table->integer('user_id')->comment('Пользователь отправивший сообщение');
            $table->integer('reply_to')->nullable()->comment('Ответ на сообщение');
            $table->longText('message')->nullable()->comment('Сообщение');
            $table->integer('sticker_id')->nullable()->comment('Стикер');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat');
        Schema::dropIfExists('chat_members');
        Schema::dropIfExists('chat_blocks');
        Schema::dropIfExists('chat_messages');
    }
}
