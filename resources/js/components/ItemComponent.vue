<template>
  <div class="card">
    <div class="card-body">
      <p>
        {{ item.name }}
      </p>
      <p class="row justify-content-center">
        <img :src="'images/now_printing.jpg'" alt="" width="200" />
      </p>
      <p>{{ item.name }}</p>
      <p>&yen;{{ item.price }}</p>
    </div>

    <p class="row justify-content-center">
      <a :href="`cart/add/${item.id}`" class="btn btn-outline-primary">カートに入れる</a>
    </p>
  </div>
</template>

<script>
export default {
    props: ['item'],
}
</script>