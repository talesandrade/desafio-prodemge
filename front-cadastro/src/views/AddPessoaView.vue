<script>
import axios from 'axios';

export default {
    data() {
        return {
            pessoa: {
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
    methods: {
        submitForm() {
            axios.post(`http://127.0.0.1:8000/api/pessoa/create`, this.pessoa)
                .then(() => {
                    window.location = '/';
                })
                .catch(error => {
                    console.error('Erro ao criar pessoa:', error);
                    alert('Erro ao criar pessoa.');
                });
        }
    }
};
</script>

<template>
  <div>
    <p v-if="loading">Loading post...</p>
    <p v-if="error">{{ error.message }}</p>
    <v-form @submit.prevent="submitForm">
        <v-card>
          <v-card-title>Adicionar usuário</v-card-title>
          <v-card-text>
                
                <v-text-field label="Nome" v-model="pessoa.nome"></v-text-field>
                <v-text-field label="Nome Social" v-model="pessoa.nome_social"></v-text-field>
                <v-row>
                  <v-col>
                      <v-text-field
                        label="CPF"
                        v-model="pessoa.cpf"
                      ></v-text-field>
                    </v-col>
                    <v-col>
                      <v-text-field
                        label="Telefone"
                        v-model="pessoa.telefone"
                      ></v-text-field>
                    </v-col>
                </v-row>
                <v-text-field label="Nome do Pai" v-model="pessoa.nome_pai"></v-text-field>
                <v-text-field label="Nome da Mãe" v-model="pessoa.nome_mae"></v-text-field>
                <v-row>
                    <v-col>
                      <v-text-field
                        label="E-mail"
                        :rules="emailRules"
                        v-model="pessoa.email"
                      ></v-text-field>
                    </v-col>
                </v-row>
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn variant="text" @click="$router.go(-1)" >Cancelar</v-btn>
                <v-btn type="submit"  variant="tonal" color="success">Salvar</v-btn>
              </v-card-actions>
        </v-card>
    </v-form>
  </div> 
</template>