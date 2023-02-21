<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Models\official_report;
use Auth;

class DashboardController extends Controller
{
    public function __construct() {
       
    }

    public function index()
    {
        $user = Users::count();
        $off = official_report::count();

        return view('admin.dashboard',['user'=>$user, 'official'=>$off]);
    }
}