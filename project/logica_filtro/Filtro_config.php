<?php

namespace project\logica_filtro;

class Filtro_config {

 public function regra_filtro(){

#retorna array contendo dados das tableas a serem trabalhadas.
	return [

	#recebe tabelas do banco de dados.
	'tabelas' => array(

		#recebe a especificação da tabela.
		'venda_carros' => array(

			 #recebe lista de atributos.
			 'atributos' => array(

				     "carros_marca" => array(

					"tipo" => "varchar",
					"tamanho" => 10,
                                        "html_att_name" => "marca"

                                     ),

				     "carros_modelo" => array(

					"tipo" => "varchar",
					"tamanho" => 15,
                                        "html_att_name" => "modelo"

                                     ),

				    "carros_ano" => array(

					"tipo" => "int",
					"tamanho" => 11,
                                        "html_att_name" => ""

                                     ),

                                     "carros_valor" => array(

                                         "tipo" => "decimal",
                                         "tamanho" => 7.2,
                                         "html_att_name" => ""

                                     ),

                                     "carros_cor" => array(

                                         "tipo" => "varchar",
                                         "tamanho" => 15,
                                         "html_att_name" => "cor"

                                     ),

                                     "carros_final_placa" => array(

                                         "tipo" => "int",
                                         "tamanho" => 11,
                                         "html_att_name" => ""

                                     ),

                                     "carros_qtd_portas" => array(

                                         "tipo" => "int",
                                         "tamanho" => 11,
                                         "html_att_name" => ""

                                     ),

                                     "carros_qtd_valvulas" => array(

                                         "tipo" => "int",
                                         "tamanho" => 11,
                                         "html_att_name" => ""

                                     ),

                                     "carros_qtd_cilindradas" => array(

                                         "tipo" => "int",
                                         "tamanho" => 11,
                                         "html_att_name" => ""

                                     ),

                                     "carros_direcao" => array(

                                         "tipo" => "boolean",
                                         "tamanho" => 1,
                                         "html_att_name" => "dir_hid"

                                     ),

                                     "carros_ar" => array(

                                         "tipo" => "boolean",
                                         "tamanho" => 1,
                                         "html_att_name" => "ar_cond"

                                     ),

                                     "carros_vidro" => array(

                                        "tipo" => "boolean",
                                        "tamanho" => 1,
                                        "html_att_name" => "vid_ele"

                                     ),

                                     "carros_teto_solar" => array(

                                         "tipo" => "boolean",
                                         "tamanho" => 1,
                                         "html_att_name" => "teto_sol"

                                     ),

                                     "carros_trava" => array(

                                         "tipo" => "boolean",
                                         "tamanho" => 1,
                                         "html_att_name" => "trav_ele"

                                     ),

                                     "carros_alarme" => array(

                                         "tipo" => "boolean",
                                         "tamanho" => 1,
                                         "html_att_name" => "alarme"

                                     ),

                                     "carros_doc_pg" => array(

                                         "tipo" => "boolean",
                                         "tamanho" => 1,
                                         "html_att_name" => ""

                                     )


                             )

						)

					//outras...

					)

			];

	}

}

