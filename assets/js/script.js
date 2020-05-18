$("#formLogin").submit(function(e){
    e.preventDefault();
    
    $.ajax({
        url: 'inc/login.php',
        method: 'POST',
        data: $(this).serialize(),
        success:function(data){
            var data = JSON.parse(data);
            if(data.login === true){
                setInterval(function(){
                    window.location.assign("/home");
                }, 2000);
            }
            $("#msgLogin").html(data.msg);
        }
    })
});