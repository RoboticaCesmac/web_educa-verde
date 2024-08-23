<script>
import { FormWizard, TabContent } from 'vue3-form-wizard';
import 'vue3-form-wizard/dist/style.css';
import AlertComponent from '../../AlertComponent.vue';
import InputComponent from '../../InputComponent.vue';
import ModalComponent from '../../ModalComponent.vue';
import TabelaComponent from "../../TabelaComponent.vue";

export default {
    name: "SetimoComponent",
    components: { TabelaComponent, ModalComponent, InputComponent, AlertComponent, FormWizard, TabContent },

    data() {
        return {
            setimo: [],
            colunas: ['titulo'],
            urlBase: "http://localhost:8000/api/setimo",

            tituloConteudo: "",
            objetivoConteudo: "",
            habilidadeConteudo: "",
            leituraDiscussaoConteudo: "",
            videoConteudo: "",
            videoTeoricoConteudo: "",
            videoTeoricoConteudoLink: "",
            videoPraticoConteudo: "",
            videoPraticoConteudoLink: "",
            atividadeConteudo: "",

            cadastroStatus: "",
            cadastroDetalhes: {},

            form: {
                titulo: null,
                objetivo: null,
                habilidades: null,
                leitura_discussao: null,
                video_conteudo: null,
                video_exposicaop_conteudo: null,
                video_exposicaop_link: null,
                video_exposicaot_conteudo: null,
                video_exposicaot_link: null,
                atividade: null
            }
        }
    },

    mounted() {
        this.getSetimo();

        const modalSetimo = document.getElementById('modalSetimo');
        const modalVisualizar = document.getElementById('modalVisualizar');
        const modalAtualizar = document.getElementById('modalAtualizar');

        if (modalSetimo) {
            modalSetimo.addEventListener('hidden.bs.modal', this.resetWizard);
        }
        if (modalVisualizar) {
            modalVisualizar.addEventListener('hidden.bs.modal', this.resetWizard);
        }
        if (modalAtualizar) {
            modalAtualizar.addEventListener('hidden.bs.modal', this.resetWizard);
        }

    },

    methods: {
        onCompleteVisualizar() {
            alert("Você chegou no final, pressione o botão inferior para fechar!");
        },

        onCompleteCadastrar() {
            alert('Você chegou no final, pressione o botão "Salvar" para cadastrar!');
        },

        onCompleteAtualizar() {
            alert('Você chegou no final, pressione o botão "Salvar" para atualizar!');
        },

        async getSetimo() {
            let config = {
                headers: {
                    'Accept': 'application/json',
                    'Authorization': this.token
                }
            }

            try {
                let response = await axios.get(this.urlBase, config);
                this.setimo = response.data;
            } catch (error) {
                return alert(
                    "Você não está autenticado. Faça o login novamente!",
                );
            }
        },

        async salvar() {
            let params = new URLSearchParams();
            params.append("titulo", this.tituloConteudo);
            params.append("objetivo", this.objetivoConteudo);
            params.append("habilidades", this.habilidadeConteudo);
            params.append("leitura_discussao", this.leituraDiscussaoConteudo);
            params.append("video_conteudo", this.videoConteudo);
            params.append("video_exposicaop_conteudo", this.videoPraticoConteudo);
            params.append("video_exposicaop_link", this.videoPraticoConteudoLink);
            params.append("video_exposicaot_conteudo", this.videoTeoricoConteudo);
            params.append("video_exposicaot_link", this.videoTeoricoConteudoLink);
            params.append("atividade", this.atividadeConteudo);

            let config = {
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    "Accept": "application/json",
                    'Authorization': this.token
                }
            };

            try {
                let response = await axios.post(this.urlBase, params, config);

                this.cadastroStatus = "sucesso";
                this.cadastroDetalhes = {
                    mensagem: "ID do registro: " + response.data.id
                }

                this.getSetimo();
                this.limparCamposAdd();
            } catch (errors) {
                this.cadastroStatus = "erro";
                this.cadastroDetalhes = {
                    mensagem: errors.response.data.message || "Erro desconhecido",
                    listarErros: errors.response.data.errors || [],
                }
            };
        },

        async atualizar() {
            let data = {
                _method: "patch",
                titulo: this.form.titulo,
                objetivo: this.form.objetivo,
                habilidades: this.form.habilidades,
                leitura_discussao: this.form.leitura_discussao,
                video_conteudo: this.form.video_conteudo,
                video_exposicaop_conteudo: this.form.video_exposicaop_conteudo,
                video_exposicaop_link: this.form.video_exposicaop_link || null,
                video_exposicaot_conteudo: this.form.video_exposicaot_conteudo,
                video_exposicaot_link: this.form.video_exposicaot_link || null,
                atividade: this.form.atividade
            };

            let config = {
                headers: {
                    "Content-Type": "application/json",
                    'Accept': "application/json",
                    'Authorization': this.token
                },
            };

            let url = this.urlBase + '/' + this.form.id;

            try {
                await axios.post(url, data, config);

                this.cadastroStatus = "sucesso";
                this.getSetimo();
            } catch (errors) {
                this.cadastroStatus = "erro";
                this.cadastroDetalhes = {
                    mensagem: errors.response.data.message || "Erro desconhecido",
                    listarErros: errors.response.data.errors || [],
                };
            }
        },

        async remover() {
            let confirmacao = confirm(
                "Tem certeza que deseja remover esse conteúdo?"
            );

            if (!confirmacao) {
                return false;
            }

            let params = new URLSearchParams();
            params.append("_method", "delete");

            let config = {
                headers: {
                    Accept: "application/json",
                    'Authorization': this.token
                },
            };

            let url = this.urlBase + "/" + this.form.id;

            try {
                await axios.post(url, params, config);

                this.cadastroStatus = "sucesso";

                this.getSetimo();
            } catch (errors) {
                return alert("Erro ao remover conteúdo!");
            }
        },

        limparCampos() {
            this.tituloConteudo = "";
            this.objetivoConteudo = "";
            this.habilidadeConteudo = "";
            this.leituraDiscussaoConteudo = "";
            this.videoConteudo = "";
            this.videoTeoricoConteudo = "";
            this.videoTeoricoConteudoLink = "";
            this.videoPraticoConteudo = "";
            this.videoPraticoConteudoLink = "";
            this.atividadeConteudo = "";
            this.cadastroStatus = "";
            this.cadastroDetalhes = {};
        },

        limparCamposAdd() {
            this.tituloConteudo = "";
            this.objetivoConteudo = "";
            this.habilidadeConteudo = "";
            this.leituraDiscussaoConteudo = "";
            this.videoConteudo = "";
            this.videoTeoricoConteudo = "";
            this.videoTeoricoConteudoLink = "";
            this.videoPraticoConteudo = "";
            this.videoPraticoConteudoLink = "";
            this.atividadeConteudo = "";
        },

        resetWizard() {
            if (this.$refs.formWizard) {
                this.$refs.formWizard.reset();
            }
            if (this.$refs.formWizardVisualizar) {
                this.$refs.formWizardVisualizar.reset();
            }
            if (this.$refs.formWizardAtualizar) {
                this.$refs.formWizardAtualizar.reset();
            }
        },

        handleSelectItem(item) {
            this.form = { ...item };

            this.cadastroStatus = null;
            this.cadastroDetalhes = {};
        },
    },

    computed: {
        token() {
            let token = document.cookie.split(';').find(indice => {
                return indice.includes('token=')
            })

            token = token.split('=')[1]
            token = 'Bearer' + token

            return token
        },
    }
}
</script>

