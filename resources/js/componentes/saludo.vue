<template>
<h1>Hola desde un componente vue</h1>
    Valor recibido desde fuera: {{nombre}}<hr>
    Valor generado dentro del componente: {{nombre_interno}}<hr>
    <button @click="dime_algo">Click me</button>
</template>

<script>
export default {
    name: "saludo", // Nombre del componente
    props:['nombre'], // En props pongo los atributos que voy a recibir de afuera
    data(){ // Esta función va a devolver las variables del componente
        return{
            nombre_interno: 'Hola desde vue'
        }
    },
    methods:{
        dime_algo:function (){
            return alert("Valor de valor es "+this.nombre_interno);
            }
    }
}
</script>

<style scoped>
    button{
        background-color: lightblue;
        color: black;
        font-weight: bold;
    }

</style>
