<template>
    <div class="">
        <matrix-multiply />
    </div>
</template>
<script>
import MatrixMultiply from '../components/MatrixMultiply';
const default_layout = "default";

export default {
    components: {MatrixMultiply},
    computed: {},
    data() {
        return {
            message:'Hello World!!'
        }
    }
};
</script>

<style>

</style>
