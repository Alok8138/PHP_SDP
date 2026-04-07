<?php
require_once "app/Models/Core/Table.php";
class Models_Category extends Models_Core_Table{
    public $tableName = 'category';
    public $primaryKey = 'category_id';
}
?>