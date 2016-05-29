<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\SolodyDbinstall;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function installAction() {
        $dbinstaller = new SolodyDbinstall();
        $config = array(
            'driver' => 'Pdo_mysql',
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => 'abc123',
            'database' => 'solody',
        );
        $reinstall = $this->request->getQuery()->get('flag');
        if ($reinstall == 're') $dbinstaller->reinstall($config);
        else $dbinstaller->install($config);
        
        die($reinstall.'Install done!');
    }
}
