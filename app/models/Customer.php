<?php
require_once "app/Models/Core/Table.php";
class Models_Customer extends Models_Core_Table{
    public $tableName = 'customer';
    public $primaryKey = 'customer_id';
    
}
?>