<template>
  <div class="row">
    <div class="col-sm-12">
      <h1 class="display-3">Contacts</h1>
      <table class="table table-striped">
        <thead>
          <tr>
            <!-- <td>ID</td> -->`
            <td>Name</td>
            <td>Email</td>
            <td>City</td>
            <td>Country</td>
            <td>Job Title</td>
            <td colspan="3">Actions</td>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in this.contacts" :key="item.id">
            <td>{{ item.first_name }} {{ item.last_name }}</td>
            <td>{{ item.email }}</td>
            <td>{{ item.city }}</td>
            <td>{{ item.country }}</td>
            <td>{{ item.job_title }}</td>
            <td>
              <!-- <a href="" class="btn btn-warning">Show </a> -->
              <router-link
                :to="{ name: 'contactsShow', params: { id: item.id } }"
                ><button class="btn btn-warning">Show</button>
              </router-link>
            </td>
            <td>
              <router-link
                :to="{ name: 'contactsEdit', params: { id: item.id } }"
                ><button class="btn btn-success">Edit</button></router-link
              >
            </td>
            <td>
              <button
                class="btn btn-danger"
                type="button"
                @click="deleteContact(item.id)"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <div>
        <router-link :to="{ name: 'contactsCreate' }"><button class="btn btn-primary">Add</button></router-link>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      contacts: null,
      form: {
        first_name: "",
        last_name: "",
        email: "",
        city: "",
        country: "",
        job_title: "",
      },
      errorMessage: "",
      user: "",
    };
  },
  methods: {
    loadData() {
      this.errorMessage = "";
      axios
        .get("/api/contacts/index")
        .then((response) => {
          this.contacts = response.data.contacts;
          console.log(response);
        })
        .catch((error) => {
          //   this.errorMessage = error.response.data.message;
          console.log("error", error);
        });
    },

    deleteContact(id) {
      if (confirm("Are you sure wants to delete the contact")) {
        axios
          .delete(`api/contacts/delete/${id}`)
          .then((response) => {
            this.contacts = this.contacts.filter(function (contact) {
              return contact.id != id;
            });
            console.log(response);
          })
          .catch((error) => {
            //   this.errorMessage = error.response.data.message;
            console.log("error", error);
          });
      }
    },
  },
  mounted() {
    // console.log(this.form)
    this.loadData();
  },
};
</script>

