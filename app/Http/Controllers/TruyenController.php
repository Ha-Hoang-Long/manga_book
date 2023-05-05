<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Truyen;

class TruyenController extends Controller
{
    //
    public function detail_manga($id)
    {
        $theloai = DB::table('theloais')
            ->select('theloais.*')->get();
        // $truyen=DB::table('truyens')->select('truyens.*')
        //                 ->where('truyens.Ma_truyen',$id)->get();
        $truyen = truyen::where(['Ma_truyen'=> $id])->get();
        // dd($truyen);
        if($truyen){
            $chap=DB::table('chapters')->select('chapters.*')->where('Ma_truyen',$id)->where('status',2)->get();
            
            $comment=DB::table('comments')->select('comments.*','users.Name')->where('Ma_truyen',$id)
            ->join('users','comments.user_id_comment','users.id')
            ->orderBy('comments.id', 'desc')->get();
            // dd($comment);
            
            return view('detail_manga',compact('theloai','truyen','chap','comment'));
        }
        return "<h1>404 - Không tìm thấy</h1>";
    }

    public function read_manga($Ma_truyen, $Ma_chap){
        $theloai = DB::table('theloais')
            ->select('theloais.*')->get();
        $truyen = DB::table('truyens')->select('truyens.*')->where('Ma_truyen',$Ma_truyen)->get();
        $chap = DB::table('chapters')->select('chapters.*')->where('Ma_chap',$Ma_chap)->get();
        $list_chap = DB::table('chapters')->select('chapters.*')->where('Ma_truyen',$Ma_truyen)->where('Status',2)->get();
        $comment=DB::table('comments')->select('comments.*','users.Name')->where('Ma_truyen',$Ma_truyen)
            ->join('users','comments.user_id_comment','users.id')
            ->orderBy('comments.id', 'desc')->get();
        return view('doc_truyen',compact('theloai','list_chap','chap','truyen','comment'));
    }
}
