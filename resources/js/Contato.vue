<template>
<div class="row justify-content-md-center">
    <div class="shadow-sm p-3 mb-5 bg-white rounded col-lg-8">
        <form @submit.prevent="enviarContato" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="contatoNome">Nome</label>
                <input type="text" v-model="contato.nome"  class="form-control" id="contatoNome" placeholder="Informe seu nome" required>
                <small class="text-danger" v-for="(error, index) in errors.nome" :key="index">{{ error }}</small>
            </div>
            <div class="form-group">
                <label for="contatoEmail">E-mail</label>
                <input type="email" v-model="contato.email" class="form-control" id="contatoEmail" placeholder="Informe seu e-mail" required>
                <small class="text-danger" v-for="(error, index) in errors.email" :key="index">{{ error }}</small>
            </div>
            <div class="form-group">
                <label for="contatoTelefone">Celular</label>
                <input type="text" v-model="contato.telefone" class="form-control" id="contatoTelefone" maxlength="15" placeholder="(99) 99999-9999" v-mask="mask" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" required>
                <small class="text-danger" v-for="(error, index) in errors.telefone" :key="index">{{ error }}</small>
            </div>
            <div class="form-group">
                <label for="contatoMensagem">Mensagem</label>
                <textarea v-model="contato.mensagem" class="form-control" id="contatoMensagem" placeholder="Escreva sua mensagem" required></textarea>
                <small class="text-danger" v-for="(error, index) in errors.mensagem" :key="index">{{ error }}</small>
            </div>
            <div class="form-group">
                <label for="contatoArquivo">Arquivo</label>
                <input type="file" class="form-control" id="file" aria-describedby="arquivoHelp" ref="file" v-on:change="handleFileUpload()" required>
                <small id="arquivoHelp" class="form-text text-muted">Arquivos até no máximo 500kb.</small>
                <small class="text-danger" v-for="(error, index) in errors.arquivo" :key="index">{{ error }}</small>

            </div>
            <button type="submit" class="btn btn-outline-success btn-lg btn-block">Enviar</button>
        </form>
    </div>
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
                mask: "(##) #####-####",
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