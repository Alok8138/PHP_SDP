<?php
require_once "app/Models/Customer.php";
class Controllers_Customer extends Controllers_Core_Base{
    public function listAction(){
        // $customerModel = new Models_Customer();
        $customerModel = Mage::getModel('customer');
        $data = $customerModel->getAll();

        $this->renderTemplate('customer/list.phtml', ['data'=> $data]);
    }
    //
    public function editAction(){
        // $customerModel = new Models_Customer();
        $customerModel = Mage::getModel('customer');
        $id = $this->getRequest()->get('id');
        if($id){
            if(!$customerModel->load($id)){
                throw new Exception("Invalid Customer ID");
            }
        }
        $this->renderTemplate('customer/edit.phtml', ['data'=> $customerModel]);
    }
    public function saveAction(){
        $data = $this->getRequest()->post('customer');
        // $customerModel = new Models_Customer();
        $customerModel = Mage::getModel('customer');
        
        if(isset($data['customer_id']) && $data['customer_id']){
            $customerModel->load($data['customer_id']);
        }

        foreach($data as $key => $value){
            $customerModel->$key = $value;
        }
        
        $customerModel->save();
        $this->redirect('list', 'customer');
    }
    public function deleteAction(){
        $id = $this->getRequest()->get('id');
        // $customerModel = new Models_Customer();
        $customerModel = Mage::getModel('customer');
        if($id){
            $customerModel->load($id);
            $customerModel->delete();
        }
        $this->redirect('list', 'customer');
    }
    
}
?>