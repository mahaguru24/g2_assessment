<?php

namespace App\Http\Controllers;

use App\Trait\MatrixMultiplicationTrait;
use Illuminate\Http\Request;

/**
 * Class MatrixController
 * @package App\Http\Controllers
 */
class MatrixController extends Controller
{
    use MatrixMultiplicationTrait;
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function multiply(Request $request) {
        $attributes = $request->all();
        $arr1 = $attributes['matrices'][0];
        $arr2 = $attributes['matrices'][1];

        // todo add validation for matrix multiplication

        $result = $this->multiplyMatrix($arr1, $arr2);
        return response()->json(['data' => $result]);
    }
}
