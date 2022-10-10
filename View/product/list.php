<!--<div class="timkiem">-->
<!--    <form action="" method="get">-->
<!--        <table>-->
<!--            <tr>-->
<!--                <input type="hidden" name="controller" value="thanh-vien">-->
<!--                <td><input type="text" name="tukhoa" placeholder="Nhập từ khoá"></td>-->
<!--                <td><input type="submit" value="Tìm kiếm"></td>-->
<!--            </tr>-->
<!--        </table>-->
<!--        <input type="hidden" name="action" value="tim-kiem">-->
<!--    </form>-->
<!--</div>-->
<div class="danhsach">
    <h3>Danh sách sản phầm</h3>
    <table border="1px">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên sản phầm</th>
            <th>Giá</th>
            <th>Giảm còn</th>
            <th>Ảnh</th>
            <th>Mô tả</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $stt = 1;
        foreach ($data as $value) {

            ?>
            <tr>
                <td><?php echo $stt ?></td>
                <td><?php echo $value['title'] ?></td>
                <td><?php echo $value['price'] ?></td>
                <td><?php echo  $value['discount'] ?></td>
                <td><?php echo  $value['thumbnail'] ?></td>
                <td><?php echo  $value['description'] ?></td>
                <td>
                    <a href="index.php?controller=admin&action=edit&id=<?php echo $value['id']?>">Edit</a>
                    <a onclick="return confirm('Bạn chắc chắn muốn xoá không')" href="<?php echo $host[0].'?controller=admin&action=delete&id='.$value['id']?>" title="Xoá">Delete</a>
                </td>
            </tr>
            <?php
            $stt++;
        }
        ?>
        </tbody>
    </table>
</div>