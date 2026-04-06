<?php
require_once 'app/controllers/Core/Base.php';
require_once 'app/models/Product.php';


class Controller_Product extends Controller_Core_Base
{
    //prd controller
    public function listAction()
    {
        $model = new Model_Product();
        $data = $model->fetchAll();


        $block = Mage::getBlock('product/list');

        $layout = $this->getLayout();
        $layout->addChild('product/list', $block);
        // $block->setData($data);


        $layout->toHtml();
    }


    public function editAction()
    {
        $model = new Model_Product();
        $id = $this->getRequest()->get('id');

        if ($id) {
            $model->load($id);
        }

        // echo "<pre>";
        // print_r($model);
        $block = Mage::getBlock('product/edit');
        $this->renderTemplate($block->getTemplate(), [
            'data' => $model
        ]);
    }

    public function saveAction()
    {
        $model = new Model_Product();

        foreach ($_POST['product'] as $key => $value) {
            $model->$key = $value;
        }

        $model->save();

        $this->redirect('list', 'product');
    }

    public function deleteAction()
    {
        $id = $this->getRequest()->get('id');

        if ($id) {
            $model = new Model_Product();
            $model->load($id)->delete($id);
            // $model->delete($id);
        }

        $this->redirect('list', 'product');
    }
}
