<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('Ma_truyen',20);
            $table->integer('user_id_comment',);
            $table->text('Noi_dung');
            //$table->timestamps();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('Ma_truyen') //cột khóa ngoại là cột `l_ma` trong table `sanpham`
                ->references('Ma_truyen')->on('truyens') //cột sẽ tham chiếu đến là cột `l_ma` trong table `loai`
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('user_id_comment') //cột khóa ngoại là cột `l_ma` trong table `sanpham`
                ->references('id')->on('users'); //cột sẽ tham chiếu đến là cột `l_ma` trong table `loai`
                
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
