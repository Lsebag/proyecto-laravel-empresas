<template>
    <table>
        <h2 v-html="mensaje"></h2>

        <caption>
            {{
                tabla
            }}
        </caption>
        <tr>
            <td v-for="(campo, indice) in campos">
                <input
                    @keyup="filtrar(campo, valor[indice])"
                    type="text"
                    v-model="valor[indice]"
                />
            </td>
        </tr>
        <tr>
            <!--            En estas iteraciones recorro el array campos y me quedo con el valor campo, asimismo en las iteraciones siguientes recorro los arrays (los cuales están en plural) y me quedo con los valores en singular-->
            <th v-for="campo in campos">
                <button @click="ordenar(campo)">{{ campo }}</button>
            </th>
            <th colspan="3">Opciones</th>
        </tr>
        <tr v-for="fila in filas.data">
            <td v-for="valor in fila">{{ valor }}</td>

            <td>
                <button @click="editar(fila.id)">Editar</button>
            </td>

            <td><button @click="borrar(fila.id)">Borrar</button></td>

            <td><button>Mostrar</button></td>
        </tr>
    </table>
    <tailwind-pagination :data="filas" @pagination-change-pages="getResults" />
</template>

<script>
import axios from "axios";
import { TailwindPagination } from "laravel-vue-pagination";
export default {
    name: "mitabla",
    components: {
        TailwindPagination,
    },
    props: ["filas_serializadas", "campos_serializados", "tabla"],
    data() {
        return {
            filas: Array,
            campos: Array,
            ascendente: true,
            valor: Array,
            filas_originales: Array,
            // len_campo: Array,
            mensaje: String,
        };
    },
    created() {
        this.filas = JSON.parse(this.filas_serializadas);
        this.campos = JSON.parse(this.campos_serializados);
        this.filas_originales = this.filas;
        this.mensaje = "";
        // this.campos.array.forEach((campo, index) => {
        //     this.len_campo[index] = campo.lenght;
        // });
    },
    methods: {
        ordenar: function (campo) {
            this.filas = this.filas.sort((a, b) => {
                let retorno;
                if (a[campo] > b[campo]) retorno = this.ascendente ? 1 : -1;
                else retorno = this.ascendente ? -1 : 1;
                return retorno;
            });
            this.ascendente = !this.ascendente;
        },
        filtrar: function (campo, valor) {
            // this.filas = JSON.parse(this.filas_serializadas);
            this.filas = this.filas_originales;
            this.filas = this.filas.filter((fila) => {
                let texto = new String(fila[campo]);
                if (texto.indexOf(valor) > -1) return fila;
            });
        },
        editar: function (id) {
            let url = window.location.href;
            url = url + "/" + id + "/edit";
            window.location.href = url;
        },
        getResults(page = 1) {
            let url = window.location.href;
            let self = this;
            axios
                .get(url + "/paginate?page=" + page)
                .then(function (response) {
                    self.filas = response.data;
                    console.log("Respuesta " + response.data);
                })
                .catch(function (error) {
                    console.error("ERROR" + error);
                });
        },
        borrar: function (id) {
            let url = window.location.href;
            if (url.endsWith("/")) {
                url = url.slice(0, -1);
            }
            url = url + "/" + id;

            axios
                .delete(url)
                .then((response) => {
                    this.filas = response.data;
                    this.mensaje =
                        "<span style='color:blue'>Se ha borrado en la tabla " +
                        this.tabla +
                        " la fila de id " +
                        id +
                        "</span>";
                })
                .catch((e) => {
                    this.mensaje =
                        "<span style='color:red'>Error borrando en la tabla " +
                        this.tabla +
                        "la fila de id " +
                        id +
                        "</span>";
                });
        },
    },
};
</script>

<style scoped></style>
