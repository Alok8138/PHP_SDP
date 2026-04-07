<?php
require_once "app/Models/Category.php";
//add try and catch 
class Controllers_Category extends Controllers_Core_Base{
    public function listAction(){
        // $categoryModel = new Models_Category();
        $categoryModel = Mage::getModel('category');
        $data = $categoryModel->getAll();

        $this->renderTemplate('category/list.phtml', ['data'=> $data]);
    }
    //
    public function editAction(){
        // $categoryModel = new Models_Category();
        $categoryModel = Mage::getModel('category');
        $id = $this->getRequest()->get('id');
        if($id){
            // $categoryModel->load($id);
            if(!$categoryModel->load($id)){
                throw new Exception("Invalid Category ID");
            }
        }
        $this->renderTemplate('category/edit.phtml', ['data'=> $categoryModel]);
    }
    public function saveAction(){
        $data = $this->getRequest()->post('category');
        // $categoryModel = new Models_Category();
        $categoryModel = Mage::getModel('category');
        
        if(isset($data['category_id']) && $data['category_id']){
            $categoryModel->load($data['category_id']);
        }

        foreach($data as $key => $value){
            $categoryModel->$key = $value;
        }
        
        $categoryModel->save();
        $this->redirect('list', 'category');
    }
    public function deleteAction(){
        $id = $this->getRequest()->get('id');
        // $categoryModel = new Models_Category();
        $categoryModel = Mage::getModel('category');
        if($id){
            $categoryModel->load($id);
            $categoryModel->delete();
        }
        $this->redirect('list', 'category');
    }
    
}
?>