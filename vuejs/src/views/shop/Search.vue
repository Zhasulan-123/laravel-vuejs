<template>
    <div class="container">
        <div class="row" style="margin-top: 6%;">
            <h2>Поиск товара</h2>
            <div class="col">
                <form>
                    <input class="form-control" v-model="search" type="search" placeholder="Поиск товара">
                </form>
            </div>
        </div>
    </div>
    <hr class="hr_bg" />
    <div class="container">
        <div class="row mb-5" v-if="searchProductFilter.length === 0">
            <div class="alert alert-danger" role="alert">
                <h2>Поиск по товарам не найдено!</h2>
            </div>
        </div>
        <div class="row mb-5" v-else>
        <CartList
            v-for="list in searchProductFilter"
            :key="list.id"
            :list="list"
        />
        </div>
    </div>
  </template>

<script>
import productsService from "@/api/public/products.service";
import CartList from '@/components/Cart/CartList.vue';

  export default {
      name: 'Search',
      components: {
            CartList,
      },
      data() {
          return {
              products: [],
              search: ''
          }
      },
      computed: {
          searchProductFilter(){
              return this.products.filter(el => {
                  return el.name.includes(this.search);
              });
          }
      },
      async beforeMount(){
        const {status, data} = await productsService.getSearch();
        if (status === 200) {
            this.products = data;
        }
      },
  }
</script>
