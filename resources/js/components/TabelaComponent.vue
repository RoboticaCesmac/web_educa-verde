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
}
</script>

<template>
    <div class="tabela">
        <div class="topo">
            <p><strong>Temas</strong></p>
            <hr>
        </div>

        <div class="content">
            <table class="table table-striped tabela">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Exemplo</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Exemplo</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Exemplo</td>
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