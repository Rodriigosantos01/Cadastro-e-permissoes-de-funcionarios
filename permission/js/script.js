$(document).ready(function(){ 
    $(".inputCheck").change(function(){
        if ($(this).is(':checked')) {
            var valor = 1;
        }else{
            var valor = 0;
        }
        var coluna = $(this).attr('colum');
        var id = $(this).data('id');        

        $.ajax({
            url: "inc/editPermission.php",
            method: "POST",
            data: 'coluna='+coluna+'&id='+id+'&valor='+valor,
            success:function(data){
                
            }
        });
    });

    $("#delPermissao").submit(function(e){
        e.preventDefault();
        
        $.ajax({
            url: "inc/delete.php",
            method: "POST",
            data: $(this).serialize(),
            success:function(data){
                var data = JSON.parse(data);
                if(data.erro > 0){
                    $("#msgDelPermissaoModal").html(data.msg);
                }else{
                    $("#permission").load('inc/permission.php');
                    $("#modalDelPermission").modal('hide');
                    $("#msgPermissao").html(data.msg);                    
                }
            }
        });
    });

    $("#editDescricaoPermissao").submit(function(e){
        e.preventDefault();
        
        $.ajax({
            url: "inc/editNome.php",
            method: "POST",
            data: $(this).serialize(),
            success:function(data){
                var data = JSON.parse(data);
                if(data.erro > 0){
                    $("#msgEditDescricaoPermissaoModal").html(data.msg);
                }else{
                    $("#permission").load('inc/permission.php');
                    $("#modalEditPermission").modal('hide');
                    $("#msgPermissao").html(data.msg);                    
                }
            }
        });
    });
    
    $("#newPermissao").submit(function(e){
        e.preventDefault();
        
        $.ajax({
            url: "inc/insert.php",
            method: "POST",
            data: $(this).serialize(),
            success:function(data){
                var data = JSON.parse(data);
                if(data.erro > 0){
                    $("#msgPermissaoModal").html(data.msg);
                }else{
                    $("#permission").load('inc/permission.php');
                    $("#modalNewPermission").modal('hide');
                    $("#msgPermissao").html(data.msg);
                    $("#newPermissao")[0].reset();
                }
            }
        });
    });
});

function deletePermission(id){
    $("#modalDelPermission").modal('show');
    $("#idDelPermissao").val(id);
}

function editPermission(id, descricao){
    $("#modalEditPermission").modal('show');
    $("#idEditPermissao").val(id);
    $("#DescricaoEditPermissao").val(descricao);
}