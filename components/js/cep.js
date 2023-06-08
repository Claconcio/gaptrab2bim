function buscaCep(){
    let cep = document.getElementById('cep').value;

    if (cep != ""){
        let url = "https://brasilapi.com.br/api/cep/v1/" + cep;
        
        let req = new XMLHttpRequest();
        req.open("GET", url);
        req.send();

        // Tratando a resposta
        req.onload = function (){
            if (req.status === 200){
                let end = JSON.parse(req.response);

                if (end.street != "undefined" && end.street != null && end.street != undefined){
                    document.getElementById("endereco").value = end.street;
                }
                
                if (end.neighborhood != "undefined" && end.neighborhood != null && end.neighborhood != undefined) {
                    document.getElementById("bairro").value = end.neighborhood;
                }
                
                if (end.city != "undefined" && end.city != null && end.city != undefined) {
                    document.getElementById("cidade").value = end.city;
                }

                if (end.state != "undefined" && end.state != null && end.state != undefined) {
                    document.getElementById("estado").value = end.state;
                }
            } else if (req.status === 404) {
                alert("CEP inválido!");
            } else {
                alert("Erro ao buscar CEP!");
            }
        }
    }
}

/*window.onload = function (){
    let cep = document.getElementById("cep");
    cep.addEventListener("blur", buscaCep);
}*/