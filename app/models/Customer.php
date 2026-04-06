<?php
require_once 'app/models/Core/Table.php';

class Customer_Model extends Model_Core_Table
{
    protected $_tablename = 'customer';
    protected $_primarykey = 'customer_id';
}