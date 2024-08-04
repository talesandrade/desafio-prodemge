<script setup>
import { ref } from 'vue';
import { RouterLink, RouterView } from 'vue-router'

const isDrawerOpen = ref(false);

const isDialogOpen = ref(false);
</script>

<template>
  <v-app>
    <v-navigation-drawer v-model="isDrawerOpen" >
        <v-list>
            <v-list-subheader>Menu</v-list-subheader>
            <v-list-item to="/" prepend-icon="mdi-home">Pessoas</v-list-item>
            <v-list-item to="/dashboard" prepend-icon="mdi-account">Dashboard</v-list-item>
        </v-list>
    </v-navigation-drawer>

    <v-app-bar>
        <v-app-bar-nav-icon @click="isDrawerOpen = !isDrawerOpen" ></v-app-bar-nav-icon>
        <v-app-bar-title>
            <v-img width="200px" src="https://www.prodemge.gov.br/images/logo_prodemge/logo_prodemge.png"></v-img>
        </v-app-bar-title>
    </v-app-bar>
      <v-container class="w-auto">
        <RouterView />
      </v-container>
  </v-app>
</template>