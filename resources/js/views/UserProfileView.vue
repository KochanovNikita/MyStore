<template>

    <div class="container">
        <div class="row flex-lg-nowrap">

            <div class="col">
                <input type="hidden" v-if="user" v-model="newUser.id">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="e-profile">

                                    <div class="row">
                                        <div class="col-12 col-sm-auto mb-3">
                                            <div class="mx-auto" style="width: 140px;">
                                                <div class="d-flex justify-content-center align-items-center rounded">
                                                    <img v-if="user"
                                                    :src="user.avatar_path"
                                                    :alt="newUser.name"
                                                    class="avatar">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 v-if="user" class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ newUser.name }}
                                                </h4>
                                                <span v-if="errors && errors.avatar_path"
                                                    v-for="error in errors.avatar_path" class="text-danger"> {{ error
                                                    }}</span>
                                                <div>
                                                    <button ref="dropzoneClick" class="btn btn-primary mt-2">
                                                        <i class="fa fa-fw fa-camera"></i>
                                                        <span>Изменить фото</span>
                                                    </button>
                                                    <div ref="dropzone" class="mt-2 ">

                                                    </div>

                                                </div>
                                            </div>

                                            <div v-if="user" class="text-center text-sm-right">
                                                <span class="badge badge-success">{{ newUser.role }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">
                                            <form class="form" novalidate="">
                                                <div v-if="user" class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Ваше имя</label>
                                                                    <span v-if="errors && errors.name"
                                                                        v-for="error in errors.name"
                                                                        class="text-danger"> {{ error }}</span>
                                                                    <input class="form-control" type="text"
                                                                        v-model="newUser.name"
                                                                        placeholder="Введите Ваше имя">
                                                                </div>
                                                            </div>
                                                            <div class="col col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Номер телефона:</label>
                                                                    <span v-if="errors && errors.phone"
                                                                        v-for="error in errors.phone"
                                                                        class="text-danger"> {{ error }}</span>
                                                                    <input class="form-control" type="tel"
                                                                        pattern="/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/"
                                                                        maxlength="13" v-model="newUser.phone"
                                                                        placeholder="Введите Ваш номер телефона">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Email:</label>
                                                                    <span v-if="errors && errors.email"
                                                                        v-for="error in errors.email"
                                                                        class="text-danger"> {{ error }}</span>
                                                                    <input class="form-control" type="email"
                                                                        v-model="newUser.email"
                                                                        placeholder="Введите Ваш email">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Адресс</label>
                                                                    <span v-if="errors && errors.address"
                                                                        v-for="error in errors.address"
                                                                        class="text-danger"> {{ error }}</span>
                                                                    <input class="form-control" type="text"
                                                                        v-model="newUser.address"
                                                                        placeholder="Введите Ваш адрес">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <button class="btn btn-primary"
                                                            @click.prevent="updateUser">Сохранить изменения</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <div class="card mt-2 bg-opacity-50 bg-gradient-success" v-if="success">
                                        <div class="card-body">
                                            Вы успешно обновили профиль
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import Dropzone from 'dropzone'
export default {
    name: 'UserProdile',
    data() {
        return {
            dropzone: null,
            newAvatar: null,
        }
    },
    mounted() {
        this.dropzone = new Dropzone(this.$refs.dropzone, {
            url: "/file/post",
            maxFiles: 1,
            maxfilesexceeded: function (file) {
                this.removeAllFiles();
                this.addFile(file);
            },
            clickable: this.$refs.dropzoneClick,
            autoProcessQueue: false
        })
    },
    computed: {
        user() {
            return this.$store.getters.user
        },
        newUser() {
            return {
                id: this.user.id,
                name: this.user.name,
                avatar_path: null,
                role_id: this.user.role_id,
                email: this.user.email,
                phone: this.user.phone,
                address: this.user.address == null ? ' ' : this.user.address,
                role: this.user.role
            }
        },
        errors() {
            return this.$store.getters.userErrors
        },
        success() {
            return this.$store.getters.profileUpdated
        }
    },
    methods: {
        updateUser() {
            const fd = new FormData();
            const images = this.dropzone.getAcceptedFiles()
            let data = {}
            fd.append('id', this.user.id)
            fd.append('name', this.newUser.name)
            fd.append('email', this.newUser.email)
            fd.append('avatar_path', images[0] ? images[0] : '')
            fd.append('phone', this.newUser.phone)
            fd.append('address', this.newUser.address)

            for (let [name, value] of fd) {
                data[`${name}`] = value
            }

            this.$store.dispatch('store', data);
            /* axios.patch(`api/user/${this.user.id}`, data)
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error)
                }) */
        },

    },
}
</script>
<style>
.avatar {
    width: 100%;
}

.dz-progress {
    display: none;
}

.dz-error-message {
    display: none;
}

.dz-success-mark {
    display: none;
}

.dz-error-mark {
    display: none;
}
</style>
