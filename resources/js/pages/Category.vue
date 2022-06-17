<template>
    <div class="container">
        <div class="btn btn-success my-2" data-bs-toggle="modal" data-bs-target="#myModal" id="button_add" ref="ref_button_add" @click="addNew()">Add New</div>
        <table class="table table-dark table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="category in categories" :key="category.id">
                    <td>{{ category.id }}</td>
                    <td>{{ category.name }}</td>
                    <td>{{ category.status }}</td>
                    <td>
                        <button class="btn btn-small btn-primary mx-2" @click="editHanlder(category.id)">Edit</button>
                        <button class="btn btn-small btn-danger mx-2" @click="deleteHandler(category.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- <AlertBox/> -->

        <!-- The Modal -->
        <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"  ref="ref_button_close"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form >
                    <div class="mb-3 mt-3">
                        <label class="form-label">Name :</label>
                        <input type="text" class="form-control"  placeholder="Enter Name" v-model="category.name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status:</label>
                        <select class="form-control" v-model="category.status">
                            <option v-bind:value="1" selected>Active</option>
                            <option v-bind:value="2">InActive</option>
                        </select>
                    </div>

                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click=" addHandler(eidtId)">Save</button>
            </div>
                
            </div>
        </div>
        </div>
        <Loading v-if="loading" />
    </div>
</template>

<script>
import * as Vue from 'vue' // in Vue 3
import axios from 'axios'
import VueAxios from 'vue-axios'
import Loading from '../animations/Loading.vue'
import AlertBox from '../components/AlertBox.vue'

export default ({
   data() {
       return {
           categories : [],
           category: {
               'name': '111',
               'status' : null
           },
           loading:false,
           eidtId: null,
       }
   },
   components:{
        Loading,
        AlertBox
   },
   methods: {
       addHandler(id) {
           if(this.eidtId == null) {
                this.loading = true
                axios.post("http://127.0.0.1:9080/api/add-category", this.category)
                    .then((response) => {
                        this.categories.push(response.data.category)
                        this.loading = false
                    })
                    .catch(error => {
                        this.errorMessage = error.message;
                        console.error("There was an error!", error);
                });
           } else {
                this.loading = true
                axios.put(`http://127.0.0.1:9080/api/update-category/${id}`, this.category)
                .then((response) => {
                        this.loading = false
                        let buttonClose = this.$refs["ref_button_close"];
                        for(var i= 0;i<this.categories.length;i++){
                            if(this.categories[i].id == id) {
                                this.categories[i].name = this.category.name;
                                this.categories[i].status = this.category.status;
                                break;
                            }
                        }
                        buttonClose.click();
                    
                })
                .catch(error => {
                    console.log(error);
                });
                }
       },
       deleteHandler(id) {
           this.loading = true
           axios.delete(`http://127.0.0.1:9080/api/delete-category/${id}`)
           .then((response) => {
                let i = this.categories.map(item => item.id).indexOf(id) // find index of your object
                this.categories.splice(i, 1)
                this.loading = false
           })
           .catch(error => {
               console.log(error);
           });
       },
       editHanlder(id) {
           this.loading = true
           let buttonAdd = this.$refs["ref_button_add"];
           buttonAdd.click();
           axios.get(`http://127.0.0.1:9080/api/edit-category/${id}`)
           .then((response) => {
                this.loading = false
                this.category = response.data.category
                  this.eidtId = id
           })
           .catch(error => {
               console.log(error);
           });
       },
       addNew() {
           this.eidtId = null
       }
   },
   created() {
        this.loading = true
        axios.get('http://127.0.0.1:9080/api/get-categories')
        .then((response) => {
            this.categories = response.data.categories
            this.loading = false
        })
        .catch(error => {
            this.errorMessage = error.message;
            console.error("There was an error!", error);
        });

   }
})
</script>
