<script>
import axios from 'axios';

export default {
    data() {
        return {
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
            this.endereco.pessoa_id = id;
        axios.post(`http://127.0.0.1:8000/api/endereco/getEnderecoAtual`, {'pessoa_id': id})
            .then(response => {
                this.endereco = response.data.data[0];
            })
            .catch(error => {
                console.error('Erro ao buscar dados da pessoa:', error);
            });
    },
    methods: {
        submitForm() {
            const id = this.$route.params.id;
            this.endereco.pessoa_id = id;
            axios.post(`http://127.0.0.1:8000/api/endereco/create`, this.endereco)
                .then(() => {
                    window.location = '/';
                })
                .catch(error => {
                    console.error('Erro ao atualizar endereço:', error);
                    alert('Erro ao atualizar endereço.');
                });
        },
        cep() {
        const cepfind = this.endereco.cepfind;
                axios.get('http://127.0.0.1:8000/api/cep/getOnly/' + cepfind)
                    .then(response => {
                    console.log(response);
                        this.endereco = response.data.data;
                        this.endereco.cidade = response.data.data.localidade;
                        this.endereco.estado = response.data.data.uf;
                    })
                    .catch(error => {
                        console.error('Erro ao pesquisar:', error);
                    });
        },
    }
};
</script>

<template>
  <div>
    <p v-if="loading">Loading post...</p>
    <p v-if="error">{{ error.message }}</p>
    <v-form @submit.prevent="submitForm">
        <v-card>
          <v-card-title>Editar endereço</v-card-title>
          <v-card-text>
                <v-text-field 
                label="cep"
                v-model="endereco.cepfind"
                @input="cep"
                ></v-text-field>
                <v-select 
                    v-model="endereco.tipo_endereco"  
                    :items="items"
                    item-title="text"
                    item-value="value"
                />
                <v-text-field label="logradouro" v-model="endereco.logradouro" readonly></v-text-field>
                <v-row>
                  <v-col>
                      <v-text-field
                        label="numero"
                        v-model="endereco.numero"
                      ></v-text-field>
                    </v-col>
                    <v-col>
                      <v-text-field
                        label="complemento"
                        v-model="endereco.complemento"
                      ></v-text-field>
                    </v-col>
                </v-row>
                <v-text-field label="bairro" v-model="endereco.bairro" readonly></v-text-field>
                <v-text-field label="cidade" v-model="endereco.cidade" readonly></v-text-field>
                <v-row>
                    <v-col>
                      <v-text-field
                        label="estado"
                        v-model="endereco.estado"
                        readonly
                      ></v-text-field>
                    </v-col>
                </v-row>
              </v-card-text>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn variant="text" @click="$router.go(-1)" >Cancelar</v-btn>
            <v-btn type="submit" variant="tonal" color="success">Salvar</v-btn>
        <v-btn variant="tonal" color="primary" size="small" :to="`/historico/${endereco.id_pessoa}`">Histórico</v-btn>
          </v-card-actions>
        </v-card>
    </v-form>
  </div> 
</template>