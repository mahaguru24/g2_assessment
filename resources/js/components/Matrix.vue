<template>
    <div class="py-4">
        <div class="text-xl py-3 ">
            {{label }} {{index + 1}}
        </div>

        <ModifyMatrix
            class="p-4 shadow rounded"
            @updateMatrixStructure="(val) => $emit('updateMatrixStructure', val)"
            :matrixRowAndColCount="matrixRowAndColCount" :index="index"
        />

        <div :class="{'border border-1 border-red-600': !validated }">
            <div v-for="(row, rowNumber) in matrix" :key="`${index}-row-${rowNumber}`" class="flex">
                <div v-for="(col, colNumber) in row" :key="`${index}-col-${colNumber}`"
                     class=" m-2 p-2 shadow h-18 w-18 flex justify-center"
                >
                    <div class="self-center ">
                        <label>
                            <input
                                type="number"
                                :class="{'border border-1 border-red-600': col === ''}"
                                class="w-12 text-center"
                                :name="`${index}-number-${colNumber}`"
                                :value="col"
                                min="0"
                                @input="(event) => {setMatrixValue(rowNumber, colNumber, event.target.value)}"
                            />
                        </label>
                    </div>
                </div>
            </div>
        </div>
<!--        {{matrix}}-->
    </div>
</template>

<script>
import ModifyMatrix from './ModifyMatrix';
export default {
    name: 'Matrix',
    components: {ModifyMatrix},
    props: {
        label: {
            type: String,
            default: 'Matrix'
        },
        matrix: {
            type: Array,
            required: true
        },
        matrixRowAndColCount: {
            type: Object
        },
        index: {
            type: Number,
            required: false
        },
        validated: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        setMatrixValue (rowNumber, colNumber, value) {
            this.$emit('setMatrixValue', {
                rowNumber,
                colNumber,
                value: value,
                matrixIndex: this.index
            })
        }
    }
}
</script>

<style scoped>

</style>
