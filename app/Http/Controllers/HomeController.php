<?php

namespace App\Http\Controllers;

use App\Model\Study;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $todayStudies = Study::where('completed_at', Carbon::today())->get();
        $yesterdayStudies = Study::where('completed_at', Carbon::yesterday())->get();

        return view('pages.welcome')
            ->with('todayStudies', $todayStudies)
            ->with('yesterdayStudies', $yesterdayStudies);
    }



    public function chart(Request $request)
    {
        return view('pages.chart')->with('request', (object)$request->all());
    }

}
