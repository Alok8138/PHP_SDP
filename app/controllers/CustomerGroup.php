<?php
require_once "app/Models/Customergroup.php";
class Controllers_Customergroup extends Controllers_Core_Base{
    public function listAction(){
        $customergroupModel = new Models_Customergroup();
        $data = $customergroupModel->getAll();

        $this->renderTemplate('customergroup/list.phtml', ['data'=> $data]);
    }
    //
    public function editAction(){
        // $customergroupModel = new Models_Customergroup();
        $customergroupModel = Mage::getModel('customergroup');
        $id = $this->getRequest()->get('id');
        if($id){
            // $categoryModel->load($id);
            if(!$customergroupModel->load($id)){
                throw new Exception("Invalid Customer Group ID");
            }
        }
        $this->renderTemplate('customergroup/edit.phtml', ['data'=> $customergroupModel]);
    }
    public function saveAction(){
        $data = $this->getRequest()->post('customergroup');
        // $customergroupModel = new Models_Customergroup();
        $customergroupModel = Mage::getModel('customergroup');
        
        if(isset($data['customer_group_id']) && $data['customer_group_id']){
            $customergroupModel->load($data['customer_group_id']);
        }

        foreach($data as $key => $value){
            $customergroupModel->$key = $value;
        }
        
        $customergroupModel->save();
        $this->redirect('list', 'customergroup');
    }
    public function deleteAction(){
        $id = $this->getRequest()->get('id');
        // $customergroupModel = new Models_Customergroup();
        $customergroupModel = Mage::getModel('customergroup');
        if($id){
            $customergroupModel->load($id);
            $customergroupModel->delete();
        }
        $this->redirect('list', 'customergroup');
    }
    
}
?>