<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Storage;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();



class AdminController extends Controller
{
    //
    public function index(){
    	return view('Admin.login');
    }

    public function account_verification(Request $request){
        // $pass = $request->password;
        // echo $pass;
        $credentials = $request->only('email','password');
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.show_dashboard');
        }
        else{
            return redirect()->route('admin.login');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function dashboard(){
        return redirect()->route('admin.show_dashboard');
    }
    public function show_dashboard(){
        $adminUser = Auth::guard('admin')->user();
            return view('Admin.dashborad',['user'=>$adminUser]);
        
    }


    //Truyện

    public function list_manga(){
        $adminUser = Auth::guard('admin')->user();
        $result = DB::table('truyens')
            ->select('truyens.*')->get();
        $status = DB::table('statuss')
            ->select('statuss.*')->get();
        return view('Admin.list_manga',['user'=>$adminUser,'data' => $result,'status'=>$status]);
    }
    
    public function add_manga(){
        $adminUser = Auth::guard('admin')->user();
        $the_loai = DB::table('theloais')
            ->select('theloais.*')->get();
        return view('Admin.add_manga',['user'=>$adminUser,'the_loai' => $the_loai]);
    }

    public function save_manga(Request $request){
        $adminUser = Auth::guard('admin')->user();
    	$result = array();
        $get_image = $request->file("Hinh_anh");
        $result['Ma_truyen'] = $request->Ma_truyen;
        $result['Ten_truyen'] = $request->Ten_truyen;
        $result['Ma_the_loai'] = $request->Ma_the_loai;
        $result['Noi_dung'] = $request->Noi_dung;
        $result['Status'] = "2";
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
            return redirect()->route('admin.manga',);
            }
        
    }

    public function delete_manga($manga){
        $adminUser = Auth::guard('admin')->user();
        $mangas = DB::table('truyens')->where('Ma_truyen',$manga)->get();
        
        // dd($chapters[0]->Ma_chap);
        $dir = '/';
        $recursive = false; // Get subdirectories also?
        $contents = collect(Storage::disk('google')->listContents($dir, $recursive));
        $dir = $contents->where('type', '=', 'dir')
        ->where('filename', '=', $mangas[0]->Ma_truyen)
        ->first();
        
        Storage::disk('google')->deleteDirectory($dir['path']);
    	DB::table('truyens')->where('Ma_truyen',$manga)->delete();
    	Session::put('massage','Xóa sản phẩm thành công');
    	return redirect()->back();
    }

    public function approval_manga(){
        $adminUser = Auth::guard('admin')->user();
        $manga = DB::table('truyens')
        ->select('truyens.*')->where('Truyens.Status','1')->get();
        $chapter = DB::table('chapters')
                    ->join('Truyens','chapters.Ma_truyen','=','Truyens.Ma_truyen')
                    ->select('chapters.*','Truyens.Ten_truyen','truyens.user_id')
                    ->where('Chapters.Status','1')->get();
        $status = DB::table('statuss')->select('statuss.*')->get();
        // dd($chapter->count());
        return view('Admin.approval_manga',
                    [   'user'=>$adminUser,
                        'manga'=>$manga,
                        'status'=>$status,
                        'chapter'=>$chapter
                    ]);
    }
    public function approval_change_manga($ma,$id){
        $adminUser = Auth::guard('admin')->user();
        DB::table('truyens')->where('Ma_truyen',$ma)->update(['Status'=>$id]);
        DB::table('truyens')->where('Ma_truyen',$ma)->update(['updated_at'=>Carbon::now()]);
        return redirect()->route('admin.approval_manga',);
    }

