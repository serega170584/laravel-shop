<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in data">
                <th scope="row">{{ ++count }}</th>
                <td>{{item.title}}</td>
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
                            <input type="text" class="form-control" placeholder="Name" :value="product.title" disabled>
                        </div>
                        <div class="md-form mb-5">
                            <textarea class="form-control" placeholder="Description" name="description" v-model="product.description">
                                {{product.description}}
                            </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="save(product)">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="showModal=false">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProductComponent",
    mounted() {
        console.log('Component mounted.');
        this.data = [];
        axios
            .get('http://localhost:3900/sanctum/csrf-cookie')
            .then(response => (console.log(response)));
        axios
            .get('http://localhost:3900/api/product')
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
            product: {}
        }
    },
    methods: {
        edit: function (id) {
            this.showModal = true;
            this.product = this.data.filter(item => item.id === id).pop();
        },
        save: function (product) {
            this.showModal =false;
            axios
                .post('http://localhost:3900/api/product', product)
                .then(response => (console.log(response)));
        }
    }
}
</script>


