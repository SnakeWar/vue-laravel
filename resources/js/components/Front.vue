<template>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-5 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        CRUD - Vue
                    </div>
                    <div class="alert alert-success mt-1" v-if="savingSuccessful">
                        {{success}}
                    </div>
                    <div class="alert alert-danger mt-1" v-if="deletingSuccessful">
                        {{deleted}}
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <input v-model="form.name" class="form-control form-control-lg" type="text" placeholder="O que vamos fazer hoje?">
                            </div>
                            <div class="form-group">
                                <input v-model="form.date" class="form-control form-control-lg" type="date" placeholder="20/01/1988">
                            </div>
                            <a v-on:click="savePost" class="btn btn-outline-primary">
                                Criar
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12">
                <div class="card mt-1" v-for="(val, index) in posts" :key="index">
                    <div class="card-header">
                        {{ dateFormat(val.date) }}
                    </div>
                    <div class="card-body d-flex justify-content-between">
                        <span>{{index+1}} - {{val.name}}</span>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-warning mr-1"  data-bs-toggle="modal" data-bs-target="#modal" v-on:click="editForm(val.id)" ><i class="far fa-edit" ></i></button>
                            <button class="btn btn-danger" v-on:click="deletePost(val.id)">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal Vue</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-warning mt-1" v-if="updatingSuccessful">
                                        {{updated}}
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <input type="hidden" v-model="update.id">
                                            <input class="form-control form-control-lg" type="text" v-model="update.name">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-lg" type="date" v-model="update.date">
                                        </div>
                                        <a v-on:click="updatePost" class="btn btn-outline-primary">
                                            Atualizar
                                        </a>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

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
    import $ from 'jquery';
    export default {
        name: "Front",
        data () {
            return {
                form : {},
                update : {name: '',date: ''},
                updateForm: {},
                success : 'Salvo com sucesso',
                updated : 'Atualizado com sucesso',
                deleted : 'Excluído com sucesso',
                items : {},
                savingSuccessful : false,
                updatingSuccessful: false,
                deletingSuccessful: false,
                posts : []
            }
        },
        mounted() {
            this.loadPosts();
        },
        components: {

        },
        methods: {
            loadPosts: function () {
                axios.get('/api/todos')
                    .then((response) => {
                        this.posts = response.data.data
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            savePost: function () {

                console.log('dentro')
                axios.post('/api/todos/store', {
                    name: this.form.name,
                    date: this.form.date
                })
                    .then((response) => {
                        console.log(response.data);
                        if(response.data === 'Salvo')
                        {
                            this.savingSuccessful = true;
                            setTimeout(() => {
                                this.savingSuccessful = false;
                            }, 3000);
                            // alert('Salvo');
                        }
                        this.loadPosts();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            editForm: function (id){
                axios.get('/api/todos/'+id)
                    .then((response) => {
                        console.log(response.data);
                        this.update.name = response.data.name
                        this.update.date = this.dateFormatDb(response.data.date)
                        this.update.id = response.data.id
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            updatePost: function () {
                console.log('atualizar')
                axios.put('/api/todos/'+this.update.id, {
                    name: this.update.name,
                    date: this.update.date
                })
                    .then((response) => {
                        console.log(response.data);
                        if(response.data === 'Atualizado')
                        {
                            this.updatingSuccessful = true;
                            setTimeout(() => {
                                this.updatingSuccessful = false;
                            }, 3000);
                            // alert('Salvo');
                        }
                        this.loadPosts();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            deletePost: function (id) {
                axios.delete('/api/todos/'+id)
                    .then((response) => {
                        console.log(response.data);
                        if(response.data === 'Deletado')
                        {
                            this.deletingSuccessful = true;
                            setTimeout(() => {
                                this.deletingSuccessful = false;
                            }, 3000);
                            // alert('Salvo');
                        }
                        this.loadPosts();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            dateFormat: function (date) {
                return dateFormat(date, 'dd/mm/yyyy');
            },
            dateFormatDb: function (date) {
                return dateFormat(date, 'yyyy-mm-dd');
            }
        }
    }
</script>

<style scoped>
    .none {
        display: none;
    }
</style>
