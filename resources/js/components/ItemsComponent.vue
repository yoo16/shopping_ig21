<template>
  <div class="row">
    <div v-for="item in items" :key="item.id" class="col-md-4 mb-2">
        <Item :item="item"></Item>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [],
    };
  },
  methods: {
    getItems: function (e) {
      axios
        .get("/api/item/get")
        .then((res) => {
          this.items = res.data;
        })
        .catch((res) => console.log(res));
    },
  },
  mounted() {
    this.getItems();
  },
};
</script>
