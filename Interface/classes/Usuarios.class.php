<?php
    Class Usuarios extends UsuariosModelo
    {

        

/*
      function atualizarUsuario()
        {
                $this->id = $_GET['id'];
                $this->nome = $_POST['nome'];
                $this->email = $_POST['email_antigo'];



                $this->email = $_POST['email'];

                if($_POST['email_antigo'] != $_POST['email'])
                {
                   $usuario = parent::buscaUsuario();
                    if($usuario->email != '')
                    {
                        Erro::cadastra("O E-MAIL <b>".$this->email."</b> JÁ FOI CADASTRADO!");
                        return;
                    }
                }

              
                 $this->status_ativo = 'S';
      

                if($_POST['senha'] != '')
                {
                   $this->senha = md5($_POST['senha']);

                  
                  
                   $dados_usuario = parent::buscaUsuario();

                   $this->email = $_POST['email'];


                   if($dados_usuario->senha == md5($_POST['senha_atual']))
                   {
                        Erro::cadastra(parent::atualizarSenha());
                   }
                   else
                   {
                       Erro::cadastra("A SENHA ATUAL NÃO CONFERE!");
                       return;

                   }


                }
                else
                {

                   $this->email = $_POST['email'];
                    Erro::cadastra(parent::atualizar());

                }







     }
*/
        function  autenticaUsuario() {

            $this->login = $_POST['login'];
            $this->senha = md5($_POST['senha']);
            $usuario_dados = parent::buscaUsuario();

            if($usuario_dados->login == $this->login)
            {

                if($usuario_dados->senha == $this->senha)
                {
                    
                  if($usuario_dados->status_ativo == 'S')
                  {


                    

                        $_SESSION['id_usuario'] = $usuario_dados->id;
                        $_SESSION['status_usuario'] = "ATIVO";
                        $_SESSION['nome_usuario'] = $usuario_dados->nome;
                        $_SESSION['email_usuario'] = $usuario_dados->email;
                        $_SESSION['data_hora_login'] = date("d/m/Y H:i:s");
                        $_SESSION['token_sistema'] = TOKEN_SISTEMA;


                        header('Location: index.php');
                        
                       exit;

                   




                  }
                  else
                  {
                      Erro::cadastra("Usuário inativo!");
                      return;
                  }

                }
                else
                {

                    Erro::cadastra("Login ou senha inválidos!");
                    return;

                }



            }
            else {

                Erro::cadastra("Login ou senha inválidos!");
                return;
            }

        }


        

      function dadosUsuario() {


        return parent::unicoResultado();

          
      }


     
}
?>
