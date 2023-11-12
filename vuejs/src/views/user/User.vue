<template>
  <div class="container">
    <div class="row" style="margin-top: 6%;">
      <div class="col-12">
        <div class="card">
            <h5 class="card-header text-center text-bg-primary">Ваш заказ
              <span class="float-end">
                Имя: {{dataList.username}}&nbsp;&nbsp;
                <a href="#" @click="logout" class="text-danger">Выход</a>
              </span>
            </h5>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">№</th>
                    <th scope="col">Название</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Кол-во</th>
                    <th scope="col">Сумма</th>
                  </tr>
                </thead>
                <tbody v-if="dataList.cart.length > 0">
                  <UserList
                    v-for="item in dataList.cart"
                    :key="item.id"
                    :item="item"
                  />
                </tbody>
                <tbody v-else>
                  <tr>
                    <td colspan="6" class="text-center text-danger">Корзина пусто!!!</td>
                  </tr>
                </tbody>
              </table>
              <div class="row" v-if="dataList.cart.length > 0">
                <div class="col clearfix inline_text">
                  <div class="float-start">
                     <p>
                      <strong>
                        Общая сумма: {{total}} тенге
                      </strong>
                     </p>
                     <p>
                      <strong>
                        Кол-во товара: {{ dataList.cart.length}} шт
                      </strong>
                     </p>
                  </div>
                  <div class="float-end">
                    <a href="#" class="btn btn-success margin_right" @click="addAlert">Купить</a>
                  </div>
                </div>
              </div>
           </div>
          </div>
          <div class="card mb-5 mt-5" v-if="cartAll.length > 0">
            <h5 class="card-header text-center text-bg-danger">Корзина в Архиве</h5>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">№</th>
                    <th scope="col">Название</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Кол-во</th>
                    <th scope="col">Сумма</th>
                  </tr>
                </thead>
                <tbody>
                  <Arhive
                    v-for="item in cartAll"
                    :key="item.id"
                    :item="item"
                  />
                </tbody>
              </table>
              <div class="row" v-if="cartAll.length > 0">
                <div class="col clearfix inline_text">
                  <div class="float-start">
                     <p>
                      <strong>
                        Общая сумма: {{counts}} тенге
                      </strong>
                     </p>
                     <p>
                      <strong>
                        Кол-во товара: {{ cartAll.length}} шт
                      </strong>
                     </p>
                  </div>
                  <div class="float-end">
                    <a href="#" class="btn btn-danger margin_right" @click="deleteCart">Удалить</a>
                  </div>
                </div>
              </div>
           </div>
          </div>
        </div>
    </div>
  </div>
</template>

<script>
import orderService from "@/api/private/order.service";
import UserList from "@/components/User/UserList.vue";
import Arhive from "@/components/User/Arhive.vue";
import authUser from "@/api/auth.user";

export default {
   name: 'User',
   components: { UserList, Arhive },
   data() {
    return {
        dataList: {
          cart: [],
          email: localStorage.getItem("email"),
          username: localStorage.getItem("username"),
          user_id: localStorage.getItem("user_id")
        },
        cartAll: [],
    }
  },
  methods: {
    addAlert(){
        alert('Это функция еще не работають!')
    },
    async cartAllItem(){
        let userId = JSON.parse(localStorage.getItem("user_id"));
        const {status, data} = await orderService.get(userId);
        this.cartAll = data;
    },
    clearCart(){
      this.dataList.cart = [];
      localStorage.removeItem("cart");
      console.clear();
      for(let i = 0; i < this.dataList.cart.length; i++){
          this.dataList.cart[i].inCart = false;
      }
    },
    cartLocalStorage(){
      if(localStorage.getItem("cart")){
        let cartLocalStorage = JSON.parse(localStorage.getItem("cart"));
        return cartLocalStorage;
      }else{
        return [];
      }
    },
    async deleteCart(){
        let userId = JSON.parse(localStorage.getItem("user_id"));
        const {status, data} = await orderService.delete(userId);
        if (status === 200) {
           document.location.reload();
        }
    },
    async logout() {
        const {status, data} = await orderService.create(this.dataList);
        if (status === 201) {
            await authUser.logout();
            this.clearCart();
        }
    },
  },
  computed: {
      total(){
        let i = 0;
        for(let index = 0; index < this.dataList.cart.length; index++){
            i += this.dataList.cart[index].price * this.dataList.cart[index].qty;
        }
        return i;
      },
      counts(){
        let i = 0;
        for(let index = 0; index < this.cartAll.length; index++){
            i += this.cartAll[index].price * this.cartAll[index].qty;
        }
        return i;
      },
   },
   mounted() {
      this.dataList.cart = this.cartLocalStorage();
      this.cartAllItem();
   },
}
</script>

<style scoped>
.margin_right{
   margin-right: 1rem;
}
.inline_text{
  display: inline;
}
</style>
