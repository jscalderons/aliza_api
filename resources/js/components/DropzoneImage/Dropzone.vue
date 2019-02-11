<template>
    <div class="dropzone"
        :class="dropzoneClass"
        @dragover.prevent="dragOverHandle"
        @drop.prevent="dropHandle"
        @click="clickHandle">
        <input type="file" ref="inputFile" :accept="accept" @change="fileHandle" :multiple="multiple" hidden>

        <div class="text-help">
            <slot></slot>

            <div class="progress" v-show="$parent.uploading.state">
                <div class="progress-bar" role="progressbar"
                    :aria-valuenow="progress"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    :style="{ width: progress + '%' }"></div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    props: {
        multiple: {
            type: Boolean,
            default: false
        },
        accept: {
            type: String,
            default: '*'
        },
        progress: Number
    },
    data() {
        return {
            drag: false
        }
    },
    methods: {
        dragOverHandle(e) {
            this.drag = true;
        },
        dropHandle(e) {
            this.drag = false;
            this.fileHandle(e);
        },
        clickHandle() {
            this.$refs.inputFile.click();
        },
        fileHandle(e) {
            let files = e.target.files || e.dataTransfer.files;

            if (!this.$parent.uploading.state) {
                const data = new FormData();

                files = Array.from(files);

                files.forEach(file => {
                    data.append('files[]', file);
                });

                this.$emit('upload', data, files);
            }
        }
    },
    computed: {
        dropzoneClass() {
            return {
                'is-dragover': this.drag
            }
        }
    }
}
</script>

<style lang="scss">
.dropzone {
    transition: all .5s;
    width: 100%;
    min-height: 100px;
    margin: 0;
    padding: 1rem;
    border-radius: 10px;
    border: 2px dashed var(--gray);
    color: var(--gray);
    text-align: center;
    align-items: center;
    display: flex;
    justify-content: center;
    align-items: center;

    &:hover {
        cursor: pointer;
    }

    &.is-dragover {
        color: var(--primary);
        border-color: var(--primary);
        animation-duration: 1s;
        animation-fill-mode: both;
        animation-iteration-count: infinite;
        animation-name: pulse;
    }

    .text-help {
        width: 50%;
        font-size: 1.2rem;
    }
}

// &.is-invalid {
//     color: $error;
//     border-color: $error;
// }
// &.is-valid {
//     color: $success;
//     border-color: $success;
// }

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
