<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\Truyen;
use App\Models\Chapter;
use Storage;
use File;
use Validator;
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        

        $theloai = DB::table('theloais')
            ->select('theloais.*')->get();
        $manga = Truyen::where(['user_id' => Auth::user()->id])->get();
        $chapter = DB::table('chapters')
                    ->join('Truyens','chapters.Ma_truyen','=','Truyens.Ma_truyen')
                    ->join('statuss','chapters.Status','=','statuss.id')
                    ->select('chapters.*','Truyens.Ten_truyen','truyens.user_id','statuss.name')
                    ->where('Truyens.user_id',Auth::user()->id)->get();
            return view('User.profile',compact('theloai','manga','chapter'));
    }

    public function add_manga(){
        $the_loai = DB::table('theloais')
            ->select('theloais.*')->get();
        return view('User.add_manga',['the_loai' => $the_loai]);
    }

    public function save_manga(Request $request){
        $result = array();
        $get_image = $request->file("Hinh_anh");
        $result['Ma_truyen'] = $request->Ma_truyen;
        $result['Ten_truyen'] = $request->Ten_truyen;
        $result['Ma_the_loai'] = $request->Ma_the_loai;
        $result['Noi_dung'] = $request->Noi_dung;
        $result['user_id'] = $request->user_id;
        $result['Status'] = "1";
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $result['Ma_truyen'].'.'.$get_image->getClientOriginalExtension();
        $get_image->move('images',$new_image);

        Storage::disk('google')->makeDirectory($result['Ma_truyen']);
        $filePath = public_path('images/'.$new_image); 
        $fileData = File::get($filePath);
        $dir = '/';
        $recursive = false; // Get subdirectories also?
        $contents = collect(Storage::disk('google')->listContents($dir, $recursive));

        $dir = $contents->where('type', '=', 'dir')
            ->where('filename', '=', $result['Ma_truyen'])
            ->first(); // There could be duplicate directory names!

        if ( ! $dir) {
            return 'Directory does not exist!';
        }

        Storage::disk('google')->put($dir['path'].'/'.$result['Ma_truyen'], $fileData);

        $dir1 = '/';
        $contents1 = collect(Storage::disk('google')->listcontents($dir1,$recursive));
        $dir1 = $contents1->where('type', '=', 'dir')
            ->where('filename', '=', $result['Ma_truyen'])
            ->first();
            
        $contents1 = collect(Storage::disk('google')->listcontents($dir1['path'],$recursive));
        
        $dir2 = $contents1->where('type', '!=', 'dir')
            ->where('filename', '=', $result['Ma_truyen'])
            ->first();  
        $result['Hinh_anh_truyen'] = $dir2['basename'];         
        DB::table('truyens')->insert($result);

        \File::delete(public_path('images/',$new_image));

        if(\File::exists(public_path('images/'.$new_image))){
            \File::delete(public_path('images/'.$new_image));
            return redirect()->route('user.profile',);
            }
    }

    public function add_chapter(){
        $result = DB::table('truyens')
            ->select('truyens.*')->get();
        return view('User.add_chapter',['data' => $result]);
    }

    public function save_chapter(Request $request){
        $adminUser = Auth::guard('admin')->user();
        $result = array();
        $result['Ma_truyen'] =$request->Ma_truyen;
        $result['Ma_chap'] =$request->Ma_chap.'_'.$request->Ma_truyen;
        $result['Ten_chap'] =$request->Ten_chap;
        $result['Status'] = "1";
        $result['Hinh_anh_1'] = $request->file("Hinh_anh_1");
        $result['Hinh_anh_2'] = $request->file("Hinh_anh_2");
        $result['Hinh_anh_3'] = $request->file("Hinh_anh_3");
        $result['Hinh_anh_4'] = $request->file("Hinh_anh_4");
        $result['Hinh_anh_5'] = $request->file("Hinh_anh_5");
        $result['Hinh_anh_6'] = $request->file("Hinh_anh_6");
        $result['Hinh_anh_7'] = $request->file("Hinh_anh_7");
        $result['Hinh_anh_8'] = $request->file("Hinh_anh_8");
        $result['Hinh_anh_9'] = $request->file("Hinh_anh_9");
        $result['Hinh_anh_10'] = $request->file("Hinh_anh_10");
        $result['Hinh_anh_11'] = $request->file("Hinh_anh_11");
        $result['Hinh_anh_12'] = $request->file("Hinh_anh_12");
        $result['Hinh_anh_13'] = $request->file("Hinh_anh_13");
        $result['Hinh_anh_14'] = $request->file("Hinh_anh_14");
        $result['Hinh_anh_15'] = $request->file("Hinh_anh_15");
        $result['Hinh_anh_16'] = $request->file("Hinh_anh_16");
        $result['Hinh_anh_17'] = $request->file("Hinh_anh_17");
        $result['Hinh_anh_18'] = $request->file("Hinh_anh_18");
        $result['Hinh_anh_19'] = $request->file("Hinh_anh_19");
        $result['Hinh_anh_20'] = $request->file("Hinh_anh_20");
        // dd($result);
        
        $dir = '/';
        $recursive = false; // Get subdirectories also?
        $contents = collect(Storage::disk('google')->listContents($dir, $recursive));
        // dd($result['Ma_truyen']);
        $dir = $contents->where('type', '=', 'dir')
            ->where('filename', '=', $result['Ma_truyen'])
            ->first(); // There could be duplicate directory names!

        if ( ! $dir) {
            return 'Directory does not exist!';
        }
        Storage::disk('google')->makeDirectory($dir['path'].'/'.$result['Ma_chap']);
        $contents = collect(Storage::disk('google')->listContents($dir['path'], $recursive));
        $dir = $contents->where('type', '=', 'dir')
            ->where('filename', '=', $result['Ma_chap'])
            ->first(); // There could be duplicate directory names!

        if ( ! $dir) {
            return 'Directory does not exist!';
        }
        $num = 0;
        foreach($result as $key=>$value){
            $num++;
            if($value != null and $num > 4){
                $num1 = $num-4;
                // echo $value->getClientOriginalName();
                $get_name_image = $value->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = $result['Ma_chap'].'_'.$num1.'.'.$value->getClientOriginalExtension();
                $value->move('images',$new_image);

                $filePath = public_path('images/'.$new_image); 
                $fileData = File::get($filePath);
                Storage::disk('google')->put($dir['path'].'/'.$result['Ma_chap'].'_'.$num1, $fileData);
                $contents = collect(Storage::disk('google')->listContents($dir['path'], $recursive));
                $dir1 = $contents->where('type', '!=', 'dir')
                ->where('filename', '=',$result['Ma_chap'].'_'.$num1) 
                ->first();  
                $result['Hinh_anh_'.$num1] = $dir1['basename'];
                if(\File::exists(public_path('images/'.$new_image))){
                    \File::delete(public_path('images/'.$new_image));
                    }
            }
            
        }
        DB::table('chapters')->insert($result);
        // Storage::disk('google')->makeDirectory($result['Ma_truyen']);
        return redirect()->route('user.profile',);
    }

    public function comment(Request $request){
        $validator = Validator::make($request->all(),[
            'Noi_dung' => 'required'
        ],[
            'Noi_dung.required' => 'Nội dung bình luận không được để trống'
        ]);
        if($validator->passes()){
            $data = [
                'Ma_truyen' => $request->Ma_truyen,
                'user_id_comment' => $request->user_id,
                'Noi_dung' => $request->Noi_dung,
            ];
            
            if($comment = Comment::create($data)){
                $comments = Comment::where(['Ma_truyen' => $request->Ma_truyen])->orderBy('id','DESC')->get();
                // $comment = DB::table('comments')->select('comments.*')->where('Ma_truyen',$request->Ma_truyen)->get();
                // return response()->json(['data' => $comment]);
                
                return view('list_comment',['comment'=>$comments]);
            }
        }
       
        // $result = array();
        // $result['Ma_truyen'] =$request->Ma_truyen;
        // $result['user_id_comment'] = $request->user_id;
        // $result['Noi_dung'] = $request->Noi_dung;
        // DB::table('comments')->insert($result);
        return response()->json(['error'=>$validator->errors()->first()]);
    }
}
