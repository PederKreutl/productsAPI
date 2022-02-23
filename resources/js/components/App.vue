<template>
    <div class="container">
        <div class="row justify-content-center mt-5 mb-3">
            <h1> Products </h1>
        </div>
        <div class="row justify-content-center mb-3">
            <button @click="setDataSource('mariaDB1')" class="btn btn-primary m-1">MariaDB 1</button>
            <button @click="setDataSource('mariaDB2')" class="btn btn-primary m-1">MariaDB 2</button>
            <button @click="setDataSource('json')" class="btn btn-secondary m-1">JSON</button>
            <button @click="setDataSource('redis')" class="btn btn-danger m-1">redis</button>
        </div>
        <div class="row justify-content-center mb-3">
            <h4>Data source: {{ data_source }}</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 mb-5">
                <div class="card card-body mb-2" v-for="product in products" v-bind:key="product.id">
                    <h3>{{ product.title }}</h3>
                    <hr>
                    <p>Cena: {{ product.price }},-</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                products: [],
                data_source: ""
            }
        },
        created() {
            this.setDataSource('mariaDB1');
        },
        methods : {
            fetchProducts(page_url) {
                fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.products = res.data;
                })
                .catch(err => console.log(err));
            },
            setDataSource(database_connection) {
                this.fetchProducts('/api/products/' + database_connection);
                this.data_source = database_connection;
            }
        }
    }
</script>
