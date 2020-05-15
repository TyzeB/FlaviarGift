<template>
  <div class="container details-form">
    <div class="row text-center row-1">
      <div class="col-md-12">
        <p class="question">
          <b>How long</b> would you like them to enjoy the membership?
        </p>
      </div>
      <div class="col-md-6 col-sm-12 duration" v-on:click="setDuration('half_year')"  v-bind:class="{ 'duration--active' : duration == 'half_year'}">
        <div
          v-bind:class="{ 'active visible' : duration == 'half_year', 'invisible' : duration !== 'half_year'}"
        >
          <span>&check;</span>
        </div>
        <div class="text-center">
          <input
            type="radio"
            v-model="duration"
            name="duration"
            value="half_year"
            id="half_year"
            class="invisible"
          />
          <div class="duration-lbl">
            <label class="lbl" for="duration">HALF A YEAR</label>
            <hr />
            <label class="price">&euro;108</label>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 duration" v-on:click="setDuration('one_year')" v-bind:class="{ 'duration--active' : duration == 'one_year'}">
        <div
          v-bind:class="{ 'active visible' : duration == 'one_year', 'invisible' : duration !== 'one_year'}"
        >
          <span>&check;</span>
        </div>
        <div class="text-center">
          <input
            type="radio"
            v-model="duration"
            name="duration"
            value="one_year"
            id="one_year"
            class="invisible"
          />
          <div class="duration-lbl">
            <label class="lbl" for="duration">1 YEAR</label>
            <hr />
            <label class="price">&euro;216</label>
          </div>
        </div>
      </div>
    </div>
    <div class="row text-center row-1">
      <div class="col-md-12 text-center">
        <p class="question">
          <b>What kind of card</b> would you like?
        </p>
      </div>
      <div class="col-md-6 col-sm-12 card-type" v-on:click="setGiftCard('digital')" v-bind:class="{ 'card-type--active' : gift_card == 'digital'}">
        <div
          v-bind:class="{ 'active visible' : gift_card == 'digital', 'invisible' : gift_card !== 'digital'}"
        >
          <span>&check;</span>
        </div>
        <div class="text-center">
          <input
            type="radio"
            v-model="gift_card"
            name="gift_card"
            value="digital"
            id="digital"
            class="invisible"
          />
          <label class="lbl" for="gift_card">DIGITAL GIFT CARD</label>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 card-type" v-on:click="setGiftCard('handwritten')" v-bind:class="{ 'card-type--active' : gift_card == 'handwritten'}">
        <div
          v-bind:class="{ 'active' : gift_card === 'handwritten', 'invisible' : gift_card !== 'handwritten'}"
        >
          <span>&check;</span>
        </div>
        <div class="text-center">
          <input
            type="radio"
            v-model="gift_card"
            name="gift_card"
            value="handwritten"
            id="handwritten"
            class="invisible"
          />
          <label class="lbl" for="gift_card">HANDWRITTEN PHYSICAL GIFT CARD</label>
        </div>
      </div>
    </div>
    <div class="row text-center row-1">
      <div class="col-md-12 text-center">
        <p class="question">
          <b>Where</b> would you like the card to be sent?
        </p>
      </div>
      <div class="col-md-6 col-sm-12 recipient" v-on:click="setRecipient('me')" v-bind:class="{ 'recipient--active' : recipient == 'me'}">
        <div
          v-bind:class="{ 'active visible' : recipient == 'me', 'invisible' : recipient !== 'me'}"
        >
          <span>&check;</span>
        </div>
        <div class="text-center">
          <input
            type="radio"
            v-model="recipient"
            name="recipient"
            value="me"
            id="me"
            class="invisible"
          />
          <label class="lbl" for="recipient">SEND TO ME</label>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 recipient" v-on:click="setRecipient('them')" v-bind:class="{ 'recipient--active' : recipient == 'them'}">
        <div
          v-bind:class="{ 'active visible' : recipient == 'them', 'invisible' : recipient !== 'them'}"
        >
          <span>&check;</span>
        </div>
        <div class="text-center">
          <input
            type="radio"
            v-model="recipient"
            name="recipient"
            value="them"
            id="them"
            class="invisible"
          />
          <label class="lbl" for="recipient">
            SEND TO THEM
            <br />
            <span>(you must provide their email and home address)</span>
          </label>
        </div>
      </div>
    </div>
    <div class="text-center disclaimer">
        At the moment we ship to all European Union 
        (EU) countries and the United States, with the
        exceptionof the following states: Alabama,
        Alaska, Arkansas, Delaware, Hawaii, Kentucky,
        Massachusetts, North Dakota, Oklahoma,
        Pennsylvania, South Dakota, Texas and Utah.
        Unfortunately, we also cannot ship to Canada, 
        PO Boxes and APO addresses.
      <hr />
    </div>
    <div class="container">
      <recipient-form :duration="duration" :gift_card="gift_card" :recipient="recipient"></recipient-form>
    </div>
  </div>
</template>

<script>
import RecipientForm from "./RecipientForm";

export default {
  name: "App",
  data() {
    return {
      duration: "half_year",
      gift_card: "digital",
      recipient: "me"
    };
  },
  methods: {
    setDuration(dur) {
      this.duration = dur;
      console.log(this.duration);
    },
    setGiftCard(card) {
      this.gift_card = card;
      console.log(this.gift_card);
    },
    setRecipient(re) {
      this.recipient = re;
      console.log(this.recipient);
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../../css/main.scss";
</style>>

</style>