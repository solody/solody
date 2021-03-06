<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/SolodyAuth for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace SolodyAuth\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function loginAction()
    {
        return array();
    }

    public function registerAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /index/index/foo
        return array();
    }
}
