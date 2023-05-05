<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = ['id','Ma_truyen','user_id_comment','Noi_dung'];

    public function user(){
        return $this->hasOne(User::class,'id','user_id_comment');
    }

    // public function replies(){
    //     return $this->hasMany(Comment::class,'id','comment_id');
    // }
}
