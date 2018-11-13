<?php

namespace App\Http\Controllers;

use App\Model\Details;
use App\Model\Part;
use App\Model\Study;
use App\Utility\Utility;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudyController extends Controller
{

    public function index()
    {

        return view('layouts.app');

    }



    public function create()
    {
        $parts = Part::all();
        return view('backend.study.create')->with('parts', $parts);
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'practise_book' => 'required',
            'book_details' => 'required',
            'test_no' => 'required|numeric',
            'part_no' => 'required|numeric',
            'full_marks' => 'required|numeric',
            'score' => 'required|numeric',
            'completed_at' => 'required'
        ]);


        try {

            $studyData = Study::create([
                'practise_book' => $request->get('practise_book'),
                'book_details' => $request->get('book_details'),
                'test_no' => $request->get('test_no'),
                'part_no' => $request->get('part_no'),
                'full_marks' => $request->get('full_marks'),
                'score' => $request->get('score'),
                'band' => Utility::calculateBand($request->get('score')),
                'comments' => $request->get('comments'),
                'completed_at' => date('Y-m-d', strtotime($request->get('completed_at'))),
            ]);

            $sectionData = [];

            $sections = $request->get('section');
            $sectionsScore = $request->get('section_score');
            $sectionsFullmarks = $request->get('section_fullmarks');

            if(isset($studyData->id) && !empty($studyData->id)){

                foreach($sections as $key => $section){

                    if( (!isset($sectionsScore[$key]) && empty($sectionsScore[$key])) && (!isset($sectionsFullmarks[$key]) && empty($sectionsFullmarks[$key]))){
                        continue;
                    }

                    $sectionData[] = [
                        'study_id' => $studyData->id,
                        'part_no' => $studyData->part_no,
                        'section_no' => $section,
                        'section_score' => $sectionsScore[$key],
                        'section_full_marks' => $sectionsFullmarks[$key],
                        'completed_at' => $studyData->completed_at,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                }
            }

            Details::insert($sectionData);

            return redirect()->route('study.index')->with('success', $studyData->practise_book.' '.$studyData->book_details.' study recorded successfully ');


        } catch (\Exception $e) {

            return redirect()->route('study.create')->with('error', $e->getMessage()." ".$e->getLine());
        }

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
