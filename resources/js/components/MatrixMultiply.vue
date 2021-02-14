<template>
    <div>
        <div class="flex justify-between">
            <matrix
                @setMatrixValue="setMatrixValue"
                class="m-4" v-for="(matrix, index) in matrices"
                :label="`Matrix ${index+1}`"
                :matrix="matrix"
                :index="index"
                :key="index"
                :validated="validateMatrix(matrix)"
                :matrixRowAndColCount="getMatrixRowAndColCount(matrix)"
                @updateMatrixStructure="updateMatrixStructure"
            />
        </div>

        <p v-if="!validateMatrices" class="text-red-500">
            Matrices invalid to multiply
        </p>
        <div class="flex justify-center">
            <button @click="multiply" class="bg-blue-500 p-4 rounded-lg text-white w-40">Multiply</button>
        </div>

        <div v-if="multipliedMatrix.length > 0"
            class="flex justify-center"
        >
            <matrix
                label="Answered Matrix"
                :editable="false"
                :matrix="multipliedMatrix"
            />
        </div>
    </div>
</template>

<script>
import Matrix from './Matrix';
const getEmptyMatrix = (row, col) => {
    let matrix = [];
    for (let i = 0; i <= (row - 1); i++) {
        matrix[i] = []
        for (let j = 0; j <= (col - 1); j++) {
            if (matrix[i][j] ===  undefined) {
                matrix[i][j] = (j + 1)
            }
        }
    }
    return matrix;
}
export default {
    name: 'MatrixMultiply',
    components: {Matrix},
    data () {
        return {
            matrices: [
                     getEmptyMatrix(3,3),
                     getEmptyMatrix(3,3)
            ],
            multipliedMatrix: []
    }
    },
    computed: {

        validateMatrices () {
            let matrix1 = this.getMatrixRowAndColCount(this.matrices[0])
            let matrix2 = this.getMatrixRowAndColCount(this.matrices[1])
            return matrix1.colCount === matrix2.rowCount
        },
    },
    methods: {

        multiply () {
            if (this.validateMatrices) {
                axios.create({
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    timeout: 6000
                })
                .post('/api/matrix/multiply', {
                    matrices: this.matrices
                })
                .then(res => {
                    console
                    .log(res.data.data)
                    this.multipliedMatrix = res.data.data
                })
            }
        },

        updateMatrixStructure ({rowCount, colCount, matrixIndex}) {
            this.matrices = this.matrices.map((el, index) => {
                if (index === matrixIndex) {
                    return getEmptyMatrix(rowCount, colCount)
                }
                return el
            })
        },

        validateMatrix (matrix) {
            for (let i = 0; i <= (matrix.length - 1); i++) {
                for (let j = 0; j <= (matrix[i].length - 1); j++) {
                    if(typeof matrix[i][j] !== 'number') {
                        console.log(typeof matrix[i][j], matrix[i][j])
                        return false
                    }
                }
            }
          return true
        },

        getMatrixRowAndColCount (matrix) {
            const rowCount = matrix.length
            return {
                rowCount: rowCount,
                colCount: rowCount > 0
                    ? matrix[0].length
                    : 0

            }
        },

        setMatrixValue ({rowNumber, colNumber, value, matrixIndex}) {
            // console.log(this.matrices)
            this.matrices = this.matrices.map((el, index) => {
              if (index === matrixIndex) {
                  el =  el.map((row, rowIndex) => {
                      if (rowIndex === rowNumber) {
                          row = row.map((col, colIndex) => {
                              if (colIndex === colNumber) {
                                  col = Number(value)
                                  console.log('changing')
                              }
                              return col
                          })
                      }
                      return row
                  })
              }
                return el
            })
            // console.log(this.matrices)
        }
    }
}
</script>

<style scoped>

</style>
