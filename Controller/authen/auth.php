<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if ($action == 'login') {
    require_once 'View/auth/login.php';

}elseif($action == 'register') {
    require_once 'View/auth/signup.php';
}elseif($action == 'register-post') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $error =[];
        $fullname = filter_input(INPUT_POST,'fullname',FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST,'phone_number',FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
        $checkRegister = true;

        if (empty(trim($fullname))) {
            $error['fullname']['required'] = 'Họ và tên bắt buộc phải nhập';
            $checkRegister = false;
        }else {
            if (!preg_match('/^[^\s][^0-9-_!@#\$%\^&\*\(\)\+]{4,}[^\s]$/u',$fullname)) {
                $error['fullname']['is_Fullname'] = 'Ho va ten khong hop le';
                $checkRegister = false;
            }
        }

        if (empty(trim($email))) {
            $error['email']['required'] = 'bắt buộc phải nhập';
            $checkRegister = false;
        }else {
            if (!preg_match('/^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/',$email)) {
                $error['email']['is_Username'] = 'Email khong hop le';
                $checkRegister = false;
            }
        }

        if (empty(trim($phone))) {
            $error['phone']['required'] = 'Số điẹn thoại bắt buộc phải nhập';
            $checkRegister = false;
        }else {
            if (!preg_match('/^(0|84)\d{9}/',$phone)) {
                $error['username']['is_Phone'] = 'So dien thoai khong hop le';
                $checkRegister = false;
            }
        }
        
        if (empty(trim($password))) {
            $error['password']['required'] = 'bắt buộc phải nhập';
            $checkRegister = false;
        }else {

            if (strlen($password) < 4) {
                $error['password']['is_Password'] = 'Password phải trên 4 kí tự';
                $checkRegister = false;
            }
        }
        
        if ($checkRegister == false) {
            require_once 'View/auth/signup.php';
        }else {
            header('Location: '.$host[0].'?controller=authen&action=login');
        }
    }
}elseif($action == 'login-prossec') {
    if (isset($_POST['submit'])) {
        $statusLogin = 1;
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pwd = mysqli_real_escape_string($conn, $_POST['password']);
        $user = new User();
        $statusLogin = $user->checkLogin($email,$pwd);
        if($statusLogin == 1) {
            header('Location: '.$host[0].'?controller=home&action=home');
            exit();
        }

        // var_dump($statusLogin);
        // die();
        
        // if (empty($email) || empty($pwd)) {
        //     $statusLogin = 0;
        // }else {
        //     $sql = "SELECT * FROM user WHERE email='$email'";
        //     $result = mysqli_query($conn,$sql);
        //     $checkResult = mysqli_num_rows($result);

        //     if ($checkResult < 1) {
        //         $statusLogin = 2;
        //     }else {
        //         if ($row = mysqli_fetch_assoc($result)) {
        //             $pwd1 = $row['password'];
        //             if($pwd1 != $pwd) {
        //                 $statusLogin = 3;

        //             }else{
        //                 $_SESSION['u_id'] = $row['id'];
        //                 $_SESSION['u_fullname'] = $row['fullname'];
        //                 $_SESSION['u_email'] = $row['email'];
        //                 $_SESSION['u_phone'] = $row['phone_number'];
        //                 $statusLogin = 1;
        //                 header('Location: '.$host[0].'?controller=thanh-vien&action=home');
        //                 exit();
        //             }
        //         }
        //     }
        // }


    } else {
        $statusLogin = 4;
    }
require_once 'View/auth/login.php';
}elseif ($action == 'logout') {
    unset($_SESSION['user']);
    header('Location:' .$host[0].'?controller=authen&action=login');
}