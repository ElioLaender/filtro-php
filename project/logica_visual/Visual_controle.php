<?php

namespace project\logica_visual;

class Visual_controle {

    #dados a serem impressos na view
    public $dados = array();

    #adiciona valores que serão transformados em variáveis
    public function set($nome, $valor){
        $this->dados[$nome] = $valor;
    }

    #permite que a variável possa ser afetada fora da classe, alterando seu valor por referência.
    public function bind($nome, $valor){

        #armazena valor da variável como referido.
        $this->dados[$nome] = &$valor;

    }

    #recupera valor adicionado pelo nome
    public function get($nome='')
    {

        if ($nome == '') {
            return $this->dados;

        } else {
            if (isset($this->dados[$nome]) && ($this->dados[$nome] != '')) {
                return $this->dados[$nome];
            } else {
                return '';
            }
        }
    }

    #Realiza a chamada de uma página chamando os valores criados para a mesma.
    public function render($arquivo){

         #Transforma cada item armazenado na lista de dados em variáveis locais.
        foreach($this->get() as $chave => $item){
            //$$ referencia ao valor do nome, não o valor em si.
            $$chave = $item;
        }

         # Procura o arquivo php se o arquivo existir, inclui o mesmo dentro da função, rederizando e executando o conteúdo dentro dele.
        if(file_exists($arquivo)){

            include_once $arquivo;
        }
    }
}
