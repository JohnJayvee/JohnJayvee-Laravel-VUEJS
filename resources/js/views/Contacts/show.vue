<template>
  <div class="row">
    <div class="col-sm-8 offset-sm-2">
      <h1 class="display-3">Show a contact</h1>
      <div>
        <form @submit.prevent="processEdit">
          <div class="form-group">
            <label for="first_name">First Name:</label>
            <input
              id="first_name"
              type="first_name"
              name="first_name"
              v-model="contact.first_name"
              class="form-control"
              disabled
            />
          </div>

          <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input
              id="last_name"
              type="last_name"
              name="last_name"
              v-model="contact.last_name"
              class="form-control"
              disabled
            />
          </div>

          <div class="form-group">
            <label for="email">Email:</label>

            <input
              id="email"
              type="email"
              name="email"
              v-model="contact.email"
              class="form-control"
              disabled
            />
          </div>
          <div class="form-group">
            <label for="city">City:</label>

            <input
              id="city"
              type="city"
              name="city"
              v-model="contact.city"
              class="form-control"
              disabled
            />
          </div>
          <div class="form-group">
            <label for="country">Country:</label>

            <input
              id="country"
              type="country"
              name="country"
              v-model="contact.country"
              class="form-control"
              disabled
            />
          </div>
          <div class="form-group">
            <label for="job_title">Job Title:</label>

            <input
              id="job_title"
              type="job_title"
              name="job_title"
              v-model="contact.job_title"
              class="form-control"
              disabled
            />
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      contact: {},
    };
  },
  methods: {
    loadData() {
      this.errorMessage = "";
      axios
        .get(`/api/contacts/edit/${this.$route.params.id}`)
        .then((response) => {
          this.contact = response.data.contacts;
          //   console.log(response);
        })
        .catch((error) => {
          //   this.errorMessage = error.response.data.message;
          console.log("error", error);
        });
    },
  },
  mounted() {
    // console.log(this.form)
    this.loadData();
    // console.log(this.$route.params.id)
  },
};
</script>
