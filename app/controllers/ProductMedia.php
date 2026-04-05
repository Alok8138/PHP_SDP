<?php

require_once 'app/controllers/Core/Base.php';
require_once 'app/models/ProductMedia.php';
class Controller_ProductMedia extends Controller_Core_Base{

    public function listAction(){
        $model = new Model_ProductMedia();
        $data = $model->fetchAll();
        $this->renderTemplate('productMedia/list.phtml', ['data' => $data]);
    }

    public function editAction(){
        $model = new Model_ProductMedia();
        $id = $this->getRequest()->get('id');
        if($id){
            $model->load($id);
        }
        $this->renderTemplate('productMedia/edit.phtml', ['data' => $model]);
         
    }

    public function saveAction(){
        $model = new Model_ProductMedia();
        foreach($_POST['productmedia'] as $key => $value){
            $model->$key = $value;
        }
        $model->save();
        $this->redirect('list', 'productmedia');
    }

    public function deleteAction(){
        $id = $this->getRequest()->getGet('id');
        if($id){
            $model = new Model_ProductMedia();
            $model->delete($id);
        }
        $this->redirect('list', 'productmedia');
    }
}