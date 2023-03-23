<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Result;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class ResultController extends Controller
{
    public function index(): JsonResponse
    {
        $results = Result::select(['id', 'periode', 'first', 'second', 'third', 'created_at'])
            ->where(['complete' => 1])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($results);
    }

    public function indexByDay(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'day' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $dayNumber = getDayNumber($request->day);

        if ($dayNumber === 0) {
            return response()->json($validator->errors(), 422);
        }

        $results = Result::select(['id', 'periode', 'first', 'second', 'third', 'starter', 'consolation', 'created_at'])
            ->where(['complete' => 1])
            ->where(Result::raw("DAYOFWEEK(created_at)"), $dayNumber)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return response()->json($results);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show(Request $request): JsonResponse
    {
        $result = Result::select(['id', 'periode', 'first', 'second', 'third', 'starter', 'consolation', 'created_at'])
            ->where('id', $request->id)
            ->where('complete', true)
            ->first();

        if(!$result){
            return response()->json(["error" => "Result not found!"], 422);
        }

        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}