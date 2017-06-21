<?php
namespace App;
class ProductES extends EsModel
{
    protected static $_index = 'product';
    protected static $_type = 'product';

    public $name;
    public $price = 0;
}