<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm Sản Phẩm</title>
</head>
<body>
<div class="content">
    <div class="themsanpham">
        <a class="list" href="<?php echo $host[0].'?controller=admin&action=list'?>">Danh sách</a>
        <h3>Thêm sản phẩm</h3>
        <form action="<?php echo $host[0].'?controller=admin&action=add-product'?>" method="POST">
            <table>
                <tr>
                    <td>Id danh mục</td>
                    <td><input type="text" name="category_id" placeholder="Id danh mục"></td>
                </tr>
                <label for="id_category">Id danh mục</label>
                <select name="id_category">
                    <?php foreach ($product->getAllData() as $value) {?>
                    <option value="<?php echo $value['category_id']?>"><?php echo $value['category_id']?></option>
                    <?php }?>
                </select>
                <tr>
                    <td>Tên sản phầm:</td>
                    <td><input type="text" name="title" placeholder="Tên sản phẩm"></td>
                </tr>
                <tr>
                    <td>Giá:</td>
                    <td><input type="text" name="price" placeholder="Giá"></td>
                </tr>
                <tr>
                    <td>Giảm còn:</td>
                    <td><input type="text" name="discount" placeholder="Giảm còn"></td>
                </tr>
                <tr>
                    <td>Ảnh:</td>
                    <td><input type="text" name="thumbnail" placeholder="Ảnh"></td>
                </tr>
                <tr>
                    <td>Mô tả:</td>
                    <td><input type="text" name="description" placeholder="Mô tả"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="add-product" value="Thêm mới"></td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($thanhcong)) {
            if ($thanhcong == 'add_success') {

                echo '<p style="color: green;text-align: center;font-size: 15px">them moi thanh cong</p>';
            }else{
                echo 'ko thanh cong';
            }
        }

        ?>
    </div>
</div>
</body>
</html>
