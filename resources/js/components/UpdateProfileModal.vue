<template>
    <div class="modal fade" id="updateProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" @click="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group" v-if="user">
                        <input type="text" class="form-control" v-model="form.name">
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
    export default {
        name: "UpdateProfileModal",
        data: function () {
            return {
                user: null,
                form: {
                    name: null
                }
            }
        },
        methods: {
            open: function (user) {
                this.user = user;
                this.form.name = user.attributes.name;
                $('#updateProfileModal').modal('show');
            },
            close: function () {
                $('#updateProfileModal').modal('hide');
            },
            save: function () {
                axios.patch('/api/v1/users/profile', {
                    name: this.form.name,
                })
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