<template>
    <div class="container">
        <header class="titulo-pagina">
            <h1>Sétimo Ano</h1>
        </header>

        <div class="mt-5 tabela">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary mb-3" data-bs-toggle="modal"
                    data-bs-target="#modalSetimo" @click.prevent="limparCampos">
                    Adicionar
                </button>
            </div>
            <div class="row">
                <div class="col-12">
                    <tabela-component :descricao="'Sétimo Ano'" :dados="setimo" :colunas="colunas">
                        <template v-slot:default="{ item }">
                            <button class="btn btn-outline-secondary edit" style="margin-right: 6px;"
                                data-bs-toggle="modal" data-bs-target="#modalVisualizar"
                                @click="handleSelectItem(item)">
                                Visualizar
                            </button>

                            <button class="btn btn-outline-primary edit" style="margin-right: 6px;"
                                data-bs-toggle="modal" data-bs-target="#modalAtualizar" @click="handleSelectItem(item)">
                                Editar
                            </button>

                            <button data-bs-toggle="modal" data-bs-target="#modalRemover"
                                class="btn btn-outline-danger edit" @click="handleSelectItem(item)">
                                Excluir
                            </button>
                        </template>
                    </tabela-component>
                </div>
            </div>
        </div>

        <!-- Modal Adicionar -->
        <modal-component id="modalSetimo" titulo="Cadastrar novo conteúdo" class="modal-xl"
            hidden.bs.modal="resetWizard">
            <template v-slot:alertas>
                <alert-component tipo="success" titulo="Cadastro realizado com sucesso!"
                    v-if="cadastroStatus == 'sucesso'" :detalhes="cadastroDetalhes"></alert-component>
                <alert-component tipo="danger" titulo="Erro no cadastro!" :detalhes="cadastroDetalhes"
                    v-if="cadastroStatus == 'erro'"></alert-component>
            </template>

            <template v-slot:conteudo>
                <form-wizard ref="formWizard" @on-complete="onCompleteCadastrar" color="#6C757D"
                    next-button-text="Avançar" back-button-text="Voltar" finish-button-text="Final">
                    <tab-content title="Conteúdos">
                        <div class="form-group mb-3">
                            <input-component titulo="Título do conteúdo" id="novoTitulo" id-help="novoTituloHelp"
                                texto-ajuda="Informe o titulo do conteúdo!">
                                <input type="text" class="form-control" id="novoTitulo"
                                    aria-describedby="novoTituloHelp" placeholder="Título" v-model="tituloConteudo" />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Objetivo do conteúdo" id="novoObjetivo" id-help="novoObjetivoHelp"
                                texto-ajuda="Informe o objetivo do conteúdo!">
                                <textarea type="text" class="form-control" id="novoObjetivo"
                                    aria-describedby="novoObjetivoHelp" placeholder="Objetivo"
                                    v-model="objetivoConteudo" />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Habilidades do conteúdo" id="novoHabilidades"
                                id-help="novoHabilidadesHelp" texto-ajuda="Informe as habilidades do conteúdo!">
                                <textarea type="text" class="form-control" id="novoHabilidades"
                                    aria-describedby="novoHabilidadesHelp" placeholder="Habilidades"
                                    v-model="habilidadeConteudo" />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Leitura e discussão do conteúdo" id="novoLeitura"
                                id-help="novoLeituraHelp" texto-ajuda="Informe a Leitura e discussão do conteúdo!">
                                <textarea type="text" class="form-control" id="novoLeitura"
                                    aria-describedby="novoLeituraHelp" placeholder="Leitura e discussão"
                                    v-model="leituraDiscussaoConteudo" />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Atividade prática conteúdo" id="novoAtividadeConteudo"
                                id-help="novoAtividadeConteudo" texto-ajuda="Informe a Atividade prática do conteúdo!">
                                <textarea type="text" class="form-control" id="novoAtividadeConteudo"
                                    aria-describedby="novoVideoConteudoTeoricoHelp" placeholder="Atividade prática"
                                    v-model="atividadeConteudo" />
                            </input-component>
                        </div>
                    </tab-content>

                    <tab-content title="Conteúdos das telas de vídeo">
                        <div class="form-group mb-3">
                            <input-component titulo="Vídeo conteúdo" id="novoVideoConteudo"
                                id-help="novoVideoConteudoHelp"
                                texto-ajuda="Informe o conteúdo da página principal de vídeos!">
                                <textarea type="text" class="form-control" id="novoVideoConteudo"
                                    aria-describedby="novoVideoConteudoHelp" placeholder="Vídeo conteúdo"
                                    v-model="videoConteudo" />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Vídeo exposição teórica conteúdo" id="novoVideoTeoricoConteudo"
                                id-help="novoVideoTeoricoConteudo"
                                texto-ajuda="Informe o conteúdo do vídeo de exposição teórica!">
                                <textarea type="text" class="form-control" id="novoVideoTeoricoConteudo"
                                    aria-describedby="novoVideoConteudoTeoricoHelp"
                                    placeholder="Vídeo exposição teórica conteúdo" v-model="videoTeoricoConteudo" />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Vídeo exposição prática conteúdo" id="novoVideoPraticoConteudo"
                                id-help="novoVideoPraticoConteudo"
                                texto-ajuda="Informe o conteúdo do vídeo de exposição prática!">
                                <textarea type="text" class="form-control" id="novoVideoPraticoConteudo"
                                    aria-describedby="novoVideoConteudoTeoricoHelp"
                                    placeholder="Vídeo exposição prática conteúdo" v-model="videoPraticoConteudo" />
                            </input-component>
                        </div>
                    </tab-content>

                    <tab-content title="Link dos vídeos">
                        <div class="form-group mb-3">
                            <input-component titulo="Vídeo exposição prática link" id="novoVideoPraticoLink"
                                id-help="novoVideoPraticoLink" texto-ajuda="Link do vídeo de exposição prática!">
                                <input type="text" class="form-control" id="novoVideoPraticoLink"
                                    aria-describedby="novoVideoConteudoTeoricoHelp"
                                    placeholder="Link do vídeo de exposição prática"
                                    v-model="videoPraticoConteudoLink" />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Vídeo exposição teórica link" id="novoVideoTeoricoConteudoLink"
                                id-help="novoVideoTeoricoConteudoLink"
                                texto-ajuda="Link do vídeo de exposição teórica!">
                                <input type="text" class="form-control" id="novoVideoTeoricoConteudoLink"
                                    aria-describedby="novoVideoConteudoTeoricoHelp"
                                    placeholder="Link do vídeo de exposição teórica"
                                    v-model="videoTeoricoConteudoLink" />
                            </input-component>
                        </div>
                    </tab-content>
                </form-wizard>
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

        <!-- Modal Visualizar -->
        <modal-component id="modalVisualizar" titulo="Visualizar conteúdo" class="modal-xl"
            hidden.bs.modal="resetWizard">
            <template v-slot:conteudo>
                <form-wizard ref="formWizardVisualizar" @on-complete="onCompleteVisualizar" color="#6C757D"
                    next-button-text="Avançar" back-button-text="Voltar" finish-button-text="Final">
                    <tab-content title="Conteúdos">
                        <div class="form-group mb-3">
                            <input-component titulo="Título do conteúdo">
                                <input type="text" class="form-control" :value="this.form.titulo" disabled />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Objetivo do conteúdo">
                                <textarea type="text" class="form-control" :value="this.form.objetivo" disabled />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Habilidades do conteúdo">
                                <textarea type="text" class="form-control" :value="this.form.habilidades" disabled />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Leitura e discussão do conteúdo">
                                <textarea type="text" class="form-control" :value="this.form.leitura_discussao"
                                    disabled />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Atividade prática do conteúdo">
                                <textarea type="text" class="form-control" :value="this.form.atividade" disabled />
                            </input-component>
                        </div>
                    </tab-content>
                    <tab-content title="Conteúdos das telas de vídeo">
                        <div class="form-group mb-3">
                            <input-component titulo="Vídeo conteúdo">
                                <textarea type="text" class="form-control" :value="this.form.video_conteudo" disabled />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Vídeo exposição teórica conteúdo">
                                <textarea type="text" class="form-control" :value="this.form.video_exposicaot_conteudo"
                                    disabled />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Vídeo exposição prática conteúdo">
                                <textarea type="text" class="form-control" :value="this.form.video_exposicaop_conteudo"
                                    disabled />
                            </input-component>
                        </div>
                    </tab-content>
                    <tab-content title="Link dos vídeos">
                        <div class="form-group mb-3">
                            <input-component titulo="Vídeo exposição teórica link">
                                <input type="text" class="form-control" :value="this.form.video_exposicaot_link"
                                    disabled />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Vídeo exposição prática link">
                                <input type="text" class="form-control" :value="this.form.video_exposicaop_link"
                                    disabled />
                            </input-component>
                        </div>
                    </tab-content>
                </form-wizard>
            </template>

            <template v-slot:rodape>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Fechar
                </button>
            </template>
        </modal-component>

        <!-- Modal Atualizar -->
        <modal-component id="modalAtualizar" titulo="Atualizar conteúdo" class="modal-xl" hidden.bs.modal="resetWizard">
            <template v-slot:alertas>
                <alert-component tipo="success" titulo="Atualização realizada com sucesso!"
                    v-if="cadastroStatus == 'sucesso'" :detalhes="cadastroDetalhes"></alert-component>
                <alert-component tipo="danger" titulo="Erro no cadastro!" :detalhes="cadastroDetalhes"
                    v-if="cadastroStatus == 'erro'"></alert-component>
            </template>

            <template v-slot:conteudo>
                <form-wizard ref="formWizardAtualizar" @on-complete="onCompleteAtualizar" color="#6C757D"
                    next-button-text="Avançar" back-button-text="Voltar" finish-button-text="Final">
                    <tab-content title="Conteúdos">
                        <div class="form-group mb-3">
                            <input-component titulo="Título do conteúdo">
                                <input type="text" class="form-control" v-model="form.titulo" />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Objetivo do conteúdo">
                                <textarea type="text" class="form-control" v-model="form.objetivo" />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Habilidades do conteúdo">
                                <textarea type="text" class="form-control" v-model="form.habilidades" />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Leitura e discussão do conteúdo">
                                <textarea type="text" class="form-control" v-model="form.leitura_discussao" />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Atividade prática do conteúdo">
                                <textarea type="text" class="form-control" v-model="form.atividade" />
                            </input-component>
                        </div>
                    </tab-content>

                    <tab-content title="Conteúdos das telas de vídeo">
                        <div class="form-group mb-3">
                            <input-component titulo="Vídeo conteúdo">
                                <textarea type="text" class="form-control" v-model="form.video_conteudo" />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Vídeo exposição teórica conteúdo">
                                <textarea type="text" class="form-control" v-model="form.video_exposicaot_conteudo" />
                            </input-component>
                        </div>
                        <div class="form-group mb-3">
                            <input-component titulo="Vídeo exposição prática conteúdo">
                                <textarea type="text" class="form-control" v-model="form.video_exposicaop_conteudo" />
                            </input-component>
                        </div>
                    </tab-content>

                    <tab-content title="Link dos vídeos">
                        <div class="form-group mb-3">
                            <input-component titulo="Vídeo exposição teórica link">
                                <input type="text" class="form-control" v-model="form.video_exposicaot_link" />
                            </input-component>
                            <input-component titulo="Vídeo exposição prática link">
                                <input type="text" class="form-control" v-model="form.video_exposicaop_link" />
                            </input-component>
                        </div>
                    </tab-content>
                </form-wizard>
            </template>

            <template v-slot:rodape>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Fechar
                </button>
                <button type="button" class="btn btn-primary" @click="atualizar">
                    Salvar
                </button>
            </template>
        </modal-component>

        <!-- Modal Remover -->
        <modal-component id="modalRemover" titulo="Remover conteúdo">
            <template v-slot:alertas>
                <alert-component tipo="success" titulo="Conteúdo removido com sucesso!"
                    v-if="cadastroStatus == 'sucesso'" :detalhes="cadastroDetalhes"></alert-component>
                <alert-component tipo="danger" titulo="Erro no cadastro!" :detalhes="cadastroDetalhes"
                    v-if="cadastroStatus == 'erro'"></alert-component>
            </template>

            <template v-slot:conteudo>
                <div class="form-group mb-3">
                    <input-component titulo="ID do cadastro">
                        <input type="text" class="form-control" :value="this.form.id" disabled />
                    </input-component>
                </div>
                <div class="form-group mb-3">
                    <input-component titulo="Título do conteúdo">
                        <input type="text" class="form-control" :value="this.form.titulo" disabled />
                    </input-component>
                </div>
            </template>

            <template v-slot:rodape>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Fechar
                </button>
                <button type="button" class="btn btn-danger" @click="remover">
                    Remover
                </button>
            </template>
        </modal-component>
    </div>
</template>

<style scoped></style>