<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truyens', function (Blueprint $table) {
            $table->string('Ma_truyen',20);
            $table->string('Ten_truyen',100);
            $table->string('Ma_the_loai',10);
            $table->text('Noi_dung');
            $table->integer('user_id')->nullable();
            $table->integer('Status');
            $table->text('Hinh_anh_truyen');
            //$table->timestamps();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->primary(['Ma_truyen']);
            $table->foreign('Ma_the_loai') //cột khóa ngoại là cột `l_ma` trong table `sanpham`
                ->references('Ma_the_loai')->on('theloais') //cột sẽ tham chiếu đến là cột `l_ma` trong table `loai`
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('user_id') //cột khóa ngoại là cột `l_ma` trong table `sanpham`
                ->references('id')->on('users') //cột sẽ tham chiếu đến là cột `l_ma` trong table `loai`
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('truyens');
    }
}
