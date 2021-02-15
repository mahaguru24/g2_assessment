<template>
    <div class="py-4">
        <div class="text-xl py-3 ">
            Answer
        </div>

        <div>
            <div v-for="(row, rowNumber) in matrix" :key="`row-${rowNumber}`" class="flex">
                <div v-for="(col, colNumber) in row" :key="`col-${colNumber}`"
                     class=" m-2 p-2 shadow h-18 w-18 flex justify-center"
                >
                    <div class="self-center ">
                        <input type="text" class="text-center" disabled :value="String.fromCharCode(col)" :name="`answer-${row}-${col}`" />
                    </div>
                </div>
            </div>
        </div>
        <!--        {{matrix}}-->
    </div>
</template>

<script>
export default {
    name: 'AnswerMatrix',
    props: {
        matrix: {
            type: Array,
            required: true
        }
    }
}
</script>

<style scoped>
    input:disabled {
        background-color: white !important;
    }
</style>
