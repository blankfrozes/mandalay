<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Pools\CheckTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;

class LiveController extends Controller
{
    protected function getLiveResult()
    {
        return Result::where([
            'complete' => CheckTime::checkFirstLiveDraw(0) && Result::where(['complete' => 0])->exists() ? 0 : 1,
        ])->orderBy('periode', 'desc')->first();
    }

    protected function checkHideOrShowNumber($second = 0, $string){
        $result = $string;

        if(CheckTime::checkFirstLiveDraw(0)){
            $check = CheckTime::checkFirstLiveDraw($second);
            $result =  $check ? $string : null;

            if($second >= 900){
                $check ? $this->setLiveDrawToComplete() : null;
            }
        }

        return $result;
    }

    protected function setLiveDraw(){
        $result = $this->getLiveResult();
        $first = str_split($result->first);
        $second = str_split($result->second);
        $third = str_split($result->third);
        $starter = str_split($result->starter);
        $consolation = str_split($result->consolation);

        return [
            'grandPrize' => [
                $this->checkHideOrShowNumber(900, $first[0]),
                $this->checkHideOrShowNumber(870, $first[1]),
                $this->checkHideOrShowNumber(840, $first[2]),
                $this->checkHideOrShowNumber(810, $first[3]),
                $this->checkHideOrShowNumber(780, $first[4]),
                $this->checkHideOrShowNumber(750, $first[5]),
            ],
            'secondPrize' => [
                $this->checkHideOrShowNumber(720, $second[0]),
                $this->checkHideOrShowNumber(690, $second[1]),
                $this->checkHideOrShowNumber(660, $second[2]),
                $this->checkHideOrShowNumber(630, $second[3]),
                $this->checkHideOrShowNumber(600, $second[4]),
                $this->checkHideOrShowNumber(570, $second[5]),
            ],
            'thirdPrize' => [
                $this->checkHideOrShowNumber(540, $third[0]),
                $this->checkHideOrShowNumber(510, $third[1]),
                $this->checkHideOrShowNumber(480, $third[2]),
                $this->checkHideOrShowNumber(450, $third[3]),
                $this->checkHideOrShowNumber(420, $third[4]),
                $this->checkHideOrShowNumber(390, $third[5]),
            ],
            'starter' => [
                $this->checkHideOrShowNumber(360, $starter[0]),
                $this->checkHideOrShowNumber(330, $starter[1]),
                $this->checkHideOrShowNumber(300, $starter[2]),
                $this->checkHideOrShowNumber(270, $starter[3]),
                $this->checkHideOrShowNumber(240, $starter[4]),
                $this->checkHideOrShowNumber(210, $starter[5]),
            ],
            'consolation' => [
                $this->checkHideOrShowNumber(180, $consolation[0]),
                $this->checkHideOrShowNumber(150, $consolation[1]),
                $this->checkHideOrShowNumber(120, $consolation[2]),
                $this->checkHideOrShowNumber(90, $consolation[3]),
                $this->checkHideOrShowNumber(60, $consolation[4]),
                $this->checkHideOrShowNumber(30, $consolation[5]),
            ],
            'date' => $result->created_at,
            'periode' => $result->periode,
        ];
    }

    public function livedraw(): JsonResponse
    {
        $response = $this->setLiveDraw();

        return response()->json($response);
    }

    protected function setLiveDrawToComplete()
    {
        return Result::where([
            'complete' => 0,
        ])->update(['complete' => 1]);
    }
}