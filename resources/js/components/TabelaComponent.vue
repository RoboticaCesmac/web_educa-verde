<script>
    export default {
        name: 'TabelaComponent',
        props: {
            dados: Array,
            colunas: Array,
            descricao: String,
            visualizar: String,
            remover: String,
            atualizar: String
        },

        methods: {
            setStore(item) {
                this.$store.state.item = item
            },
        }
    }
</script>

<template>
    <div class="tabela">
        <div class="topo">
            <p><strong>{{ descricao }}</strong> <span class="badge text-bg-secondary">{{ dados.length }}</span></p>
            <hr>
        </div>
        
        <div class="content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th v-for="coluna in colunas" :key="coluna">{{ coluna }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item) in dados" :key="item.id">
                        <th scope="row">{{ item.id}}</th>
                        <td v-for="coluna in colunas" :key="coluna">{{ item[coluna] }}</td>
                        <td>
                            <slot :item="item"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style scoped>
.tabela {
    width: 100%;
    padding: 35px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: white;
}

.topo p {
    font-size: 20px;
}

.edit {
    margin-right: 5px;
}
</style>