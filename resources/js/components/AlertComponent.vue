<script>
export default {
    props: ['tipo', 'titulo', 'detalhes'],
    computed: {
        estilo() {
            return 'alert alert-' + this.tipo;
        }
    }
}
</script>

<template>
    <div :class="estilo" role="alert">
        <strong>{{ titulo }}</strong>
        <hr>
        <p>{{ detalhes.mensagem }}</p>
        <br>
        <ul v-if="detalhes.listarErros">
            <li v-for="(e, key) in detalhes.listarErros" :key="key">{{ e[0] }}</li>
        </ul>
    </div>
</template>

<style scoped>
</style>
