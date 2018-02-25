<?php

namespace App\Http\Controllers\Admin;

use App\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogsController extends Controller
{
    /**
     * View for all logs
     * Route: /admin/logs/index
     * */
    public function index(Request $request){
        if ($request->from && $request->to){
//            dd(date($request->to));
            $from = new Carbon($request->from);
            $to = new Carbon($request->to);
            $to->addDay();

            $logs = Log::where('created_at', '<=', $to->toDateString())
                ->where('created_at', '>', $from->toDateString())
                ->orderBy('id','desc')
                ->paginate(15);
        } else{
            $logs = Log::orderBy('id', 'desc')->paginate(15);
        }
        return view('admin.logs.index', [
            'logs' => $logs
        ]);
    }
}
