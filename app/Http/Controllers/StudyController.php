<?php

namespace App\Http\Controllers;

use App\Model\Part;
use Illuminate\Http\Request;

class StudyController extends Controller
{

    public function index()
    {

    }



    public function create()
    {
        $parts = Part::all();
        return view('backend.study.create')->with('parts', $parts);
    }



    public function store(Request $request)
    {
        dd($request->all());
    }



    public function show($id)
    {
        //
    }



    public function edit($id)
    {
        //
    }



    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
