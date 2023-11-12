<template>
    <li class="list-group">
      <div
        @click="toggle"
        @dblclick="changeType"
        class="list-group-item list-group-item-action fw-bold text-primary"
      >
        <a href="#" @click="this.$emit('categoryId', item.id)" v-if="!isFolder">
           {{ item.title }}
        </a>
        <span v-else>{{ item.title }}</span>
        <span v-if="isFolder">{{ isOpen ? ' -' : ' +' }}</span>
      </div>
      <ul v-show="isOpen" v-if="isFolder">
        <Categoriies
          v-for="item in item.children"
          :key="item.id"
          :item="item"
          @categoryId="categoryId"
        />
      </ul>
    </li>
  </template>

  <script>
  import Categoriies from '@/components/Categories/Categoriies.vue';

  export default {
     name: 'Categories',
     props: ["item"],
     components: {
        Categoriies
     },
     data() {
        return {
           isOpen: false
        }
     },
     computed: {
        isFolder() {
           return this.item.children && this.item.children.length
        }
     },
     methods: {
        toggle() {
           if (this.isFolder) {
              this.isOpen = !this.isOpen
           }
        },
        changeType() {
           if (!this.isFolder) {
              this.item.children = []
              this.isOpen = true
           }
        },
        categoryId(id){
           this.$emit('categoryId', id);
        },
     }
  }
  </script>
