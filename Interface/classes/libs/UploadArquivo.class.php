<?php

/*
 *   Classe para Upload de Arquivo
 *
 *
 *
 *  Autor: Alex Ishida v0.2
 *

 Exemplo:
 *
                $upload = new UploadArquivo($_FILES);
                if($upload->salvar("nova/", "arquivo"))
                {
                    echo "Arquivo enviado com sucesso";
                }
                else
                {
                    echo $upload->error['mensagem'];
                }
 *
 */
class UploadArquivo {

    private $arquivo;
    public $error;
    public $arquivo_nome;
    public $arquivo_nome_novo;
    public $arquivo_tipo;
    public $arquivo_tamanho;
    public $arquivo_temp;
    public $arquivo_extensao;


    function UploadArquivo($arquivo_upload) {
        $this->arquivo = $arquivo_upload;
    }


    function salvar($pasta, $campo, $arquivo_unico=true, $mode=0777) {

        if($prefixo != "")
        {
            $prefixo = $prefixo.'-';
        }



        if (!$this->arquivo) {

            $this->erro['mensagem'] = 'Nenhum arquivo enviado!';
            return false;

        } else {
            $this->arquivo_nome = $_FILES[$campo]['name'];
            $this->arquivo_tipo = $_FILES[$campo]['type'];
            $this->arquivo_tamanho = $_FILES[$campo]['size'];
            $this->arquivo_temp = $_FILES[$campo]['tmp_name'];
            $this->error['id'] = $_FILES[$campo]['error'];



            // Obtem a extensão do arquivo
            $extensao = explode(".", $this->arquivo_nome);
            $extensao_posicao = count($extensao)-1;
            $this->arquivo_extensao = $extensao[$extensao_posicao];




        switch ($this->error['id']) {
            case 0:
                break;
            case 1:
                $this->error['mensagem'] = 'O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini.';
                return false;
                break;
            case 2:
                $this->error['mensagem'] = 'O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário HTML. ';
                return false;
                break;
            case 3:
                $this->error['mensagem'] = 'O upload do arquivo foi feito parcialmente. ';
                return false;
                break;
            case 4:
                $this->error['mensagem'] = 'Não foi feito o upload do arquivo. ';
                return false;
                break;
        }

        if ($this->error['id'] == 0) {
            if (!is_uploaded_file($this->arquivo_temp))
            {

                $this->error['mensagem'] = 'Erro ao processar arquivo!';
                 return false;

            } else {

                // Cria pasta se não existir
                if(!is_dir($pasta))
                {
                    mkdir($pasta,$mode);
                }



            if($arquivo_unico)
            {
                $this->arquivo_nome_novo = md5(time().$this->arquivo_nome).".".$this->arquivo_extensao;

            } else
            {
                $this->arquivo_nome_novo = $this->arquivo_nome;
            }




                if (!move_uploaded_file($this->arquivo_temp, $pasta . '' . $this->arquivo_nome_novo))
                {

                    $this->error['mensagem'] = 'Não foi possível salvar o arquivo!';
                    return false;


                } else
                {
                    return true;
                }




            }
        }
    }

    }
}

?>
