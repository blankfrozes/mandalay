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
            'complete' => Result::where(['complete' => 0])->exists() ? 0 : 1,
        ])->orderBy('periode', 'desc')->first();
    }

    protected function checkHideOrShowNumber($second = 0, $string){
        if(CheckTime::checkFirstLiveDraw(0)){
            return CheckTime::checkFirstLiveDraw($second) ? $string : null;
        }else if(CheckTime::checkSecondLiveDraw(0)){
            return CheckTime::checkSecondLiveDraw($second) ? $string : null;
        }else if(CheckTime::checkThirdLiveDraw(0)){
            return CheckTime::checkThirdLiveDraw($second) ? $string : null;
        }else if(CheckTime::checkFourthLiveDraw(0)){
            return CheckTime::checkFourthLiveDraw($second) ? $string : null;
        }else{
            return $string;
        }

        return null;
    }

    protected function setLiveDraw(){
        $result = $this->getLiveResult();
        $consolation = explode(',', $result->consolation);
        $starter = explode(',', $result->starter);

        return [
            'consolation' => [
                $this->checkHideOrShowNumber(360, $consolation[0]),
                $this->checkHideOrShowNumber(300, $consolation[1]),
                $this->checkHideOrShowNumber(240, $consolation[2]),
                $this->checkHideOrShowNumber(180, $consolation[3]),
                $this->checkHideOrShowNumber(120, $consolation[4]),
                $this->checkHideOrShowNumber(60, $consolation[5]),
            ],
            'starter' => [
                $this->checkHideOrShowNumber(720, $starter[0]),
                $this->checkHideOrShowNumber(660, $starter[1]),
                $this->checkHideOrShowNumber(600, $starter[2]),
                $this->checkHideOrShowNumber(540, $starter[3]),
                $this->checkHideOrShowNumber(480, $starter[4]),
                $this->checkHideOrShowNumber(420, $starter[5]),
            ],
            'thirdPrize' => $this->checkHideOrShowNumber(780, $result->third),
            'secondPrize' => $this->checkHideOrShowNumber(840, $result->second),
            'grandPrize' => $this->checkHideOrShowNumber(900, $result->first),
            'date' => $result->created_at,
            'periode' => $result->periode,
        ];
    }

    public function livedraw(): JsonResponse
    {
        $response = $this->setLiveDraw();

        CheckTime::checkFirstLiveDraw(950) ? $this->setLiveDrawToComplete() : null;

        return response()->json($response);
    }

    protected function setLiveDrawToComplete()
    {
        return Result::where([
            'complete' => 0,
        ])->update(['complete' => 1]);
    }
}