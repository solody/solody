<?php
namespace Application\Model;

use Solody\Dbinstall\Dbinstall;

abstract class SolodyDbinstall extends Dbinstall
{
    function __construct()
    {
        parent::__construct();
    }
}