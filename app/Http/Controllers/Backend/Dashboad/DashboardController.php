<?php

namespace App\Http\Controllers\Backend\Dashboad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class DashboardController extends Controller
{
    // :::::::::: DASHBOARD START :::::::::::
    public function dashboard() {
        return view('backend.dashboard');
    }

}
