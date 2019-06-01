<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function loginAction()
    {
        return new ViewModel();
    }

    public function galeriaAction()
    {
        $fileErrors = NULL;
        $tempFile = NULL;
        $form = new \Application\Model\Form_Galeria();

        $request = $this->getRequest();
        if ($request->isPost()) {
            // Make certain to merge the files info!
            $post = array_merge_recursive(
                $request->getPost()->toArray(),
                $request->getFiles()->toArray()
            );

            $form->setData($post);

            if ($form->isValid()) {
                $fileErrors = [];
                $tempFile = $form->get('arquivo')->getValue();
            } else {
                $fileErrors = $form->get('arquivo')->getMessages();
            }
        }

        return new ViewModel([
           'fileErrors' => $fileErrors,
           'tempFile' => $tempFile,
       ]);
    }

    public function produtoAction()
    {
        $produtoTable = \Application\Model\Db::getProdutoTable();
        $mensagem = '';

        if( !empty($_POST) ) {

            var_dump($_POST);
            $validator = new \Zend\Validator\Digits();
            if ( $validator->isValid( trim( $_POST['quantidade'] ) ) && $validator->isValid( trim( $_POST['codigo'] ) )) {
                $mensagem = 'Inserção no banco';
                
                \Application\Model\Produto::insertProduto([
                    'codigo' => $_POST["codigo"],
                    'descriscao' => $_POST["descri"],
                    'valor' => $_POST["valor"],
                    'quantidade' => $_POST["quantidade"],

                    'produtoGateway' => $produtoTable,
                ]);
            } else {
                $mensagem = 'não valido';
            }
        }

        var_dump( $produtoTable );

        return new ViewModel([
            'mensagem' => $mensagem,
        ]);
    }
    
    public function contatoAction()
    {
        return new ViewModel();
        
    }
    public function dbAction()
    {
        return new ViewModel();
    }
}
