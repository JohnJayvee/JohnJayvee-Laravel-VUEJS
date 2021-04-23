<template>
  <div class="row">
    <div class="col-sm-8 offset-sm-2">
      <h1 class="display-3">Add a contact</h1>
      <div>
        <!-- @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br /> -->

        <!-- <form method="post" action="{{ route('contact.store') }}"> -->
        <form @submit.prevent="processCreate">
          <div class="form-group">
            <label for="first_name">First Name:</label>
            <!-- <input type="text" class="form-control" name="first_name" /> -->
            <input
              id="first_name"
              type="first_name"
              name="first_name"
              v-model="form.first_name"
              class="form-control"
              required
              autofocus
            />
          </div>

          <div class="form-group">
            <label for="last_name">Last Name:</label>
            <!-- <input type="text" class="form-control" name="last_name" /> -->
            <input
              id="last_name"
              type="last_name"
              name="last_name"
              v-model="form.last_name"
              class="form-control"
              required
              autofocus
            />
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <!-- <input type="text" class="form-control" name="email" /> -->
            <input
              id="email"
              type="email"
              name="email"
              v-model="form.email"
              class="form-control"
              required
              autofocus
            />
          </div>
          <div class="form-group">
            <label for="city">City:</label>
            <!-- <input type="text" class="form-control" name="city" /> -->
            <input
              id="city"
              type="city"
              name="city"
              v-model="form.city"
              class="form-control"
              required
              autofocus
            />
          </div>
          <div class="form-group">
            <label for="country">Country:</label>
            <!-- <input type="text" class="form-control" name="country" /> -->
            <input
              id="country"
              type="country"
              name="country"
              v-model="form.country"
              class="form-control"
              required
              autofocus
            />
          </div>
          <div class="form-group">
            <label for="job_title">Job Title:</label>
            <!-- <input type="text" class="form-control" name="job_title" /> -->
            <input
              id="job_title"
              type="job_title"
              name="job_title"
              v-model="form.job_title"
              class="form-control"
              required
              autofocus
            />
          </div>
          <button type="submit" class="btn btn-primary">
            Add contact
          </button>
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
    processCreate() {
      this.errorMessage = "";
      axios
        .post("/api/contacts/store", this.form)
        .then((response) => {
          this.$router.push({ name: "contactsIndex" });
        })
        .catch((error) => {
          this.errorMessage = error.response.data.message;
          console.log("error", error.response);
        });
    },
  },
  mounted() {
    // console.log(this.form)
  },
};
</script>
