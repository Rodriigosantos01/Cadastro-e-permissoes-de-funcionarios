$(document).ready(function(){
    $("#formEditPerfil").submit(function(e){
        e.preventDefault();
        $('#msgEditPerfil').html('');
        $.ajax({
            url: 'inc/editPerfil.php',
            method: 'POST',
            data: $(this).serialize(),
            success:function(data){                
                $('#msgEditPerfil').html(data);
            }
        });
    });

    $("#formEditSenha").submit(function(e){
        e.preventDefault();
        $('#msgEditSenha').html('');
        $.ajax({
            url: 'inc/editSenha.php',
            method: 'POST',
            data: $(this).serialize(),
            success:function(data){                
                $('#msgEditSenha').html(data);
                $("#formEditSenha")[0].reset();
            }
        });
    });
});