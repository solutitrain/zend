<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Model;

use \Zend\Db\ResultSet\ResultSet;
use \Zend\Db\TableGateway\TableGateway;

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

    public static function getAdapter() {
        $configLocal = require( __DIR__.'/../../../../config/autoload/local.php' );

        $adapter = new \Zend\Db\Adapter\Adapter( $configLocal['database'] );

        return $adapter;
    }

    public static function getTableGatewayProduto() {
        $dbAdapter = self::getAdapter();
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Produto());
        return new TableGateway('produto', $dbAdapter, null, $resultSetPrototype);
    }

    public static function getProdutoTable() {
        $tableGateway = self::getTableGatewayProduto();
        $table = new ProdutoTable($tableGateway);
        return $table;
    }

}
