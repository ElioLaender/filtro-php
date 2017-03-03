<?php

include_once "project/auto_load/Auto_load.php";
use project\logica_filtro\Filtro_consulta as Consulta;

$objData = new Consulta;

#Lista de tabelas que farão parte da consulta.
$tableas_consulta = array(
                        "venda_carros",
                    );

#Lista de atributos que farão parte da consulta (Todos os atributos aqui listados, serão retornados pelo select)
$tableas_atributos_retorno = array(

                            "carros_marca",
                            "carros_cor",
                            "carros_ar",
                            "carros_vidro",
                            "carros_teto_solar",
                            "carros_trava",
                            "carros_alarme",
                            "carros_qtd_cilindradas",
                            "carros_qtd_portas",
                            "carros_ano",
                            "carros_valor",
                            "carros_modelo",
                            "carros_direcao"
                            );

#ATENÇÃO, TODOS OS VALORES DE INPUT SERÃO ATRIBUIDOS DINAMICAMENTE E ADICIONADOS NA CLAUSULA WHERE
$objData->monta_filtro_select($tableas_consulta, $tableas_atributos_retorno,$limit = 10);