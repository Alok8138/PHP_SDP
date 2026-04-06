<?php
require_once 'app/controllers/Core/Base.php';
require_once 'app/models/Customer.php';
class Controller_Customer extends Controller_Core_Base
{
    public function listAction()
    {
        $model = new Customer_Model();
        $data = $model->fetchAll();
        $this->renderTemplate('customer/list.phtml', ['data' => $data]);
    }

    public function editAction()
    {
        $model = new Customer_Model();
        $id = $this->getRequest()->get('id');
        if ($id) {
            $model->load($id);
        }
        $this->renderTemplate('customer/edit.phtml', ['data' => $model]);
    }

    public function saveAction()
    {
        $model = new Customer_Model();
        foreach ($_POST['customer'] as $key => $value) {
            $model->$key = $value;
        }
        $model->save();
        $this->redirect('list', 'customer');
    }

    public function deleteAction()
    {
        $id = $this->getRequest()->get('id');
        if ($id) {
            $model = new Customer_Model();
            $model->delete($id);
        }
        $this->redirect('list', 'customer');
    }
}