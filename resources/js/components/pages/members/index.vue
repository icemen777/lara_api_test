<template>
    <div>

        <div class="row" v-if="validationErrors">
            <div class="col-8">
                <validation-errors :errors="validationErrors"></validation-errors>
            </div>
        </div>

        <!--Forma for adding members-->
        <div class="row mb-5" id="forma">

                <div class="card mb-3 w-100">
                    <div class="card-header">
                        Добавить участника мероприятия
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="addMember">
                            <div class="form-group">
                                <label for="text1">First Name</label>
                                <input type="text" class="form-control" id="text1" name='first_name' v-model="member.first_name">
                            </div>
                            <div class="form-group">
                                <label for="text2">Last Name</label>
                                <input type="text" class="form-control" id="text2" name='last_name' v-model="member.last_name">
                            </div>
                            <div class="form-group">
                                <label for="text3">E-mail</label>
                                <input type="text" class="form-control" id="text3" name='email' v-model="member.email">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

        </div>


        <div v-if="errored" class="alert-danger alert" role="alert">
            Members is unavailable.
        </div>

        <table v-else class="table table-striped">
            <div v-if="loading">Loading . . . . .</div>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">E-mail</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="member in members" :key="member.id">
                <th scope="row">{{ member.id}}</th>
                <td>{{ member.first_name }}</td>
                <td>{{ member.last_name }}</td>
                <td>{{ member.email }}</td>
                <td>
                    <button class="btn btn-success" @click="updateMember(member)">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger" @click="deleteMember(member.id)">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

        <nav aria-label="Page navigation example" v-if="paginate">
            <ul class="pagination">
                <li :class="{ disabled: !pagination.prev_page_url }"
                    @click.prevent="getMembers(pagination.prev_page_url)"
                    class="page-item"><a class="page-link" href="#">Previous</a></li>

                <li class="page-item disabled"><a class="page-link" href="#">Page {{ pagination.current_page }} from {{
                    pagination.last_page }}</a></li>

                <li :class="{ disabled: !pagination.next_page_url }"
                    @click.prevent="getMembers(pagination.next_page_url)"
                    class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>

    </div>
</template>

<script>
    import ValidationErrors from "../../parts/validationErrors";

    export default {
        data() {
            return {
                members: [],
                member: {
                    id: '',
                    first_name: '',
                    last_name: '',
                    email: ''
                },
                message: '',
                pagination: {},
                edit: false,
                loading: true,
                errored: false,
                validationErrors: '',
                event_item_id: event_item_id,
                paginate: false
            }
        },
        mounted() {
            this.getMembers()
        },
        methods: {
            getMembers(page_url) {
                page_url = page_url || `/api/event_members/${this.event_item_id}`

                axios
                    .get(page_url)
                    .then(response => {
                        this.members = response.data.data
                        this.makePagination(response.data)
                        //console.log(response.data.data)
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true
                    })
                    .finally(
                        () => this.loading = false
                    );
            },
            makePagination(response) {
                let pagination = {
                    current_page: response.current_page,
                    last_page: response.last_page,
                    prev_page_url: response.prev_page_url,
                    next_page_url: response.next_page_url
                }
                this.pagination = pagination
                console.log(this.pagination)
            },
            deleteMember(id) {
                axios
                    .delete(`/api/members/${id}`)
                    .then(response => {
                        //console.log(response)
                        this.getMembers()
                        alert('Members Deleted Successful!')
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true
                    })
                    .finally(
                        () => this.loading = false
                    );

            },
            updateMember(member) {
                this.edit = true
                this.member.id = member.id
                this.member.first_name = member.first_name
                this.member.last_name = member.last_name
                this.member.email = member.email
                VueScrollTo.scrollTo('#forma', 500)
            },
            addMember() {
                if (this.edit === false) {
                    //add member
                    axios
                    .post('/api/members', {
                        first_name: this.member.first_name,
                        last_name: this.member.last_name,
                        email: this.member.email,
                        event_item_id: this.event_item_id
                    })
                        .then(response => {
                            this.member.first_name = ''
                            this.member.last_name = ''
                            this.member.email = ''
                            this.getMembers()
                            alert('Member Added Successful!')
                        })
                        .catch(error => {
                            //console.log('asd', error.response.data.errors)
                            this.getMembers()
                            //this.errored = true
                            this.validationErrors = error.response.data.errors
                        })
                        .finally(
                            () => this.loading = false
                        );
                } else {
                    //edit member
                    axios
                        .put(`/api/members/${this.member.id}`, {
                            first_name: this.member.first_name,
                            last_name: this.member.last_name,
                            email: this.member.email
                        })
                        .then(response => {
                            this.member.first_name = ''
                            this.member.last_name = ''
                            this.member.email = ''
                            this.edit = false
                            this.getMembers()
                            alert('Member Updated Successful!')
                        })
                        .catch(error => {
                            //console.log('asd', error.response.data.errors)
                            this.getMembers()
                            //this.errored = true
                            this.validationErrors = error.response.data.errors
                        })
                        .finally(
                            () => this.loading = false
                        );
                }
            }
        }
    }
</script>

<style scoped>

</style>