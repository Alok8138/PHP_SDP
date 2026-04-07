<?php
require_once "app/Models/Core/Table.php";
class Models_Product extends Models_Core_Table{
    public $tableName = 'product';
    public $primaryKey = 'product_id';
}

?>