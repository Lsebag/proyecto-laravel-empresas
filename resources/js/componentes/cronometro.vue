<template>
{{minutos}}:{{segundos}}:{{decimas}}<br>
<!--    <button @click="f_parar_arrancar" >{{parar_arrancar}}</button>-->
    <button @click="cambia_estado" >{{parar_arrancar}}</button><br>
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
            parar_arrancar:"Start",
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
        // f_parar_arrancar :function (){
        cambia_estado :function (){
            this.funcionando=!this.funcionando;
            this.parar_arrancar=this.funcionando?"Stop":"Start";

            // if (this.funcionando===false){
            //     this.funcionando=true;
            //     this.parar_arrancar="Stop";
            // }else {
            //     this.funcionando=false;
            //     this.parar_arrancar="Start";
            // }
        },
        resetear:function (){
            this.minutos=0;
            this.segundos=0;
            this.decimas=0;
            this.funcionando=false;
            this.parar_arrancar="Start"
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
