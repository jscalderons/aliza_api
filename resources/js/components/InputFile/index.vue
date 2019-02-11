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

        <images-preview :multiple="multiple" :default-files="defaultFiles" />
    </div>
</template>

<script>
import ImagesPreview from "./ImagesPreview";
export default {
    components: {
        ImagesPreview
    },
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
            const oldFiles = this.files;

            this.files = [];

            if (files.length) {

                if (files[0].type != this.accept) {
                    this.invalid = true;
                    this.valid = false;
                } else {
                    // if (this.multiple) {
                    //     const newFiles = ;

                    //     this.files = oldFiles.concat(newFiles);
                    // } else {
                    //     this.files = files;
                    // }

                    this.files = Array.from(files);
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
    },
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
    padding: .7rem;

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
