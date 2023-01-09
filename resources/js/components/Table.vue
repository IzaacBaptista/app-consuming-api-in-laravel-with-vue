<template>
  <div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col" v-for="(t, key) in titulos" :key="key">
            {{ t.titulo }}
          </th>
          <th v-if="visualizar.visivel || editar.visivel || excluir.visivel">
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(obj, chave) in dadosFiltrados" :key="chave">
          <td v-for="(valor, chaveValor) in obj" :key="chaveValor">
            <span v-if="titulos[chaveValor].tipo == 'texto'">{{ valor }}</span>
            <span v-if="titulos[chaveValor].tipo == 'data'">
              {{ "..." + valor }}
            </span>
            <span v-if="titulos[chaveValor].tipo == 'imagem'">
              <img :src="'/storage/' + valor" width="30" height="30" />
            </span>
          </td>
          <td v-if="visualizar.visivel || editar.visivel || excluir.visivel">
            <button v-if="visualizar.visivel " class="btn btn-outline-success btn-sm" :data-toggle="visualizar.dataToggle" :data-target="visualizar.dataTarget" @click="setStore(obj)">
              Visualizar
            </button>
            <button v-if="editar.visivel " class="btn btn-outline-primary btn-sm" :data-toggle="editar.dataToggle" :data-target="editar.dataTarget" @click="setStore(obj)">
              Editar
            </button>
            <button v-if="excluir.visivel " class="btn btn-outline-danger btn-sm" :data-toggle="excluir.dataToggle" :data-target="excluir.dataTarget" @click="setStore(obj)">
              Excluir
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: ["dados", "titulos", "visualizar", "editar", "excluir"],
  methods: {
    setStore(obj) {
      this.$store.state.item = obj;
    }
  },
  computed: {
    dadosFiltrados() {
      let campos = Object.keys(this.titulos);
      let dadosFiltrados = [];

      this.dados.map((item, chave) => {
        let itemFiltrado = {};
        campos.forEach((campo) => {
          itemFiltrado[campo] = item[campo];
        });

        dadosFiltrados.push(itemFiltrado);
      });

      return dadosFiltrados;
    },
  },
};
</script>
