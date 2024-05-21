<?php

require_once 'model/Projeto.php';

class ProjetoController{
    $obj = new Projeto();
    $projetos = $obj->all();

    require_once 'view/Projeto_all.php';
}

public function create(){
    $obj = new Projeto();
    if(isset($_POST{'nome'}) ){
        $obj->setNome($_POST['nome']);
        $obj->setDuracao($_POST['duracao']);
        $obj->create();
        $projeto = $obj->read();
    }
    else{
        $projeto = (object[ 
            'id' => null,
            'nome' => '',
            'duracao' => '',
        ])
    };

    require_once 'view/Projeto_update.php';
}

public function delete(){
    $obj = new Projeto();
    $obj->setId($_GET['id']);
    $obj->delete();

    header("Location: ./");
}
