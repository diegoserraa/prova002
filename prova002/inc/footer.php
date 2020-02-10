


<script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

<script type="text/javascript">
  $(document).ready(function () {         
   var $campoCpf = $("#cpf"); 
   var $campoCep = $("#cep"); 
   var $campoTelefone = $("#telefone");      
   $campoCpf.mask('000.000.000-00');  
   $campoCep.mask('00000-000');
   $campoTelefone.mask('(00) 00000-0000');

   function limpa_formulário_cep() {
    
    $("#rua").val("");
    $("#bairro").val("");
    $("#cidade").val("");
    $("#uf").val("");
    $("#ibge").val("");
  }
  
  $("#cep").blur(function() {
    console.log($(this).val());
    
    var cep = $(this).val().replace(/\D/g, '');
    
    if (cep != "") {

      var validacep = /^[0-9]{8}$/;

      if(validacep.test(cep)) {

        $("#rua").val("...");
        $("#bairro").val("...");
        $("#cidade").val("...");
        $("#uf").val("...");
        $("#ibge").val("...");

        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

          if (!("erro" in dados)) {

            $("#rua").val(dados.logradouro);
            $("#bairro").val(dados.bairro);
            $("#cidade").val(dados.localidade);
            $("#uf").val(dados.uf);
            $("#ibge").val(dados.ibge);
          } 
          else {

            limpa_formulário_cep();
            alert("CEP não encontrado.");
          }
        });
      } 
      else {

        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
      }
    } 
    else {

      limpa_formulário_cep();
    }

  });
});

</script>



































</body>
</html>