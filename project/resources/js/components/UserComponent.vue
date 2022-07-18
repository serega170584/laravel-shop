<template>
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action" v-for="item in data">{{item.name}}</a>
    </div>
</template>

<script>
export default {
    name: "UserComponent",
    mounted() {
        console.log('Component mounted.');
        axios
            .get('http://localhost:3900/sanctum/csrf-cookie')
            .then(response => (console.log(response)));
        axios
            .get('http://localhost:3900/api/user')
            .then(response => (this.data = response.data));
    },
    data: function () {
        return {
            showModal: true,
            data: []
        }
    },
}
</script>


