<?php
    require dirname(dirname(__FILE__)).'/autoload.php';
    require '../vendor/autoload.php';
    use App\Enviandoemail;
    use App\Funcionario;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    $emailEnviar = ''; //Email para enviar o emails TEM QUE SER GMAIL
    $senhaEmailEnviar = ''; //Senha do gmail 

    //Se informar a quantidade por GET ele enviar email para essa quantidade se não somente para um de cada vez
    if(isset($_GET['qtd'])){
        $qtd = $_GET['qtd'];
    }else{
        $qtd = '1';
    }

    $enviandoEmail = new Enviandoemail();
    $rs = $enviandoEmail->select($qtd);

    foreach($rs as $email){
        
        (String) $senha = gerar_senha(10, true, true, true, false);
        
        if($email['tipo'] == '1'){//Novo cadastro
            @(String) $mensagem = "
                Temos uma boa noticia, você foi cadastrado em nosso sistema segue os dados para login!
                Login: {$email['email']}
                Senha: $senha
                
                Acesse já: https://{$_SERVER['HTTP_HOST']}
            ";

            @(String) $assunto = 'Seu cadastro';
        }elseif($email['tipo'] == '2'){//Esqueci a senha
            @(String) $mensagem = "
                Temos uma boa noticia, foi gerado uma nova senha!
                Login: {$email['email']}
                Senha: $senha
                
                Acesse já: https://{$_SERVER['HTTP_HOST']}
            ";

            @(String) $assunto = 'Nova senha';
        }
        //Chama a função para enviar email e coloca resultado em uma variavel
        $confirmEnviar = EnviarEmail($email['email'], $mensagem, $assunto);

        //Verifica se deu certo enviar o email, se deu certo coloca a data que foi enviado 
        //E salva a senha do novo funcionário
        if($confirmEnviar){
            $rs = $enviandoEmail->confimarEnvio($email['id']);
            
            $func = new Funcionario();
            $func->updateSenha($senha, $email['email']);
            var_dump($rs);
        }else{
            echo "Erro ao enviar";
        }
    }
    
    function EnviarEmail($email, $mensagem, $assunto){
        
        global $emailEnviar;
        global $senhaEmailEnviar;        

        $mail = new PHPMailer;
        $mail->isSMTP();
    
        //Ativar dupuração do SMTP
        // SMTP::DEBUG_OFF = off (para uso em produção_
        // SMTP::DEBUG_CLIENT = (mensagem para clientes)
        // SMTP::DEBUG_SERVER = (Mensagem para clientes e servidor)
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
    
        //Nome do host do gmail
        $mail->Host = 'smtp.gmail.com';
    
        //Porta para autenficação
        $mail->Port = 587;
    
        //Tipo de criptografia usada
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    
        //Se deve usar a autenticação SMTP
        $mail->SMTPAuth = true;
    
        //gmail que vai enviar o email
        $mail->Username = $emailEnviar;
    
        //Senha do gmail
        $mail->Password = $senhaEmailEnviar;
    
        //Email que vai ser enviado a mensagem
        $mail->setFrom($email, 'Rodrigo Santos');

        //Email para quem a mensagem vai ser enviada
        $mail->addAddress($email, 'Rodrigo Santos2');
    
        //Email para receber resposta
        //$mail->addReplyTo('rodrigosantos1000@yahoo.com.br', 'Rodrigo Silva');
    
        //Assunto do email
        $mail->Subject = $assunto;
    
        //Aqui pode ser colocado um arquivo html para ser enviado no email
        //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
    
        //Corpo do email
        $mail->Body  = $mensagem;
    
        //Arquivos de imagem
        //$mail->addAttachment('images/phpmailer_mini.png');
    
        //Verificar se ouve erro ao enviar a mensagem
        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }

    function gerar_senha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos){
        $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
        $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
        $nu = "0123456789"; // $nu contem os números
        $si = "!@#$%¨&*()_+="; // $si contem os símbolos
        $senha = '';
        
        if ($maiusculas){
              // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
              $senha .= str_shuffle($ma);
        }
       
          if ($minusculas){
              // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
              $senha .= str_shuffle($mi);
          }
       
          if ($numeros){
              // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
              $senha .= str_shuffle($nu);
          }
       
          if ($simbolos){
              // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
              $senha .= str_shuffle($si);
          }
       
          // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
          return substr(str_shuffle($senha),0,$tamanho);
    }