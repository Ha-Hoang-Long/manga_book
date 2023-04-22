<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
date_default_timezone_set('Asia/Ho_Chi_Minh');

class DocumentController extends Controller
{
    //
    public function create_document(){
        $adminUser = Auth::guard('admin')->user();
        Storage::disk('google')->put('test.txt','hoang long');
        dd('created');
    }
}
