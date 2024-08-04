<script>
import axios from 'axios';

export default {
  data() {
    return {
      dialog: false,
      searchTerm: '',
      pessoas: {
                id: '',
                nome: '',
                nome_social: '',
                cpf: '',
                nome_pai: '',
                nome_mae: '',
                telefone: '',
                email: ''
            }
    };
  },
  mounted() {
        axios.get(`http://127.0.0.1:8000/api/pessoa/list`)
            .then(response => {
              this.pessoas = response.data.data;
              console.log(pessoas);
            })
            .catch(error => {
                console.error('Erro ao buscar dados da pessoa:', error);
            });
    },
  methods: {
    find() {
      const searchTerm = this.searchTerm;
            axios.post(`http://127.0.0.1:8000/api/pessoa/find`, {'pesquisa': searchTerm})
                .then(response => {
                  console.log(response);
                    this.pessoas = response.data.data;
                })
                .catch(error => {
                    console.error('Erro ao pesquisar:', error);
                    alert('Erro ao pesquisar.');
                });
    },
    store() {
            axios.post(`http://127.0.0.1:8000/api/pessoa/create`, pessoa)
                .then(response => {
                  console.log(response);
                  window.location = '/';
                })
                .catch(error => {
                    console.error('Erro ao pesquisar:', error);
                    alert('Erro ao pesquisar.');
                });
    }
  }
};
</script>

<template>
  <h1 class="mb-12 text-brand">Pessoas</h1>
      <v-text-field
        :loading="loading"
        v-model="searchTerm"
        append-inner-icon="mdi-magnify"
        density="compact"
        label="Pesquisa..."
        variant="solo"
        hide-details
        single-line
        @input="find"
      ></v-text-field>
    <v-card flat class="border mb-4">
      <div class="d-flex justify-space-between">
        <v-card-title>Últimos usuários</v-card-title>
        <v-card-title>
          
          <v-btn variant="tonal" size="small" color="primary" to="/addpessoa">Adicionar usuário</v-btn>
        </v-card-title>
      </div>
          <v-table>
            <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>CPF</th>
              <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="pessoa in pessoas" :key="pessoa.id">

              <td>{{ pessoa.id }}</td>
              <td>{{ pessoa.nome }}</td>
              <td>{{ pessoa.cpf }}</td>
              <td>
        <v-btn variant="tonal" color="secondary" size="small" :to="`/pessoa/${pessoa.id}`">Editar</v-btn>
        <v-btn variant="tonal" color="primary" size="small" :to="`/endereco/${pessoa.id}`">Endereço</v-btn>
        <!--<RouterLink :to="`/pessoa/${post.id}`">Editar</RouterLink>-->
              </td>
            </tr>
          </tbody>
        </v-table>
    </v-card>
</template>

<style>
    .v-container {
      min-width: 100vh;
      }
</style>