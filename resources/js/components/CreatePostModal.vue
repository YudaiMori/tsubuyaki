<template>
    <div class="modal fade" id="createPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" @click="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <textarea class="form-control" id="content" rows="8" v-model="form.content" placeholder="いまどうしてる？"></textarea>
                        <croppa ref="croppa"
                                v-if="editPicture"
                                v-model="form.imagePicker"
                                disable-click-to-choose></croppa>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button class="btn btn-link" @click="openFile">
                        <icon :icon="['far', 'image']"></icon>
                    </button>
                    <button type="button" class="btn btn-primary" @click="createPost">つぶやく</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Croppa from 'vue-croppa';
    export default {
        name: "CreatePostModal",
        components: {croppa: Croppa.component},
        data: function() {
            return {
                editPicture: false,
                form: {
                    content: null,
                    imagePicker: {},
                }
            }
        },
        methods: {
            open: function () {
                $('#createPostModal').modal('show');
            },
            close: function () {
                this.editPicture = false;
                this.form.content = null;
                this.form.imagePicker = null;
                $('#createPostModal').modal('hide');
            },
            openFile: function () {
                this.editPicture = true;
                this.$nextTick().then(() => {
                    setTimeout(() => {
                        this.$refs.croppa.chooseFile();
                    }, 150);
                });
            },
            createPost: async function () {
                let formData = new FormData();

                if (this.editPicture) {
                    let image = await this.form.imagePicker.promisedBlob('image/jpeg', 0.8);

                    if (image) {
                        formData.append('image', image);
                    }
                }

                if (this.form.content) {
                    formData.append('content', this.form.content);
                }

                let config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                };

                axios.post('api/v1/store', formData, config)
                    .then((response) => {
                        this.close();
                        this.$emit('post-has-created', response.data.data);
                })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        }
    }
</script>