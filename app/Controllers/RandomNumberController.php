<?php

namespace App\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use Gamblingtec\RNG\Utility\GamblingTecRNG;

class RandomNumberController extends BaseController
{
    public function getRandomNumber(Request $request)
    {
        if ($request->input('secret') !== env('secret') || !is_numeric($request->input('min')) || !is_numeric($request->input('max'))) {
            return response('', 400);
        }
        $min = (int) $request->input('min');
        $max = (int) $request->input('max');
        try {
            $randomNumber = GamblingTecRNG::getInteger($min, $max);
        } catch (\Exception $exception) {
            return response('', 500);
        }
        return response()->json([
            'randomNumber' => $randomNumber
        ]);
    }
}
