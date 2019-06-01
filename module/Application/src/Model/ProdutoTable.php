<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */


namespace Application\Model;

class ProdutoTable
{

    public static function insert($options){
        $insert = new \Zend\Db\Sql\Insert();
        $insert->values($options);
    }
       
}
