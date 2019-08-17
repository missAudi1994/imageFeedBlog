<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('com_id');
            $table->text("com_content");
            $table->BigInteger("com_user")->unsigned();
            $table->BigInteger("com_post")->unsigned();
            $table->foreign("com_user")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("com_post")->references("p_id")->on("posts")->onDelete("cascade");
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
        Schema::dropIfExists('comments');
    }
}
