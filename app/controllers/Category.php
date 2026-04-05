<?php
require_once 'app/controllers/Core/Base.php';
require_once 'app/models/Category.php';

class Controller_Category extends Controller_Core_Base
{


    public function listAction() {
        $model= new Category_Model();
        $data = $model->fetchAll();

        $this->renderTemplate('category/list.phtml',[
            'data'=>$data
        ]);

        
    }
    public function editAction() {
        $model= new Category_Model();
        $id = $this->getRequest()->get('id');

        if($id){
            $model->load($id);
        }

        // echo "<pre>";
        // print_r($model);
    
        $this->renderTemplate('category/edit.phtml',[
            'data'=>$model
        ]);
    }
    public function saveAction() {
        $model = new Category_Model();

        foreach ($_POST['category'] as $key => $value) {
            $model->$key = $value;
        }

        $model->save();

        $this->redirect('list', 'category');
    }
    public function deleteAction() {
        $id = $this->getRequest()->get('id');

        if ($id) {
            $model = new Category_Model();
            $model->delete($id);
        }

        $this->redirect('list', 'category');
    }
}
