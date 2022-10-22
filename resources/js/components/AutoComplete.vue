<template>
    <div class="position-relative w-50">
        <div class="search">
            <i class="fa fa-search"></i>
            <input type="text" placeholder="Enter keywords" v-model="query" class="form-control">
        </div>
        <div class="panel-footer w-100 position-absolute" v-if="results.length">
            <ul class="list-group">
                <li class="list-group-item" v-for="result in results" :key="result.id">
                    <a class="nav-link" :href="resolveMovieUrl(result)">
                        <div class="row">
                            <div class="col h5">
                                {{ result.title }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">{{ result.year }}</div>
                            <div class="col">{{ result.description.substring(0,25) }} ...</div>
                            <div class="col-auto"><b>By: </b>{{ result.director_name }}</div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import {debounce} from "lodash/function";

export default {
    name: "AutoComplete",
    data: () => ({
        query: '',
        results: []
    }),
    watch: {
        query: function (val) {
            this.search()
        }
    },
    methods: {
        autoComplete() {
            this.results = [];
            if (this.query.length > 2) {
                axios.get('/movies/search', {params: {query: this.query}}).then(response => {
                    this.results = response.data.movies;
                });
            }
        },
        search: debounce(function debounceRead() {
            this.autoComplete();
        }, 500),
        resolveMovieUrl(movie) {
            return `/movies/${movie.id}`;
        }
    },
}
</script>

<style scoped>
.panel-footer {
    z-index: 100;
}

.search {
    position: relative;
    box-shadow: 0 0 40px rgba(51, 51, 51, .1);
}

.search input {
    text-indent: 25px;
    border: 2px solid #d6d4d4;
}

.search .fa-search {
    position: absolute;
    top: 12px;
    left: 16px;
}
.nav-link:hover{
    color:#ffc107;
}


</style>
