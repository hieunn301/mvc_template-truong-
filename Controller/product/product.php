<?php

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
//$fullUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//$host = explode('?', $fullUrl);

$adminAccess = ['add', 'edit', 'delete'];

if (in_array($action, $adminAccess)) {
//    if (isAdmin() == false) {
    if (!isAdmin()) {
        header('Location: ' . $host[0] . '?controller=home&action=home');
    }
}

if ($action == 'add') {
    $product = new Product();
    var_dump($product->getAllData());
    require_once 'View/product/add_product.php';

} elseif ($action == 'add-product') {
    $product = new Product();

    if (isset($_POST['add-product'])) {
        $category_id = $_POST['category_id'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $thumbnail = $_POST['thumbnail'];
        $description = $_POST['description'];
//            $created_at = $_POST['created_at'];
//            $updated_at = $_POST['updated_at'];

        $dataInsert = [
            'description' => $description,
            'category_id' => $category_id,
            'title' => $title,
            'price' => $price,
            'discount' => $discount,
            'thumbnail' => $thumbnail,
        ];

        if ($product->inserData($dataInsert)) {
            $thanhcong = 'add_success';
        }
    }
    require_once 'View/product/add_product.php';
} elseif ($action == 'list') {

    $product = new Product();
    $data = $product->getAllData();
    require_once 'View/product/list.php';
} elseif ($action == 'delete') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $product = new Product();
        if ($dataId = $product->delete($id)) {
            header('Location: index.php?controller=admin&action=list');
        }
    }
} elseif ($action == 'edit') {
    if (isset($_GET['id'])) {
        $product = new Product();
        $id = $_GET['id'];
        $dataId = $product->getDataId($id, 'id');
        if (isset($_POST['edit_product'])) {
            $title = $_POST['title'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $thumbnail = $_POST['thumbnail'];
            $description = $_POST['description'];
            $dataUpdate = [
                'title' => $title,
                'price' => $price,
                'discount' => $discount,
                'thumbnail' => $thumbnail,
                'description' => $description,
            ];
            $conditionUpdate = [
                'id' => [' = ', $id],
            ];
            if ($product->updateData($conditionUpdate, $dataUpdate)) {
                header('Location: index.php?controller=admin&action=list');
            }
        }
    }
    require_once 'View/product/edit_product.php';
} elseif ($action == 'detail') {
    $product = new Product();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $dataSearch[ 'id'] =  ['=',$id] ;
    }
    $data = $product->searchData($dataSearch,[]);
    require_once 'View/product/detail.php';
}