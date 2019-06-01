<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Model;

class Produto
{
    public $codigo;
    public $descri;
    public $valor;
    public $quantidade; 
    
    /*public function getProduto($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }*/

    public function exchangeArray($data)
     {
         $this->codigo    = (!empty($data['codigo'])) ? $data['codigo'] : null;
         $this->descri = (!empty($data['descriscao'])) ? $data['descriscao'] : null;
         $this->valor  = (!empty($data['valor'])) ? $data['valor'] : null;
         $this->quantidade     = (!empty($data['quantidade'])) ? $data['quantidade'] : null;
     }

    public function insertProduto($options)
     {
         $data = array(
            'codigo' => $options['codigo'],
            'descriscao' => $options['descri'],
            'valor' => $options['valor'],
            'quantidade' => $options['quantidade'],
         );

         //$id = (int) $options->id;
         //if ($id == 0) {
            $options['produtoGateway']->insert($data);
         /*} else {
             if ($this->getProduto($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Produto nao existe!');
             }
         }*/
     }
    
}
    

