<?php include_once "View/layout/header.php" ?>
<?php foreach ($data as $value) {?>
<h3><?php echo $value['title']?></h3>
<img src="<?php echo $value['thumbnail']?>" alt="">
<div class="">
    <p><?php echo $value['price'] ?></p>
    <p><?php echo $value['discount'] ?></p>
</div>
<p><?php echo $value['description'] ?></p>
<?php } ?>