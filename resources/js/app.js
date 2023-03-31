import {createApp} from "vue/dist/vue.esm-bundler";
import saludo from "./componentes/saludo.vue";
import cronometro from "./componentes/cronometro.vue";

createApp({
    components:{
        saludo,
        cronometro
        }
    }

).mount("#app");
