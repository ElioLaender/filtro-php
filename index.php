<?php

include_once "project/auto_load/Auto_load.php";
use project\logica_filtro\Filtro_consulta as Consulta;
use project\logica_visual\Visual_controle as Visual;

    $objData = new Consulta;
    $objVisual = new Visual;
    $objVisual->set('dados', $objData->listaDados());
    $objVisual->render("project/logica_visual/telas/home.php");

