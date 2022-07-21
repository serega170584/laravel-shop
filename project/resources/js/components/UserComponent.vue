<template>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in data">
                    <th scope="row">{{ ++count }}</th>
                    <td>{{item.name}}</td>
                    <td>{{item.email}}</td>
                    <td>
                        <a class="btn btn-primary" href="#" @click="edit(item.id)">Edit</a>
                        <a class="btn btn-primary" href="#">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="modal" :class="{'d-block': showModal}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" @click="showModal=false" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="md-form mb-5">
                            <input type="text" class="form-control" placeholder="Name" :value="user.name" disabled>
                        </div>
                        <div class="md-form mb-5">
                            <input type="email" class="form-control" placeholder="E-mail" :value="user.email" disabled>
                        </div>
                        <div class="md-form mb-5">
                            <input type="email" class="form-control" placeholder="Birthday" name="birthday" v-model="user.birthday">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="saveFunction()">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="showModal=false">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "UserComponent",
    mounted() {
        console.log('Component mounted.');
        this.data = [];
        axios
            .get(window.baseSanctumCsrfUrl)
            .then(response => (console.log(response)));
        axios
            .get(this.baseUrl)
            .then(response => (this.data = response.data));
        this.count = 0;
    },
    beforeUpdate() {
        this.count = 0;
    },
    data: function () {
        return {
            showModal: false,
            data: [],
            count: 0,
            user: {},
            saveFunction: this.saveEdit,
            baseUrl: window.baseUrl + '/user'
        }
    },
    methods: {
        edit: function (id) {
            this.showModal = true;
            this.user = this.data.filter(item => item.id === id).pop();
            this.saveFunction = this.saveEdit;
        },
        saveEdit: function () {
            this.showModal =false;
            this.requestEdit();
        },
        requestEdit: async function () {
            await axios
                .put(this.baseUrl, this.user)
                .then(response => (console.log(response)))
                .catch(function(error) {
                    console.log(error);
                });
            axios
                .get(this.baseUrl)
                .then(response => (this.data = response.data))
                .catch(function(error) {
                    console.log(error);
                });
        }
    }
}
</script>


