<template>
  <div class="row recipient-form text-center">
    <div class="col-md-12">
      <label for="my_details">
        Enter
        <b>your details</b> first:
      </label>
    </div>
    <div class="col-md-12">
      <input
        type="text"
        v-model="user_name"
        name="user_name"
        id="user_name"
        class="form-control"
        placeholder="First and Last name"
      />
    </div>
    <div class="col-md-12">
      <input
        type="email"
        v-model="user_email"
        name="user_email"
        id="user_email"
        class="form-control"
        placeholder="Email Address"
      />
    </div>
    <div class="col-md-12" v-bind:class="{'invisible' : recipient == 'me'}">
      <label for="recipient_details">
        Now enter
        <b>their details</b>:
      </label>
    </div>
    <div class="col-md-12" v-bind:class="{'invisible' : recipient == 'me'}">
      <input
        type="email"
        v-model="recipient_email"
        name="recipient_email"
        id="recipient_email"
        class="form-control"
        placeholder="Recipient's Email Address"
      />
    </div>
    <div
      class="col-md-12"
      v-bind:class="{'invisible' : gift_card == 'digital' || recipient == 'me'}"
    >
      <input
        type="text"
        v-model="recipient_name"
        name="recipient_name"
        id="recipient_name"
        class="form-control"
        placeholder="First and Last Name"
      />
    </div>
    <div class="col-md-12" v-bind:class="{'invisible' : gift_card == 'digital'}">
      <input
        type="text"
        v-model="recipient_address"
        name="recipient_address"
        id="recipient_address"
        class="form-control"
        placeholder="Address"
      />
    </div>
    <div class="col-md-12" v-bind:class="{'invisible' : gift_card == 'digital'}">
      <input
        type="text"
        v-model="recipient_city"
        name="recipient_city"
        id="recipient_city"
        class="form-control"
        placeholder="City"
      />
    </div>
    <div class="col-md-6" v-bind:class="{'invisible' : gift_card == 'digital'}">
      <input
        type="text"
        v-model="recipient_state"
        name="recipient_state"
        id="recipient_state"
        class="form-control"
        placeholder="State"
      />
    </div>
    <div class="col-md-6" v-bind:class="{'invisible' : gift_card == 'digital'}">
      <input
        type="text"
        v-model="recipient_zip_code"
        name="recipient_zip_code"
        id="recipient_zip_code"
        class="form-control"
        placeholder="ZIP Code"
      />
    </div>
    <div class="col-md-12" v-bind:class="{'invisible' : gift_card == 'digital'}">
      <input
        type="text"
        v-model="recipient_country"
        name="recipient_country"
        id="recipient_country"
        class="form-control"
        placeholder="Country"
      />
    </div>
    <div class="col-md-12 text-center" v-bind:class="{'invisible' : recipient == 'me'}">
      <label for="date-picker">
        <b>When</b> would you like us to send the gift card?
      </label>
    </div>
    <div class="col-md-12 text-center date-picker" v-bind:class="{'invisible' : recipient == 'me'}">
      <datetime v-model="selectedDate" placeholder="Month / Day / Year" />
    </div>
    <div class="col-md-12">
      <label for="my_details">
        Add a
        <b>personal message</b> (optional):
      </label>
    </div>
    <div class="col-md-12">
      <input
        type="text"
        name="their_name"
        v-model="their_name"
        id="their-name"
        class="form-control"
        placeholder="Recipient's Name"
      />
    </div>
    <div class="col-md-12">
      <textarea
        type="text"
        v-model="personal_message"
        name="personal_message"
        id="personal-message"
        class="form-control"
        placeholder="Write something nice"
      ></textarea>
    </div>
    <div class="col-md-12">
      <button class="btn btn-submit" v-on:click="submit()">CONTINUE TO CHECKOUT</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "RecipientForm",
  props: {
    duration: String,
    recipient: String,
    gift_card: String
  },
  data() {
    return {
      selectedDate: "",
      user_name: "",
      user_email: "",
      recipient_name: "",
      recipient_email: "",
      recipient_address: "",
      recipient_state: "",
      recipient_zip_code: "",
      recipient_city: "",
      recipient_country: "",
      their_name: "",
      personal_message: ""
    };
  },
  methods: {
    clearAll() {
      this.selectedDate = "";
      this.user_name = "";
      this.user_email = "";
      this.recipient_name = "";
      this.recipient_email = "";
      this.recipient_address = "";
      this.recipient_state = "";
      this.recipient_zip_code = "";
      this.recipient_city = "";
      this.recipient_country = "";
      this.their_name = "";
      this.personal_message = "";
    },
    submit() {
      if (this.user_name === "" || this.user_email === "") {
        alert("Please enter your details.");
        return;
      }
      if (
        this.gift_card === "handwritten" &&
        this.recipient === "me" &&
        (this.user_name === "" ||
          this.user_email === "" ||
          this.recipient_name === "" ||
          this.recipient_zip_code === "" ||
          this.recipient_city === "" ||
          this.recipient_country === "")
      ) {
        alert("Please enter your details.");
        return;
      }

      if (
        this.gift_card === "handwritten" &&
        this.recipient === "them" &&
        (this.user_name === "" ||
          this.user_email === "" ||
          this.recipient_name === "" ||
          this.recipient_email === "" ||
          this.recipient_zip_code === "" ||
          this.recipient_city === "" ||
          this.recipient_country === "")
      ) {
        alert("Please enter their details.");
        return;
      }
      let self = this;
      this.$axios({
        method: "post",
        url: "/api/order",
        data: {
          gift_card: self.gift_card,
          recipient: self.recipient,
          duration: self.duration,
          user_name: self.user_name,
          user_email: self.user_email,
          recipient_name: self.recipient_name,
          recipient_email: self.recipient_email,
          recipient_address: self.recipient_address,
          recipient_state: self.recipient_state,
          recipient_zip_code: self.recipient_zip_code,
          recipient_city: self.recipient_city,
          recipient_country: self.recipient_country,
          their_name: self.their_name,
          personal_message: self.personal_message,
          selectedDate: self.selectedDate
        }
      })
        .then(response => {
          alert(response.data);
          this.clearAll();
        })
        .catch(error => {
          alert(error);
        });
    }
  }
};
</script>

<style lang="scss">
@import "../../css/recipient-form.scss";
</style>