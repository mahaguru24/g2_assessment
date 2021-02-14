<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatrixController extends Controller
{
    public function multiply(Request $request) {

        $result = [
            [0, 0, 0],
            [0, 0, 0],
            [0, 0, 0],
        ];
        $arr1 = [
            [1, 1, 1],
            [1, 1, 1],
            [1, 1, 1],
        ];
        $arr2 = [
            [2, 2, 2],
            [2, 2, 2],
            [2, 2, 2],
        ];

        // add validation for matrix multiplication

        for($i=0; $i<3; $i++)
        {
            for($j=0; $j<3; $j++)
            {
//                Rows each element * columns each element. Add each then get one element
                for($k=0; $k<3; $k++)
                    $result[$i][$j] = $result[$i][$j] + $arr1[$i][$k] * $arr2[$k][$j];
            }
        }
        return response()->json(['data' => $result]);
    }
}