    //chapter
    public function list_chap_is_manga($Ma_truyen){
        $adminUser = Auth::guard('admin')->user();
        // dd($Ma_truyen);
        $chapter = DB::table('chapters')
            ->join('Truyens','chapters.Ma_truyen','=','Truyens.Ma_truyen')
            ->select('chapters.*','Truyens.Ten_truyen')->where('chapters.Ma_truyen',$Ma_truyen)->get();
            return view('Admin.list_chap_ismanga',['user'=>$adminUser,'data' => $chapter]);
    }

    
    public function approval_change_chapter($ma,$id){
        $adminUser = Auth::guard('admin')->user();
        DB::table('chapters')->where('Ma_chap',$ma)->update(['Status'=>$id]);
        DB::table('chapters')->where('Ma_chap',$ma)->update(['updated_at'=>Carbon::now()]);
        return redirect()->route('admin.approval_manga',);
    }

    public function create_chapter(){
        $adminUser = Auth::guard('admin')->user();
        $result = DB::table('truyens')
            ->select('truyens.*')->get();
        return view('Admin.add_chapter',['user'=>$adminUser,'data' => $result]);
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
        return redirect()->route('admin.manga',);
    }

    public function delete_chapter($chapter){
        $adminUser = Auth::guard('admin')->user();
        $chapters = DB::table('chapters')->where('Ma_chap',$chapter)->get();
        
        // dd($chapters[0]->Ma_chap);
        $dir = '/';
        $recursive = false; // Get subdirectories also?
        $contents = collect(Storage::disk('google')->listContents($dir, $recursive));
        $dir = $contents->where('type', '=', 'dir')
        ->where('filename', '=', $chapters[0]->Ma_truyen)
        ->first();
        $contents = collect(Storage::disk('google')->listContents($dir['path'], $recursive));
        $dir = $contents->where('type', '=', 'dir')
        ->where('filename', '=', $chapters[0]->Ma_chap)
        ->first();
        
        Storage::disk('google')->deleteDirectory($dir['path']);
    	DB::table('chapters')->where('Ma_chap',$chapter)->delete();
    	Session::put('massage','Xóa sản phẩm thành công');
    	return redirect()->back();
    }

    public function detail_chapter($chapter){
        $adminUser = Auth::guard('admin')->user();
        $chapters = DB::table('chapters')->where('Ma_chap',$chapter)->get();

        $dir = '/';
        $recursive = false; // Get subdirectories also?
        $contents = collect(Storage::disk('google')->listContents($dir, $recursive));
        $dir = $contents->where('type', '=', 'dir')
        ->where('filename', '=', $chapters[0]->Ma_truyen)
        ->first();
        $contents = collect(Storage::disk('google')->listContents($dir['path'], $recursive));
        $dir = $contents->where('type', '=', 'dir')
        ->where('filename', '=', $chapters[0]->Ma_chap)
        ->first();
        $contents = collect(Storage::disk('google')->listContents($dir['path'], $recursive));
        // dd($contents);
        return view('Admin.detail_chapter',['user'=>$adminUser,'data' => $chapters]);
    }
    public function getImage($path)
    {
        $adminUser = Auth::guard('admin')->user();
        $filePath = $storage->where('name', $path)->first();

        if(isset($filePath->id)) {
            $disk = Storage::disk('google');
            // $image = $disk->get($filePath->);

            return response($image)->header('Content-Type', 'image/png');
        }
    }

    // Thể loại
    public function list_the_loai(){
        $adminUser = Auth::guard('admin')->user();
        $result = DB::table('theloais')
            ->select('theloais.*')->get();
            // dd($result);
        return view('Admin.theloai',['user'=>$adminUser,'data' => $result]);
    }
    public function create_the_loai(){
        $adminUser = Auth::guard('admin')->user();
        return view('Admin.add_theloai',['user'=>$adminUser]);
        
    }

    public function save_the_loai(Request $request){
        $adminUser = Auth::guard('admin')->user();
    	$result = array();
        $result['Ma_the_loai'] = $request->Ma_the_loai;
        $result['Ten_the_loai'] = $request->Ten_the_loai;
        DB::table('theloais')->insert($result);
    	// Session::put('massage','Thêm sản phẩm thành công');
        return redirect()->route('admin.the_loai',); 
    }
}