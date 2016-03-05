<?php
namespace SolodyAuth\Model;

use Solody\Dbinstall\Dbinstall;

class Install extends Dbinstall
{
    protected function create_tables()
    {
        // [account] table
        $this->create_table('account', array(
            'column' =>array(
                
            ),
            'constraint'=>array(
                
            ),
        ));
    }
    
    protected function insert_rows()
    {
        ;
    }
}