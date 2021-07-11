<template>
    <div>
        <div v-for="item in items" :key="item.id">
            <div class="detail">
                <h3 class="title">{{ item.name }}</h3>
                <h4 class="skill">{{ item.skill }}</h4>
            <button v-on:click="goToDetail(item.id)" class="c-button">詳細</button>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        props: {
            items: {
                type: Array
            }
        },
        methods: {
            goToDetail(id) {
                axios.get('/items/show/' + id)    
                .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });       
            }
        }
    }
</script>