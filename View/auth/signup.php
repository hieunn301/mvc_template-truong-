<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/css/main.css">
</head>

<body class="home index">
    <div class="wrap">
        <section>
            <h3 style="text-align: center; font-family: Arial; font-size: 18px; color: #6c6565;">Sign Up</h3>
            <div class="content">
                <form class="content-form" action="<?php echo $host[0].'?controller=authen&action=register-post'?>"
                    method="post">
                    <p>
                        Họ và tên:</br>
                        <input class="input-text" type="text" placeholder="Họ và tên" name="fullname" value="<?php echo !empty($_POST['fullname']) ? $_POST['fullname'] : false;
                       ?>">
                        </br>
                        <?php
                echo !empty($error['fullname']['required'])?'<span style="color: red">'.$error['fullname']['required'].'</span>':false;
                echo !empty($error['fullname']['is_Fullname'])?'<span style="color: red">'.$error['fullname']['is_Fullname'].'</span>':false;
                ?>
                    </p>
                    <p>
                        Email:</br>
                        <input type="text" class="input-text" placeholder="Email" name="email" value="<?php echo !empty($_POST['email']) ? $_POST['email'] : false;
                           ?>">
                        </br>
                        <?php
                    echo !empty($error['email']['required'])?'<span style="color: red">'.$error['email']['required'].'</span>':false;
                    echo !empty($error['email']['is_Username'])?'<span style="color: red">'.$error['email']['is_Username'].'</span>':false;
                    ?>
                    </p>
                    <p>
                        Số điẹn thoại:</br>
                        <input class="input-text" type="text" placeholder="Số điện thoại" name="phone_number" value="<?php echo !empty($_POST['phone_number']) ? $_POST['phone_number'] : false;
                           ?>">
                        </br>
                        <?php
                    echo !empty($error['phone']['required'])?'<span style="color: red">'.$error['phone']['required'].'</span>':false;
                    echo !empty($error['username']['is_Phone'])?'<span style="color: red">'.$error['username']['is_Phone'].'</span>':false;
                    ?>
                    </p>
                    <p>
                        Mật khẩu:</br>
                        <input type="password" placeholder="Password" name="password" value="<?php echo !empty($_POST['password']) ? $_POST['password'] : false;
                           ?>">
                        </br>
                        <?php
                    echo !empty($error['password']['required'])?'<span style="color: red">'.$error['password']['required'].'</span>':false;
                    echo !empty($error['password']['is_Password'])?'<span style="color: red">'.$error['password']['is_Password'].'</span>':false;
                    ?>
                    </p>
                    <button type="submit" class="btn-submit" name="submit">Register</button>
                </form>
            </div>
        </section>
    </div>
</body>

</html>