<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}
$dataOrderBy = [];
$dataSearch =[];

if (isset($_GET['sort-by'])) {
    $sortBy = $_GET['sort-by'];
    if ($sortBy == 1) {
        $dataOrderBy ['discount']=  'ASC';
    }
    if ($sortBy == 2) {
        $dataOrderBy ['discount']=  'DESC';

    }
}
if (isset($_GET['earliest'])) {
//    $dataOrderBy = [
//        'created_at' => 'DESC',
//    ];
    $dataOrderBy['created_at'] = 'DESC';
}
if (isset($_GET['tukhoa'])) {
    $key = $_GET['tukhoa'];
    $dataSearch['title'] =  [' LIKE ', '%' . $key . '%'];
}
switch ($action) {

    case 'home':
    {
        $product = new Product();
        $data = $product->searchData($dataSearch, $dataOrderBy);
        require_once 'View/home/index.php';
        break;
    }
    case 'category':
    {
        $product = new Product();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $dataSearch[ 'category_id'] =  $id ;
        }
        $data = $product->searchData($dataSearch, $dataOrderBy);
        require_once 'View/home/index.php';
        break;
    }
    default:
    {
        $product = new Product();
        $data = $product->getAllData();
        require_once 'View/home/index.php';
    }
}