 $(document).ready(function()
    { $('#klik').click(function(){
      var medsos = $("#medsos").val();
      
           $.ajax({
            type : 'POST',
            url  : '',
            data : medsos,
            
            });
            return false;
  });
    });