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
        // TODO :: implementation
    }
}
