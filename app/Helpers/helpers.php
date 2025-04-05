<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class helpers {

    public static function generate_reference_id($randcount, $string, $int)
    {
        $randomString = Str::random($randcount);
        $firstLetter = $string[0];
        $lastLetter = $string[strlen($string) - 1];
        $reference_id = $firstLetter . $lastLetter . $int . $randomString;

        return $reference_id;
    }

    public static function get_model($model, $reference_id){
        $get_model = $model::where('reference_id', $reference_id)->first();

        if(!$get_model){
            abort(404, [
                'message' => 'Model not found',
                'error_code' => 'MODEL_NOT_FOUND',
                'reference_id' => $reference_id
            ]);
        }

        return $get_model;
    }
}
