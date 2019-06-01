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
<<<<<<< HEAD
    public function galeriaAction()
=======
    public function produtoAction(){
        return new ViewModel();
    }
    public function contatoAction()
>>>>>>> b05b9ce9a4f412e941d1533febf11c3c4af22036
    {
        return new ViewModel();
    }
}
