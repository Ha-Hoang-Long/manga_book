<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $theloai = DB::table('theloais')
            ->select('theloais.*')->get();
        $truyen = DB::table('truyens')->select('truyens.*')
                    ->where('truyens.Status','2')->get();
                    // dd($truyen);
        return view('home',['theloai' => $theloai,'truyen'=>$truyen]);
    }
}
