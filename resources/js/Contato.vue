<template>
    <div class="offset-col-2 col-lg-8">
        <form @submit.prevent="enviarContato" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="contatoNome">Nome</label>
                <input type="text" v-model="contato.nome"  class="form-control" id="contatoNome" placeholder="Informe seu nome">
                <small class="text-danger" v-for="(error, index) in errors.nome" :key="index">{{ error }}</small>
            </div>
            <div class="form-group">
                <label for="contatoEmail">E-mail</label>
                <input type="email" v-model="contato.email" class="form-control" id="contatoEmail" placeholder="Informe seu e-mail">
                <small class="text-danger" v-for="(error, index) in errors.email" :key="index">{{ error }}</small>
            </div>
            <div class="form-group">
                <label for="contatoTelefone">Telefone</label>
                <input type="text" v-model="contato.telefone" class="form-control" id="contatoTelefone" placeholder="(99) 99999-9999">
                <small class="text-danger" v-for="(error, index) in errors.telefone" :key="index">{{ error }}</small>
            </div>
            <div class="form-group">
                <label for="contatoMensagem">Mensagem</label>
                <textarea v-model="contato.mensagem" class="form-control" id="contatoMensagem" placeholder="Escreva sua mensagem"></textarea>
                <small class="text-danger" v-for="(error, index) in errors.mensagem" :key="index">{{ error }}</small>
            </div>
            <div class="form-group">
                <label for="contatoArquivo">Arquivo</label>
                <input type="file" class="form-control" id="file" aria-describedby="arquivoHelp" ref="file" v-on:change="handleFileUpload()">
                <small id="arquivoHelp" class="form-text text-muted">Arquivos até no máximo 500kb.</small>
                <small class="text-danger" v-for="(error, index) in errors.arquivo" :key="index">{{ error }}</small>

            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</template>

<script>
    import UploadService from "./services/UploadFilesService";

    export default {
        data() {
            return {
                contato: {
                    arquivo: null
                },
                errors: [],
            }
        },
        methods: {
            voltar(){
                this.$router.push({name: 'contato'})
            },
            handleFileUpload(){
                this.contato.arquivo = this.$refs.file.files[0];
            },
            enviarContato() {

                let formData = new FormData();
                formData.append('nome', this.contato.nome);
                formData.append('telefone', this.contato.telefone);
                formData.append('email', this.contato.email);
                formData.append('mensagem', this.contato.mensagem);
                formData.append('arquivo', this.contato.arquivo);

                console.log(formData);
                this.axios
                    .post('/api/contato/store', formData)
                    .then(function (response) {
                        Vue.swal('Sucesso!',response.data, 'success').then(function(){
                            location.href = '/'
                        })
                    })
                    .catch(error => {
                        if (error.response.data.errors){
                            this.errors = error.response.data.errors;
                        }else{
                            Vue.swal('Ooops!', 'Não foi possível finalizar a operação, tente novamente.', 'error');
                        }
                    })
            }
        }
    }
</script>