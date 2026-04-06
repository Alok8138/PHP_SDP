<?php

require_once 'app/controllers/Core/Base.php';
require_once 'app/models/CustomerGroup.php';


class Controller_CustomerGroup extends COntroller_Core_Base
{
    public function listAction() {
        $model = new CustomerGroup_Model();
        $data = $model->fetchAll();

        $this->renderTemplate('CustomerGroup/list.phtml',['data'=>$data]);

    }
    public function editAction() {
        $model = new CustomerGroup_Model();
        $id = $this->getRequest()->get('id');

        if($id){
            $model->load($id);
        }

        $this->renderTemplate('CustomerGroup/edit.phtml',['data'=>$model]);

    }
    public function saveAction() {
        $model = new CustomerGroup_Model();

        foreach($_POST['customergroup'] as $key=> $value){
            $model->$key = $value;
        }
        $model->save();

        $this->redirect('list', 'customergroup');
    }
    public function deleteAction() {
        $id = $this->getRequest()->get('id');
        if($id){
            $model = new CustomerGroup_Model();
            $model->load($id)->delete($id);
            // $model->delete($id);
        }

        $this->redirect('list', 'customergroup');
        
    }
    
}
