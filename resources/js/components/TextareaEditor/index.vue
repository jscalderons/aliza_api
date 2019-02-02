<template>
    <div>
        <quillEditor :options="options" v-model="content"></quillEditor>
        <input type="hidden" :name="name" :value="content"/>
    </div>
</template>

<script>
import 'quill/dist/quill.snow.css'
import { quillEditor } from 'vue-quill-editor'
import options from './options';

export default {
    components: {
        quillEditor
    },
    props: {
        value: {
            type: String,
            required: false
        },
        name: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            options,
            content: ''
        }
    },
    mounted() {
        this.content = this.value || '';
    }
}
</script>

<style lang="scss">
.quill-editor {
    background: #fff;
    .ql-container {
        height: 200px;
    }
}
</style>
