<?php

namespace App\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Gamblingtec\RNG\Utility\GamblingTecRNG;

class RandomNumberController extends BaseController
{
    public function getRandomNumber(string $hash, int $min, int $max)
    {
        $calculatedHash = md5((string)$min . env('secret') . (string)$max);
        if ($hash !== $calculatedHash) {
            return response('', 400);
        }
        $randomNumber = GamblingTecRNG::getInteger($min, $max);
        return response()->json([
            'randomNumber' => $randomNumber
        ]);
    }
}
