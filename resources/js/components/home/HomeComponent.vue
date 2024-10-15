<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header text-white">
                        Bem-vindo
                    </div>
                    <div class="card-body">
                        <p class="mb-0">Você está logado! Acesse as turmas através da barra de navegação!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
}
</script>

<style scoped>
.container {
    margin-top: 50px;
}

.card {
    border-radius: 10px;
    border: none;
}

.card-header {
    background-color: #3b934f;
    color: white;
    font-weight: bold;
    text-align: center;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.card-body {
    font-size: 16px;
    color: #6c757d;
    text-align: center;
    padding: 20px;
}

p {
    margin-bottom: 0;
}

.shadow-sm {
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
}

p {
    color: #3b934f; 
    font-weight: 500;
}
</style>
