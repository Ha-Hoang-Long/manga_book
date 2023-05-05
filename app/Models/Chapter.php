<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $table = 'chapters';
    protected $fillable = ['Ma_chap', 'Ma_truyen','Ten_chap','Status','Hinh_anh_1',
    'Hinh_anh_2','Hinh_anh_3','Hinh_anh_4','Hinh_anh_5','Hinh_anh_6','Hinh_anh_7',
    'Hinh_anh_8','Hinh_anh_9','Hinh_anh_10','Hinh_anh_11','Hinh_anh_12','Hinh_anh_13',
    'Hinh_anh_14','Hinh_anh_15','Hinh_anh_16','Hinh_anh_17','Hinh_anh_18','Hinh_anh_19','Hinh_anh_20'];
    public function truyen(){
        return $this->hasOne(Truyen::class,'Ma_truyen','Ma_truyen');
    }
    public function status(){
        return $this->hasOne(Status::class,'id','Status');
    }
}
