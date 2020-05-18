$(document).ready(function(){  
    $('#table-funcionario').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"
        }
    });
});

$("#forEdiFuncionario").submit(function(e){
    e.preventDefault();
    
    $.ajax({
        url: 'inc/editandoFuncionario.php',
        method: 'POST',
        data: $(this).serialize(),
        success:function(data){
            var data = JSON.parse(data);
            if(data.erro > 0){
                $("#msgEditFuncionario").html(data.msg);
            }else{
                $("#msgFuncionario").html(data.msg);
                $("#funcionarios").load("inc/employee.php");
                $("#modalEditFuncionário").modal('hide');
            }
        }
    });
});

$("#forNewFuncionario").submit(function(e){
    e.preventDefault();

    $.ajax({
        url: 'inc/insert.php',
        method: 'POST',
        data: $(this).serialize(),
        success:function(data){
            var data = JSON.parse(data);
            if(data.erro > 0){
                $("#msgNewFuncionario").html(data.msg);
            }else{
                $("#msgFuncionario").html(data.msg);
                $("#funcionarios").load("inc/employee.php");
                $("#modalNewFuncionário").modal('hide');
            }
        }
    });
});

$("#formDelFuncionario").submit(function(e){
    e.preventDefault();
    
    $.ajax({
        url: 'inc/deleteFuncionario.php',
        method: 'POST',
        data: $(this).serialize(),
        success:function(data){            
            $("#msgFuncionario").html(data);  
            $("#funcionarios").load("inc/employee.php");
            $("#modalDelFuncionário").modal('hide');
        }
    });
});

function editFuncionario(id){
    $("#editFuncionario").load('inc/editFuncionario.php?id='+id);
}

function delFuncionario(id){
    $("#idDel").val(id);
}