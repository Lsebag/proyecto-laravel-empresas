<template>
{{minutos}}:{{segundos}}:{{decimas}}
    <button @click="f_parar_arrancar" >{{parar_arrancar}}</button>
    <button @click="resetear" >Resetear</button>
</template>

<script>
export default {
    name: "cronometro",
    data(){
        return{
            minutos:0,
            segundos:0,
            decimas:0,
            parar_arrancar:"Arrancar",
            funcionando:false
        }
    },
    mounted() {
        setInterval(()=>{
            if (this.funcionando){
        this.decimas++;
            if(this.decimas===10){
                this.decimas=0;
            this.segundos++;
            if (this.segundos===60){
                this.segundos=0;
                this.minutos++
            }
        }
        }
        },100)
    },
    methods:{
        f_parar_arrancar :function (){
            if (this.funcionando===false){
                this.funcionando=true;
                this.parar_arrancar="Parar";
            }else {
                this.funcionando=false;
                this.parar_arrancar="Arrancar";
            }
        },
        resetear:function (){
            this.minutos=0;
            this.segundos=0;
            this.decimas=0;
            this.funcionando=false;
            this.parar_arrancar="Arrancar"
        }
    }

    }

</script>

<style scoped>

</style>
