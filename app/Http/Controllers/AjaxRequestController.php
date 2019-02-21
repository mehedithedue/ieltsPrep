<?php

namespace App\Http\Controllers;

use App\Model\Study;
use App\Utility\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxRequestController extends Controller
{

    public function chartjsRepsonse(Request $request)
    {
        $requestMonth = date('n', strtotime($request->day));
        $requestYear = date('Y', strtotime($request->day));
        $lastDayOfMonth = date('t', strtotime($request->day));

        return response()->json([
            'listening' => $this->getListeningData($requestMonth, $requestYear, $lastDayOfMonth),
            'reading' => $this->getReadingData($requestMonth, $requestYear, $lastDayOfMonth),
            'writing' => $this->getWritingData($requestMonth, $requestYear, $lastDayOfMonth),
            'speaking' => $this->getSpeakingData($requestMonth, $requestYear, $lastDayOfMonth),
        ]);
    }

    private function getListeningData($requestMonth, $requestYear, $lastDayOfMonth){

        $listeningData = $this->getStudies($requestMonth, $requestYear, Utility::listening());

        return $this->getFormatedArray($lastDayOfMonth, $requestYear, $requestMonth, $listeningData);

    }

    private function getReadingData($requestMonth, $requestYear, $lastDayOfMonth){

        $readingData = $this->getStudies($requestMonth, $requestYear, Utility::reading());

        return $this->getFormatedArray($lastDayOfMonth, $requestYear, $requestMonth, $readingData);

    }


    private function getWritingData($requestMonth, $requestYear, $lastDayOfMonth){

        $writingData = $this->getStudies($requestMonth, $requestYear, Utility::writing());

        return $this->getFormatedArray($lastDayOfMonth, $requestYear, $requestMonth, $writingData);

    }


    private function getSpeakingData($requestMonth, $requestYear, $lastDayOfMonth){

        $speakingData = $this->getStudies($requestMonth, $requestYear, Utility::speaking());

        return $this->getFormatedArray($lastDayOfMonth, $requestYear, $requestMonth, $speakingData);

    }


    private function getFormatedArray($lastDayOfMonth, $requestYear, $requestMonth, $studyData){

        $labelData = [];
        $dataSet = [];


        for ($i = 1; $i <= $lastDayOfMonth; $i++) {

            $generatedDate = $requestYear . '-' . sprintf("%02d", $requestMonth) . '-' . sprintf("%02d", $i); // for print "02" instead of "2"

            $labelData[] =  sprintf("%02d", $i) . '-' . sprintf("%02d", $requestMonth) . '-' . $requestYear ;

            $filtered = $studyData->where('completed_at', $generatedDate)->first();

            if ( isset($filtered->completed_at) ) {
                $score = ($filtered->score != 0) ? $filtered->score : 1;

                $percentage = ($score / $filtered->full_marks ) * 100;

                $dataSet[] = floatval(number_format($percentage, 1));
            }else{
                $dataSet[] = 0;
            }
        }

        return [
            'data' => $dataSet,
            'label' => $labelData,
        ];
    }

    private function getStudies($requestMonth, $requestYear, $part){

        $studyData = Study::whereRaw('MONTH(completed_at) = '.$requestMonth.' AND YEAR(completed_at) = '.$requestYear)->where('part_no', $part)->groupBy('completed_at')->get([
            DB::raw('sum(score) as score, sum(full_marks) as full_marks'),
            'completed_at'
        ]);

        return $studyData;
    }

}
