import {createApp} from "vue/dist/vue.esm-bundler";
import saludo from "./componentes/saludo.vue";
import cronometro from "./componentes/cronometro.vue";
import mitabla from "./componentes/mitabla.vue";

createApp({
    components:{
        saludo,
        cronometro,
        mitabla
        }
    }

).mount("#app");
