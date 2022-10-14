<?php
// Introdução a Orientação a Objetos (OO)

class ControleRemoto{

private $volume;
private $canal;
private $status;

    public function __construct()
    {
        $this->status = true;
        $this->volume = 10;
        $this->canal = 97;
    }

    /**
     * Métodos Set
     */
    private function SetStatus(bool $status = flase)
    {
        $this->status = $status;
    }
    private function SetVolume(int $volume)
    {
        $this->volume = $volume;
    }
    private function SetCanal(int $canal)
    {
        $this->canal = $canal;
    }

    /**
     * Métodos Get
     */

    public function GetStatus(){
        return $this->status;
    } 
    public function GetVolume()
    {
        return $this->volume;
    }
    public function GetCanal()
    {
        return $this->canal;
    }

    public function LigaDesliga()
    {
        switch ($this->GetStatus) {
            case true:
                echo "<p>Desligando a tv...<br>TV Desligada!</p>";
                $this->SetStatus(false);
                break;
            
            case false:
                echo "<p>TV ligada!</p>";
                $this->SetStatus(true);
                break;
        }
    }

    public function AumentarVolume()
    {
        $volume = $this->GetVolume();
        if($volume < 100){
            $volume += 10;
            $this->SetVolume($volume);
            echo "<p>Volume: ".$this->GetVolume()."</p>";
        }else{
            echo "<p>Volume no Máximo!</p>";
        }  
    }

    public function DiminuirVolume()
    {
        $volume = $this->GetVolume();
        if($volume > 0){
            $volume -= 10;
            $this->SetVolume($volume);
            echo "<p>Volume: {$this->GetVolume()}</p>";
        }else{
            echo "<p>Volume no Mínimo!</p>";
        }
    }

    public function CanalUp()
    {
        $canal = $this->GetCanal();
        if(($canal>=1)&&($canal<=99)){
            $canal++;
            $this->SetCanal($canal);
        }
        if($canal > 99){
            $canal = 1;
            $this->SetCanal($canal);
        }
        $this->SetCanal($canal);
        echo "<p>Canal: $canal</p>";
    }

    public function CanalDown()
    {
        $canal = $this->GetCanal();
        if(($canal>=1)&&($canal<=99)){
            $canal--;
            $this->SetCanal($canal);
        }
        if($canal < 1){
            $canal = 99;

        }
        $this->SetCanal = $canal;
        echo "<p>Canal: $canal</p>";
    }

}

$controle = new ControleRemoto();
$controle->AumentarVolume();
$controle->DiminuirVolume();
$controle->CanalUp();
$controle->CanalUp();
$controle->CanalUp();
$controle->CanalDown();
$controle->CanalDown();

echo "<pre>";
var_dump($controle);
echo "</pre>";