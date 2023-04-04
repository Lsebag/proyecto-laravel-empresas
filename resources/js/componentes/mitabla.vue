<template>
    <table>
        <caption>{{tabla}}</caption>
        <tr>
<!--            En estas iteraciones recorro el array campos y me quedo con el valor campo, asimismo en las iteraciones siguientes recorro los arrays (los cuales están en plural) y me quedo con los valores en singular-->
            <th v-for='(campo) in campos'><button @click='ordenar(campo)'>{{campo}}</button></th>
        </tr>

        <tr v-for="(fila) in filas">
            <td v-for="(valor) in fila">{{valor}}</td>
        </tr>

    </table>
</template>

<script>
export default {
    name: "mitabla",
    props:['filas_serializadas','campos_serializados','tabla'],
    data(){
        return{
            filas:Array,
            campos:Array,
            orden_ascendente:true
        }
    },
    created() {
        this.filas = JSON.parse(this.filas_serializadas)
        this.campos = JSON.parse(this.campos_serializados)

    },
    methods:{
        ordenar: function (campo){
            this.filas=this.filas.sort((a,b)=> {
                if (a[campo] > b[campo])
                    return 1;
                else
                    return -1;
            });
        }
    }
}
</script>

<style scoped>

</style>
