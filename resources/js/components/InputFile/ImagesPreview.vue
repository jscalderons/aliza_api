<template>
    <div :class="previewClass">
        <div v-if="$parent.files.length" >
            <img v-for="(file, index) in $parent.files" :key="index"
                :src="getUrl(file)"
                :alt="file.filename"
                class="file-input--preview-img" />
        </div>
        <div v-else-if="defaultFiles">
            <img v-for="(file, index) in defaultFiles.files" :key="index"
                :src="`${defaultFiles.base}/${file.filename}`"
                :alt="file.filename"
                class="file-input--preview-img" />
        </div>
        <span v-else>
            Arrastra los archivos aquí o haga click aquí
        </span>
    </div>
</template>

<script>
export default {
    props: {
        multiple: Boolean,
        defaultFiles: Object
    },
    methods: {
        getUrl(file) {
            return URL.createObjectURL(file);
        }
    },
    computed: {
        previewClass() {
            return this.multiple ? 'file-input--preview-multiple' : 'file-input--preview';
        }
    }
}
</script>

<style lang="scss">
.file-input--preview {
    width: 100%;
    height: 100%;
    padding: .7rem;

    .file-input--preview-img {
        display: inline-block;
        border-radius: 10px;
        width: 100%;
    }
}

.file-input--preview-multiple {
    display: flex;
    max-height: 200px;
    width: 100%;
    text-align: center;
    justify-content: center;
    white-space: nowrap;
    overflow-y: hidden;
    overflow-x: scroll;
    /* Firefox: hidden scroll */
    // scrollbar-width: none;
    -webkit-overflow-scrolling: touch;
    // &::-webkit-scrollbar {
    //     display: none;
    // }
    div {
        width: 100%;
    }
    .file-input--preview-img {
        display: inline-block;
        height: 100%;
        border-radius: 10px;
        &:not(:last-child) {
            padding-right: .5rem;
        }
    }

}

</style>
