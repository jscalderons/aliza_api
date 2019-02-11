<template>
    <dropzone :multiple="true" accept="image/jpeg" @upload="uploadFile" :progress="progress">
        <template v-slot:default>
            <div v-if="uploading.state">
                <span>Subiendo {{uploading.quantity}}</span>
            </div>
            <div v-else-if="files.length">
                <span>{{files.length}} Archivo almacenados</span>
            </div>
            <div v-else>
                <span>Arrastra los archivos aquí o haga click aquí</span>
            </div>
            <input type="hidden" name="uid" :value="uid">
        </template>

    </dropzone>
</template>

<script>
import Dropzone from "./Dropzone";

export default {
    components: {
        Dropzone
    },
    props: {
        uploadUrl: String
    },
    data() {
        return {
            uid: '',
            files: [],
            url: '/',
            progress: 0,
            uploading: {
                state: false,
                quantity: 0
            },
            settings: {
                onUploadProgress: this.onUploadProgress,
            }
        }
    },
    mounted() {
        if (this.uploadUrl) this.url = this.uploadUrl;
    },
    methods: {
        uploadFile(data, files) {
            this.progress = 0;
            this.uploading.state = true;
            this.uploading.quantity = files.length;

            axios.post(this.url, data, this.settings).then((res) => {
                console.log(res.status);

                if (res.status == 201) {
                    this.uploading.state = false;
                    this.files = this.files.concat(files);
                    this.uid =  this.uid || res.data.uid;
                }
            })
            .catch((err) => {
                console.error(err);
            });
        },
        onUploadProgress(progressEvent) {
            this.progress = Math.round( (progressEvent.loaded * 100) / progressEvent.total );
        }
    }
}
</script>

<style lang="scss">

</style>
