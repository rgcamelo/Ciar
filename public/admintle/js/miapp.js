$(document).ready(function () {
    
    $('#noautores').on('change',function() {
      $('#grupo').empty();
      var $numero = 0;
      $numero = $('#noautores').val();
        for (var i=1; i<=$numero; i++) {
          $('#grupo').append('<div style="margin-bottom: 25px" class="input-group"><span class="input-group-addon">Autor No '+i+'</span><input id="autores" type="text" class="form-control" required name="autor'+i+'"></div>');
        } 
    });

    if($('#noautores').val() > 0){
      var $numero = 0;
      $numero = $('#noautores').val();
        for (var i=1; i<=$numero; i++) {
          $('#grupo').append('<div style="margin-bottom: 25px" class="input-group"><span class="input-group-addon">Autor No '+i+'</span><input id="autores" type="text" class="form-control" required name="autor'+i+'"></div>');
        } 
    }

    

    
});