<script>
import InputComponent from '../../InputComponent.vue';
import ModalComponent from '../../ModalComponent.vue';
import TabelaComponent from "../../TabelaComponent.vue";

export default {
    name: "SextoComponent",
    components: { TabelaComponent, ModalComponent, InputComponent },
}

</script>

<template>
    <div class="container">
        <header class="titulo-pagina">
            <h1>Sexto Ano</h1>
        </header>

        <div class="mt-5 tabela">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#modalSexto"
                    @click.prevent="limparCampos">
                    Adicionar
                </button>
            </div>
            <div class="row">
                <div class="col-12">
                    <tabela-component></tabela-component>
                </div>
            </div>
        </div>

        <!-- Modal Adicionar conteudo -->
        <modal-component id="modalSexto" titulo="Cadastrar novo conteúdo" class="modal-xl">
            <template>

            </template>

            <template v-slot:conteudo>
                <div class="row">
                    <!-- Primeira coluna -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <input-component titulo="Título" id="novoTitulo1" id-help="novoTituloHelp1"
                                texto-ajuda="Informe o título!">
                                <input type="text" class="form-control" id="novoTitulo1"
                                    aria-describedby="novoTituloHelp1" placeholder="Título" />
                            </input-component>
                        </div>
                    </div>
                    <!-- Segunda coluna -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <input-component titulo="Título" id="novoTitulo2" id-help="novoTituloHelp2"
                                texto-ajuda="Informe o título!">
                                <textarea class="form-control" id="novoTitulo2" aria-describedby="novoTituloHelp2"
                                    placeholder="Título"></textarea>
                            </input-component>
                        </div>
                    </div>
                </div>
            </template>


            <template v-slot:rodape>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Fechar
                </button>
                <button type="button" class="btn btn-primary" @click="salvar">
                    Salvar
                </button>
            </template>
        </modal-component>
    </div>
</template>

<style src="./style.css" scoped></style>