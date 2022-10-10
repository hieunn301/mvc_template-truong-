<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa Sản Phẩm</title>
</head>
<body>
<div class="content">
    <div class="themsanpham">
        <a class="list" href="index.php?controller=admin&action=list">Danh sách</a>
        <h3>Cập nhật sản phẩm</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Id danh mục</td>
                    <td><input type="text" name="category_id" value="<?php echo $dataId['category_id'] ?>" placeholder="Id danh mục"></td>
                </tr>
                <tr>
                    <td>Tên sản phầm:</td>
                    <td><input type="text" name="title" value="<?php echo $dataId['title'] ?>" placeholder="Tên sản phẩm"></td>
                </tr>
                <tr>
                    <td>Giá:</td>
                    <td><input type="text" name="price" value="<?php echo $dataId['price'] ?>" placeholder="Giá"></td>
                </tr>
                <tr>
                    <td>Giảm còn:</td>
                    <td><input type="text" name="discount" value="<?php echo $dataId['discount'] ?>" placeholder="Giảm còn"></td>
                </tr>
                <tr>
                    <td>Ảnh:</td>
                    <td><input type="text" name="thumbnail" value="<?php echo $dataId['thumbnail'] ?>" placeholder="Ảnh"></td>
                </tr>
                <tr>
                    <td>Mô tả:</td>
                    <td><input type="text" name="description" value="<?php echo $dataId['description'] ?>" placeholder="Mô tả"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="edit_product" value="Sửa sản phầm"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>
