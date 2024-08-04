<script>
import axios from 'axios';

export default {
    data() {
        return {
            enderecos: [],
            endereco: {
                cepfind: '',
                pessoa_id: '',
                id: '',
                tipo_endereco: '',
                logradouro: '',
                numero: '',
                complemento: '',
                bairro: '',
                cidade: '',
                estado: ''
            },
            items: [
                { text: 'Casa', value: '1' },
                { text: 'Comercial', value: '2' },
            ],
        };
    },
    mounted() {
        const id = this.$route.params.id;
        axios.post(`http://127.0.0.1:8000/api/endereco/list`, {'pessoa_id': id})
            .then(response => {
                this.enderecos = response.data.data;
            })
            .catch(error => {
                console.error('Erro ao buscar dados da pessoa:', error);
            });
    },
    methods: {
    }
};
</script>

<template>
  <div>
    <v-form @submit.prevent="submitForm">
        <v-card>
          <v-card-title>Histórico de endereços</v-card-title>
          <v-card-text>
            <v-table>
            <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>CPF</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="endereco in enderecos">

              <td>{{ endereco.id }}</td>
              <td>{{ endereco.cidade }}</td>
              <td>{{ endereco.bairro }}</td>
            </tr>
          </tbody>
        </v-table>
              </v-card-text>

        </v-card>
    </v-form>
  </div> 
</template>