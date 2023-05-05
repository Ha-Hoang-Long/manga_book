<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;
    protected $table = 'truyens';
    protected $fillable = ['Ma_truyen','Ten_truyen','Ma_the_loai','Noi_dung','user_id','Status','Hinh_anh_truyen'];

    public function comment(){
        return $this->hasMany(Comment::class,'Ma_truyen','Ma_truyen');
    }
    public function status(){
        return $this->hasOne(Status::class,'id','Status');
    }
    public function user_manga(){
        return $this->hasOne(User::class,'id','user_id');
        
    }
}
