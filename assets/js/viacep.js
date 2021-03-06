$(document).ready(function() {
    
    function limpa_formulário_cep() {        
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");        
    }    
    
    $("#cep").blur(function() {
     
        var cep = $(this).val().replace(/\D/g, '');
        if (cep != "") {

            var validacep = /^[0-9]{8}$/;
            if(validacep.test(cep)) {                
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {                        
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);  
                        $("#numero").focus();                    
                    }else {
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            }else {
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        }else {
            limpa_formulário_cep();
        }
    });
});