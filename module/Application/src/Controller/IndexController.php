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
            } else {
                $fileErrors = $form->get('arquivo')->getMessages();
            }
        }

       return new ViewModel([
           'fileErrors' => $fileErrors,
       ]);
    }

    public function produtoAction()
    {
        return new ViewModel();
    }
    
    public function contatoAction()
    {
        return new ViewModel();
    }
}
