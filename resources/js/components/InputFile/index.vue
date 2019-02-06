<template>
    <div class="file-input"
        :class="{
            'file-input--multiple': multiple,
            'valid': valid,
            'active': active,
            'invalid': invalid
        }"
        @click="handleClick"
        @dragover="dragOverHandle"
        @dragleave="dragLeaveHandle"
        @drop="dropHandle">
        <input style="display: none"
                type="file"
                ref="inputFile"
                :name="name"
                :accept="accept"
                :multiple="multiple"
                @change="fileHandle"/>
        <div v-if="files.length" class="file-input--preview" >
            <img v-for="(file, index) in files"
                :key="index"
                :src="getURI(file)"
                :alt="file.filename"
                class="file-input--preview-img" />
        </div>
        <div v-else-if="defaultFiles" class="file-input--preview">
            <img v-for="(file, index) in defaultFiles.files"
                :key="index"
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
        accept: {
            type: String,
            required: false,
            default: 'image/jpeg'
        },
        name: {
            type: String,
            required: true
        },
        multiple: Boolean,
        defaultFiles: Object
    },
    data() {
        return {
            valid: false,
            active: false,
            invalid: false,
            files: []
        }
    },
    methods: {
        fileHandle(e) {
            const files = e.target.files || e.dataTransfer.files;


            if (files.length) {
                this.files = [];

                if (files[0].type != this.accept) {
                    this.invalid = true;
                    this.valid = false;
                } else {
                    this.files = files;
                    this.invalid = false;
                    this.valid = true;
                    if (e.dataTransfer)
                        this.$refs.inputFile.files = files;
                }
            }
        },
        handleClick() { this.$refs.inputFile.click() },
        dragOverHandle(e) {
            e.preventDefault();
            this.active = true;
         },
        dragLeaveHandle(e) { this.active = false },
        dropHandle(e) {
            e.preventDefault();
            this.fileHandle(e);
            this.active = false;
        },
        getURI(file) {
            return URL.createObjectURL(file);
        }
    }
}
</script>

<style lang="scss" scoped>
    .file-input {
        width: 100%;
        min-height: 200px;
        border: 2px dashed gray;
        border-radius: 10px;
        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;
        color: gray;

        &:hover {
            cursor: pointer;
        }

        &.valid {
            border-color: var(--success);
        }

        &.invalid {
            border-color: var(--danger);
        }

        &.active {
            border-color: var(--primary);
            animation-duration: 1s;
            animation-fill-mode: both;
            animation-iteration-count: infinite;
            animation-name: pulse;
        }
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
    }

    @keyframes pulse {
        from {
            transform: scale3d(1, 1, 1);
        }

        50% {
            transform: scale3d(1.05, 1.05, 1.05);
        }

        to {
            transform: scale3d(1, 1, 1);
        }
    }
</style>
