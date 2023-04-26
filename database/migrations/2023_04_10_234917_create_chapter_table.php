<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->string('Ma_chap',20);
            $table->string('Ma_truyen',20);
            $table->string('Ten_chap',100);
            $table->integer('Status');
            $table->text('Hinh_anh_1')->nullable();
            $table->text('Hinh_anh_2')->nullable();
            $table->text('Hinh_anh_3')->nullable();
            $table->text('Hinh_anh_4')->nullable();
            $table->text('Hinh_anh_5')->nullable();
            $table->text('Hinh_anh_6')->nullable();
            $table->text('Hinh_anh_7')->nullable();
            $table->text('Hinh_anh_8')->nullable();
            $table->text('Hinh_anh_9')->nullable();
            $table->text('Hinh_anh_10')->nullable();
            $table->text('Hinh_anh_11')->nullable();
            $table->text('Hinh_anh_12')->nullable();
            $table->text('Hinh_anh_13')->nullable();
            $table->text('Hinh_anh_14')->nullable();
            $table->text('Hinh_anh_15')->nullable();
            $table->text('Hinh_anh_16')->nullable();
            $table->text('Hinh_anh_17')->nullable();
            $table->text('Hinh_anh_18')->nullable();
            $table->text('Hinh_anh_19')->nullable();
            $table->text('Hinh_anh_20')->nullable();

            //$table->timestamps();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->primary(['Ma_chap']);
            $table->foreign('Ma_truyen') //cột khóa ngoại là cột `l_ma` trong table `sanpham`
                ->references('Ma_truyen')->on('truyens') //cột sẽ tham chiếu đến là cột `l_ma` trong table `loai`
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
        Schema::dropIfExists('chapters');
    }
}
