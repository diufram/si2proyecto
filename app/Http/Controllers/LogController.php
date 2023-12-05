<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogController extends Controller
{
    public function verLog()
    {
        $logPath = storage_path('logs/confidential.log');
        $logContent = File::get($logPath);
        
        return view('verLog', ['logContent' => $logContent]);
    }
}
