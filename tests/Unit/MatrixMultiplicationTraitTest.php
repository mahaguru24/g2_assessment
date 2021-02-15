<?php

namespace Tests\Unit;

use App\Trait\MatrixMultiplicationTrait;
use PHPUnit\Framework\TestCase;

class MatrixMultiplicationTraitTest extends TestCase
{
    use MatrixMultiplicationTrait;

    protected $testPassData = [
        [
          'matrix1' => [
              [1, 1, 1],
              [1, 1, 1],
              [1, 1, 1],
          ],
          'matrix2' => [
              [2, 2, 2],
              [2, 2, 2],
              [2, 2, 2],
          ],
          'result' => [
              [6, 6, 6],
              [6, 6, 6],
              [6, 6, 6],
          ]
        ],
        [
          'matrix1' => [
              [1, 2, 3],
              [4, 5, 6],
          ],
          'matrix2' => [
              [7, 8],
              [9, 10],
              [11, 12],
          ],
          'result' => [
              [58, 64],
              [139, 154],
          ]
        ]
    ];

    protected $testFailData = [
        [
          'matrix1' => [
              [1, 1],
          ],
          'matrix2' => [
              [2, 2, 2],
              [2, 2, 2],
              [2, 2, 2],
          ],
          'result' => ['error' => 'Matrix Multiplication not possible']
        ]
    ];



    /**
     * A basic test example.
     *
     * @return void
     */
    public function testMultiplicationPass()
    {

        foreach ($this->testPassData as $data) {

            $result = $this->multiplyMatrix(
                $data['matrix1'],
                $data['matrix2']
            );

            $this->assertEquals($result , $data['result']);
        }

    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testMultiplicationFail()
    {

        foreach ($this->testFailData as $data) {

            $result = $this->multiplyMatrix(
                $data['matrix1'],
                $data['matrix2']
            );

            $this->assertEquals($result , $data['result']);
        }
    }
}
