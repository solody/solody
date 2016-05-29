<?php
namespace Application\Model;

use Solody\Dbinstall\Dbinstall;
use Zend\Db\Sql\Ddl\CreateTable;
use Zend\Db\Sql\Ddl\Column;
use Zend\Db\Sql\Ddl\Constraint;
use Zend\Db\Sql\Insert;
use Zend\Config\Config;
use Zend\Config\Writer\PhpArray as ConfigWriter;
use Zend\Db\Adapter\Adapter;

class SolodyDbinstall
{
    public function install($config) {
        $dbinstall = new Dbinstall($config);
        
        $table_account = new CreateTable('account');
        $table_account->addColumn(new Column\Integer('id', FALSE, NULL, array('autoincrement'=>true)))
                       ->addConstraint(new Constraint\PrimaryKey('id'))
                       ->addColumn(new Column\Varchar('username', 50, false))
                       ->addColumn(new Column\Varchar('password', 50, false))
                       ->addColumn(new Column\Varchar('email', 50, false))
                       ->addConstraint(new Constraint\UniqueKey('email'))
                       ->addColumn(new Column\Varchar('openid_qq', 100, true))
                       ->addConstraint(new Constraint\UniqueKey('openid_qq'))
                       ->addColumn(new Column\Varchar('openid_sina', 100, true))
                       ->addConstraint(new Constraint\UniqueKey('openid_sina'))
                       ->addColumn(new Column\Varchar('openid_wechat', 100, true))
                       ->addConstraint(new Constraint\UniqueKey('openid_wechat'))
                       ->addColumn(new Column\Integer('status',false,0));
        $dbinstall->addCreateTable($table_account);
        
        $insert_account = new Insert('account');
        $insert_account->values(array(
            'username'=>'admin',
            'password'=>'admin',
            'email'=>'164713332@qq.com',
            'status'=>1,
        ));
        $dbinstall->addInsert($insert_account);
        
        $dbinstall->install();
    }
    
    public function reinstall($config) {
        $adapter = new Adapter($config);
        $adapter->createStatement('DROP DATABASE IF EXISTS `'.$config['database'].'`')
                ->execute();
        
        $config_file = 'config/autoload/local.php';
        $old_config = array();
        if (file_exists($config_file)) {
            $old_config = include $config_file;
            unset($old_config['db']);
            unlink($config_file);
            $writer = new ConfigWriter();
            $writer->toFile($config_file, new Config($old_config));
        }
        
        $this->install($config);
    }
}