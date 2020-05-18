<?php 

    spl_autoload_register(function($class){
        
        $diretorio = __DIR__;
        $pasta = str_replace('App\\', 'src/', $class);
        $caminhoCompleto = $diretorio.'/'.$pasta.'.php';
        
        if(file_exists($caminhoCompleto)){
            require $caminhoCompleto;
            return;
        }
        die('Erro ao encontrar classe: '.$caminhoCompleto);
    });  