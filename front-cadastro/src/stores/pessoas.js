import { defineStore } from 'pinia'
import axios from 'axios'

export const usePessoasStore = defineStore({
  id: 'post',
  state: () => ({
    pessoas: [],
    pessoa: null,
    loading: false,
    error: null
  }),
  getters: {
    getPostsPerAuthor: (state) => {
      return (authorId) => state.posts.filter((post) => post.userId === authorId)
    }
  }, 
  actions: {
    async fetchPessoas() {
      this.pessoas = []
      this.loading = true
      try {
        this.pessoas = await fetch('http://127.0.0.1:8000/api/pessoa/list')
        .then((response) => response.json()) 
      } catch (error) {
        this.error = error
      } finally {
        this.loading = false
      }
    },
    async fetchPessoa(id) {
      this.post = null
      this.loading = true
      try {
        this.post = await fetch(`http://127.0.0.1:8000/api/pessoa/getOnly`, {
          method: "POST",
          body: JSON.stringify({ id: id }),
          headers: {
            "Content-Type": "application/json",
          },
        })
        .then((response) => response.json())
      } catch (error) {
        this.error = error
      } finally {
        this.loading = false
      }
    },
    async storeUser(data){
      this.isLoading = true
      return new Promise((resolve, reject) => {
        axios.post('http://127.0.0.1:8000/api/pessoa/create', data)
          .then(response => {
            this.details = response.data
            resolve(response)
            useToast().success("Usuario criado com sucesso!");


          })
          .catch(error => {
            reject(error)
            useToast().error("Erro ao criar o usuario!");
          }).finally(() => {
            this.isLoading = false
          })
      })
    },
    async updateUser(data){
      this.isLoading = true
      return new Promise((resolve, reject) => {
        axios.post('http://127.0.0.1:8000/api/pessoa/update', data)
          .then(response => {
            this.details = response.data
            resolve(response)
            useToast().success("Usuario editado com sucesso!");


          })
          .catch(error => {
            reject(error)
            useToast().error("Erro ao editar o usuario!");
          }).finally(() => {
            this.isLoading = false
          })
      })
    },
  }
})
