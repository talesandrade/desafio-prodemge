
<template>

  <v-app>
  <h1 class="mb-6 text-brand">Dashboard</h1>
  <p v-if="posts" v-for="post in posts" :key="post.id">
      <RouterLink :to="`/post/${post.id}`">{{ post.title }}</RouterLink>
      <p>{{ post.body }}</p>
    </p>

<v-card flat class="border mb-4">
  <div class="d-flex justify-space-between">
    <v-card-title>Últimos usuários</v-card-title>

    <v-card-title>
      <v-btn @click="isDialogOpen = true" variant="tonal" size="small" :ripple="false">Adicionar usuário</v-btn>
      <v-dialog
      width="600px"
      >
      <template #activator="{ props }">
            <v-btn v-bind="props" variant="tonal" color="primary">add</v-btn>
          </template>
        <v-card>
          <v-card-title>Adicionar usuário</v-card-title>

          <v-card-text>
            <v-row>
              <v-col>
                <v-text-field label="Nome"></v-text-field>
              </v-col>

              <v-col>
                <v-text-field
                  label="Email"
                  :rules="emailRules"
                ></v-text-field>
              </v-col>
            </v-row>

            <v-select
              label="Cargo"
              :items="['Admin', 'Gerente', 'Convidado']"
            >
            </v-select>
          </v-card-text>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn variant="text" @click="isDialogOpen = false">Cancelar</v-btn>
            <v-btn variant="tonal" color="success">Salvar</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-card-title>
  </div>

  <v-table>
    <thead>
    <tr>
      <th>Nome</th>
      <th>Email</th>
      <th>Cargo</th>
      <th>Ações</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>Fulano</td>
      <td>fulano@gmail.com</td>
      <td>
        <v-chip color="primary" variant="outlined" size="small">Admin</v-chip>
      </td>
      <td>
        <v-dialog width="600px">
          <template #activator="{ props }">
            <v-btn v-bind="props" variant="tonal" color="primary">Editar</v-btn>
          </template>

          <v-card>
            <v-card-text>
              Editar
            </v-card-text>
          </v-card>
        </v-dialog>
      </td>
    </tr>
    <tr>
      <td>Cicrano</td>
      <td>cicrano@gmail.com</td>
      <td>
        <v-chip color="success" variant="outlined" size="small">Gerente</v-chip>
      </td>
      <td>
        <v-btn variant="tonal" color="primary">Editar</v-btn>
      </td>
    </tr>
    <tr>
      <td>Beltrano</td>
      <td>beltrano@gmail.com</td>
      <td>
        <v-chip variant="outlined" size="small">Convidado</v-chip>
      </td>
      <td>
        <v-btn variant="tonal" color="primary">Editar</v-btn>
      </td>
    </tr>
    </tbody>
  </v-table>
</v-card>
</v-app>

</template>

<style>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>

<script>

import { ref, onMounted } from 'vue';
import { storeToRefs } from 'pinia'
import { usePessoasStore } from '../stores/pessoas'

const { posts, loading, error } = storeToRefs(usePessoasStore())
  const { fetchPessoas } = usePessoasStore()

  fetchPessoas()

const isDrawerOpen = ref(false);
const isDialogOpen = ref(false);
const emailRules = [
  value => {
    if (value) {
      return true
    }

    return 'O email é obrigatório';
  },
  value => {
    if (value.includes('@')) {
      return true;
    }

    return 'Email inválido'
  }
  
];
</script>