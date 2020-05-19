<b>Sistema em PHP de cadastro de funcionários e permissões de funcionários</b>

Tecnologias usadas:

-PHP<br>
  &nbsp;&nbsp;-Orientação a objetos <br>
  &nbsp;&nbsp;-PDO <br>
  &nbsp;&nbsp;-PHPMailer <br>
-Jquery <br>
	&nbsp;&nbsp;-Ajax <br>
-Bootstrap <br>
	&nbsp;&nbsp;-Responsividade <br>
  &nbsp;&nbsp;-GRID <br>
-Datatables <br>

<b>Como o sistema funciona?</b><br>
O sistema é bem simples e fácil de entender, para fazer cadastro de funcionário<br>
antes é necessário fazer o cadastro da permissão, nas permissões é possível<br>
configurar oque o funcionário poderar fazer ou não, <br>
ao cadastrar o funcionário, será salvo seu e-mail na tabela "tbl_enviar_email"<br>
essa tabela é a lista de e-mail para serem enviados<br>
para que os emails sejam enviados é necessário abrir um arquivo "/enviar email/enviarEmail.php"<br>
esse arquivo recebe por GET o parâmetro "qtd" é opcional, nesse parâmetro pode ser colocado a quantidade<br>
de e-mail que será enviado, se não passar o parâmetro será enviado um por vês,<br>
ao enviar o e-mail o funcionário recebe a senha e dados para acesso.<br>

<b>Intruções técnicas do sistema</b>

<b>Configuração do banco de dados:</b>

Colocar informações para acesso de banco de dados.
arquivo: /src/Conexao.php

<b>Configuração do Envio de email:</b>

Configurar para enviar email
arquivo: /enviar email/enviarEmail.php

Nesse arquivo é necessário colocar informações de email tem duas variavesi reservadas para isso linha 9,10


<b>Duvidas ou sugestões</b>
<b>Linkedin: <a href="https://www.linkedin.com/in/rodriigosantos/">in/rodriigosantos/</a></b>
