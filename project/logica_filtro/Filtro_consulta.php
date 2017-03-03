<?php

namespace project\logica_filtro;
use project\logica_filtro\Filtro_config as Filtro;
use project\logica_banco\Conexao_bd as Consulta;
use project\logica_visual\Visual_controle as Visual;

class Filtro_consulta {

	private $conexao,
            $sql,
            $html = "",
	    $array_dados, #array contendo dados passados na Filtro_config.
	    $tabela, #Nome da tabela.
	    $att_retorno, #Atributos a serem retornados.
            $array_entrada_form,
	    $limit; #quantidade máxima de registros retornados.

      private function logErro($erro){

          $objVisual = new Visual;
          $objVisual->set('lista', $erro);
          $objVisual->render("project/logica_visual/telas/erro.php");
          exit(0);
      }

      private function set_visual($html){

          $objVisual = new Visual;
          $objVisual->set('dados', $html);
          $objVisual->render("project/logica_visual/telas/home.php");

      }

      public function listaDados($select = ""){

          $this->conexao = new Consulta;
          $resultado = $this->conexao->runSelect($select);

          if(count($resultado) != 0){

              for($j = 0; $j < count($resultado); $j++){
                  $this->html .= "<tr>";
                  $this->html.= "<td>".($j+1)."</td>";
                  $this->html.= "<td>{$resultado[$j]['carros_modelo']}</td>";
                  $this->html.= "<td>{$resultado[$j]['carros_marca']}</td>";
                  $this->html.= "<td>{$resultado[$j]['carros_cor']}</td>";
                  $this->html.= "<td>{$resultado[$j]['carros_qtd_cilindradas']} Cc</td>";
                  $this->html.= "<td>{$resultado[$j]['carros_qtd_portas']}</td>";
                  $this->html.= "<td>{$resultado[$j]['carros_ano']}</td>";
                  if($resultado[$j]['carros_doc_pg'] == 1){
                      $this->html.= "<td>Pago</td>";
                  } else{
                      $this->html.= "<td>Atrasado</td>";
                  }

                  $this->html.= "<td>R$ {$resultado[$j]['carros_valor']}</td>";
                  $this->html .= "<tr>";
              }

          } else {
              $this->html = "<p style='color:indianred'>*Oops, sua consulta não retornou nenhum resultado, tente ser menos específico.</p>";
          }

          return $this->html;
      }

      private function validacao_filtro_config($tabela, $att_retorno, $array_config){

        $this->html = "";
        $erro = false;
        $this->array_dados = $array_config;

        for($i = 0; $i < count($tabela); $i++){

            #Comparando se a tabela é equivalente a alguma informada no arquivo de configuração. Caso a tabela existir, será conferido os atributos.
            if(array_key_exists($tabela[$i], $this->array_dados['tabelas'])){

                #Recebe os atributos listados na tabela passada como argumento, seguindo a ordem de profundidade do array do Filtro_config.
                $atributos = $this->array_dados['tabelas'][$tabela[$i]]['atributos'];

                if($att_retorno != "*") {

                    for ($cont = 0; $cont < count($att_retorno); $cont++) {

                        if (!array_key_exists($att_retorno[$cont], $atributos)) {

                            $this->html .= "<li class='alert-danger'>" .
                                "O atributo <b>{$att_retorno[$cont]}</b> não existe na tabela <b>{$tabela[$i]}</b> verifique o aquivo <b>project/logica_filtro/Filtro_config.php</b>" .
                                "</li>";

                            $erro = true;
                        }
                    }

                    if($erro == true){
                        $this->logErro($this->html);
                    }
                }

            } else {

                $this->logErro("<li>Valor passado não corresponde a nenhuma tabela!<li>");
            }
        }
      }

      public function monta_filtro_select($tabela, $att_retorno = "*", $limit){

          $this->conexao = new Consulta;
          $this->tabela = $tabela;
          $this->att_retorno = $att_retorno;
          $this->limit = $limit;
          $this->array_dados = Filtro::regra_filtro();
          $this->array_entrada_form;

          $this->validacao_filtro_config($this->tabela, $this->att_retorno,$this->array_dados);

              #atribui no vetor o valor dos inputs do tipo 'post' de acordo com o att 'name' setado no html de cada elemento, buscando essas informações no Filtro_config
              for($i = 0; $i < count($this->att_retorno); $i++){

                  $this->array_entrada_form[$this->att_retorno[$i]] = filter_input(INPUT_POST,$this->array_dados['tabelas'][$this->tabela[0]]['atributos'][$this->att_retorno[$i]]["html_att_name"]);
              }

          $this->sql = "SELECT ".implode(',',$this->att_retorno)." FROM {$tabela[0]} {$this->monta_where($this->sql,$this->att_retorno,$this->array_entrada_form,$this->limit)}";

          $this->set_visual($this->listaDados($this->sql));
      }

          private function monta_where($sql,$array_att,$att_val,$limit){

          $sql .= " WHERE ";
          $qtd_total = count($array_att);

            for($i = 0; $i < $qtd_total ; $i++){

               #verifica se possui valor adicionado, se não possuir, não adiciona no where.
                if(!empty($att_val[$array_att[$i]])){

                    #verifica se o elemento anterior estava vazio, para poder inserir o AND antes do próximo valor ser inserido no where
                    if($i > 1 && empty($att_val[$array_att[$i-1]])){
                        $sql .= " AND ";
                    }

                    #verificar se a chave de att_val é iqual array_att, dai saberemos se a mesma estará na clausula where
                    $sql .= "{$array_att[$i]} = '{$att_val[$array_att[$i]]}' ";

                    #verifica se existe mais iterações, caso existir, confere se a próxima posição possui valor setado no post.
                    if(($i+1) < $qtd_total && !empty($att_val[$array_att[$i+1]])){

                        $sql .= " AND ";

                    }
                }
            }
          if(!empty($limit)){

              $sql .= "LIMIT " . $limit;
          }

            return $sql;
      }
}
