<template>
    <div class="modal fade" id="updateProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" @click="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" v-if="user">
                    <div class="form-group">
                        <p>プロフィール画像</p>
                        <croppa v-model="form.imagePicker"
                                :initial-image="user.attributes.image_url"></croppa>
                    </div>
                    <div class="form-group">
                        <p>名前</p>
                        <input type="text" class="form-control" v-model="form.name">
                    </div>
                    <div class="form-group">
                        <p>自己紹介</p>
                        <input type="text" class="form-control" v-model="form.introduction">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="save">保存</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Croppa from 'vue-croppa';
    export default {
        name: "UpdateProfileModal",
        components: {croppa: Croppa.component},
        data: function () {
            return {
                user: null,
                form: {
                    name: null,
                    introduction: null,
                    imagePicker: {},
                }
            }
        },
        methods: {
            open: function (user) {
                this.user = user;
                this.form.name = user.attributes.name;
                this.form.introduction = user.attributes.introduction;
                $('#updateProfileModal').modal('show');
            },
            close: function () {
                $('#updateProfileModal').modal('hide');
            },
            save: async function () {
                let formData = new FormData();

                formData.append('_method', 'patch');

                let image = await this.form.imagePicker.promisedBlob('image/jpeg', 0.8);

                if (image) {
                    formData.append('image', image);
                }

                if (this.form.name) {
                    formData.append('name', this.form.name);
                }

                if (this.form.introduction) {
                    formData.append('introduction', this.form.introduction);
                }

                let config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                };

                axios.post('/api/v1/users/profile', formData, config)
                    .then(response => {
                        this.close();
                        location.reload();
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        }
    }
</script>