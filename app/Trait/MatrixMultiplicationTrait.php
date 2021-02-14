<?php

namespace App\Trait;
/**
 * Trait MatrixMultiplicationTrait
 */
trait MatrixMultiplicationTrait
{
    /**
     * @param array $arr1
     * @param array $arr2
     * @return array
     */
    public function multiplyMatrix(array $arr1,array $arr2): array {
        $result = [];

        $r = count($arr1);
        $c = count($arr2[0]);
        $in= count($arr2);

        if ( $in != count($arr1[0]) ) {
           trigger_error('Matrix Multiplication not possible', E_USER_ERROR);
        }

        for($i=0;$i< $r; $i++) {
            $result[$i] = [];
        }

        // multiplication
        for($ri=0;$ri<$r;$ri++) {
            for($ci=0;$ci<$c;$ci++) {
                $result[$ri][$ci] = 0.0;
                for($j=0;$j<$in;$j++) {
                    $result[$ri][$ci] += $arr1[$ri][$j] * $arr2[$j][$ci];
                }
            }
        }
        return  $result;
    }
}
