<template>
    <div>
        <form @submit.stop="submitForm">
            <div>
                <label>
                    Rows
                    <input type="number" min="1" class="border border-1 px-2 w-32" v-model="rowCount" name="rowcount">
                </label>
            </div>
            <div>
                <label>
                    Columns
                    <input type="number" min="1" class="border border-1 px-2 w-32" v-model="colCount" name="colcount">
                </label>
            </div>
            <div class="py-2">
                <button class="bg-blue-500 p-2 rounded-lg text-white w-40" type="submit">
                    Update
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: 'ModifyMatrix',
    props: {
        index: {
            type: Number,
            required: true
        },
        matrixRowAndColCount: {
            type: Object,
            required: true
        }
    },
    created () {
        this.rowCount = this.matrixRowAndColCount.rowCount
        this.colCount = this.matrixRowAndColCount.colCount
    },
    data () {
      return {
          rowCount: 0,
          colCount: 0,
      }
    },
    methods: {
        submitForm (event) {
            event.preventDefault()
            this.$emit('updateMatrixStructure', {
                rowCount: this.rowCount,
                colCount: this.colCount,
                matrixIndex: this.index
            })
            console.log('submitForm', this.rowCount, this.colCount)
        }
    }
}
</script>

<style scoped>

</style>
