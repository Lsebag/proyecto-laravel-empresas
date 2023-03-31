<template>
<h1>Hola desde un componente vue</h1>
    Valor recibido {{nombre}}<hr>
    Valor generado {{valor1}}<hr>
    <button @click="dime_algo">Click me</button>
</template>

<script>
export default {
    name: "saludo",
    props:['nombre'],
    data(){
        return{
            valor1: 'Hola desde vue'
        }
    },
    methods:{
        dime_algo:function (){
            return alert("Valor de valor es "+this.valor1);
            }
    }
}
</script>

<style scoped>

</style>
