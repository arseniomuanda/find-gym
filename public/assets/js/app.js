const appVue = new Vue({
    el: "#main",
    data() {
        return {
            ginasios: [],
            isLoading: false,
            isWelcome: true,
            cliente: {}
        }
    },

    methods: {
        getGinasios: async function (params) {
            this.isLoading = true;
            this.isWelcome = false;
            let options = 
            await fetch('/api')
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    this.isLoading = false;
                    this.ginasios = data.data;
                })
                .catch(error => {
                    console.error(error)
                    // Trate o erro, se houver algum
                });
        },
        getBI: async function (bi) {
            this.isLoading = true;
            await fetch(`/api/getBI/${bi}`)
                .then(response => response.json())
                .then(data => {
                    this.cliente = data;
                    document.getElementById('nome').value = data.nome;
                    document.getElementById('provincia').value = data.naturalidade;
                    document.getElementById('nacionalidade').value = "Angola";
                    document.getElementById('residencia').value = "Angola";
                    document.getElementById('sexo').value = data.genero;
                    document.getElementById('estado_civil').value = data.estado_civil;
                    document.getElementById('data_nascimento').value = data.data_nasc;
                    console.log(data);
                })
                .catch(error => {
                    // Trate qualquer erro que ocorra durante a requisição
                    console.error(error);
                });
        },

        setVisita: async function (id) {
            var formulario = document.getElementById(`form-${id}`);
            formulario.submit();
        }
    },
    mounted() {
        // this.getGinasios();
        var url = window.location.href; // Pega a URL atual
        if (url.startsWith("http://localhost:8000/site/detalhes/")) {
            var ultimoCaractere = url.slice(-1);
            if (!isNaN(ultimoCaractere)) {
                return this.setVisita(ultimoCaractere);
            }
        }
        return console.log("nao")
    },
})