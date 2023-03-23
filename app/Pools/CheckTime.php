<?php

namespace App\Pools;

use Illuminate\Support\Carbon;
use App\Models\Constants\TimeConstant;

class CheckTime
{

    public static function checkFirstLiveDraw($second = 0): bool
    {
        $firstFinishTime = Carbon::parse(TimeConstant::FIRST_FINISH_TIME)->toDateTimeString();
        $firstStartTime = Carbon::parse(TimeConstant::FIRST_START_TIME)->addSeconds($second)->toDateTimeString();

        return Carbon::now('Asia/Jakarta')->between($firstStartTime, $firstFinishTime);
    }
}