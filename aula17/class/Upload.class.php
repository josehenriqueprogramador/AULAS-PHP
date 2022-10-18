<?php

class Upload {

    private $file;
    private $type;
    private $maxfilesize;
    private $error;

    public function uploadImage ($file, $maxfilesize = 2097152)
    {
        $this->file = $file;
        $arquivo = explode(".",$this->file["name"]);
        $file_ext = ".".$arquivo[count($arquivo)-1];

        $this->file["name"] = date("YmdHis").$file_ext; 
        $this->type = array("image/jpeg", "image/jpg","image/png","image/gif");
        $this->maxfilesize = $maxfilesize;

        if($this->checkFileSize()){
            if($this->checkFileType()){
                if($this->moveFile()){
                    $this->error = "Arquivo ".$this->file["name"]." enviado com sucesso.";
                    return true;
                }else{
                    $this->error = "Falha ao enviar o arquivo ".$this->file["name"];
                    return false;
                }
            }else{
                $this->error = "Tipo de arquivo não permitido.";
                return false;
            }
        }else{
            $this->error = "Arquivo maior que o permitido.";
            return false;
        }

    }

    private function checkFileSize()
    {
        if($this->file["size"] <= $this->maxfilesize){
            return true;
        }else{
            return false;
        }
    }
    private function checkFileType()
    {
        if(in_array($this->file["type"],$this->type))
        {
            return true;
        }else{
            return false;
        }
    }
    private function moveFile()
    {
        if(move_uploaded_file($this->file["tmp_name"],"../uploads/".$this->file["name"])){
            return true;
        }else{
            return false;
        }
    }

    public function getError()
    {
        return $this->error;
    }

    public function getFileName()
    {
        return $this->file["name"];
    }
}