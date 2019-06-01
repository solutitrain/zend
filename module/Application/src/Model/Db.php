<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Model;

class Db
{
 
    public static function connect(){

        $configLocal = require( __DIR__.'/../../../../config/autoload/local.php' );

        $adapter = new \Zend\Db\Adapter\Adapter( $configLocal['database'] );

        $result = $adapter->query('select 1 as qtd')->execute();
        $row = $result->current();
        var_dump( $row );exit;
        return $row->fetchAll();
        
    
    }
    public static function verificarUsuario($usuario, $senha){

        $configLocal = require( __DIR__.'/../../../../config/autoload/local.php' );

        $adapter = new \Zend\Db\Adapter\Adapter( $configLocal['database'] );

        //$result = $adapter->query('INSERT INTO `usuario` (usuario, senha) values ("brenno", "3200")' )->execute();
        
        $result = $adapter->query('SELECT * FROM `usuario` WHERE usuario LIKE "'.$usuario.'" AND senha LIKE "'.$senha.'" ')->execute();
        $row = $result->current();    
        if($row === null)
        {
            return false;
        }else{
            return true;
        }    
    }


}
