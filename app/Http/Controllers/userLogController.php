<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLog;
class userLogController extends Controller
{
    public function index()
    {
        $logs = UserLog::all();
        return view('admin.logs.userLogsIndex', ['logs' => $logs]);
    }
}
