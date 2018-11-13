<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxRequestController extends Controller
{

    public function chartjsRepsonse(Request $request){

        return response()->json([
            'label' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        ]);
    }

}
