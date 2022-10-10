<nav class="nav nav-custom">
    <h1 style="font-family: Arial;font-size: 23px; line-height: 60px; margin-left: 30px; color: lightblue">LOGIN</h1>
    <h2><?php if(isset($statusLogin)){
        $mess = '';
        if ($statusLogin == 0) {
            $mess = 'tài khoản hoặc mk rỗng';
        }elseif($statusLogin == 2) {
            $mess = 'tài khoản ko chính xác';
        }elseif($statusLogin == 3) {
            $mess = 'mk ko chính xác';
        }elseif($statusLogin == 4) {
            $mess = 'đăng nhập ko thành công';
        }
        echo $mess;
        }?></h2>
    <form class="form-signin" action="<?php echo $host[0].'?controller=authen&action=login-prossec'?>" method="post">
        <input class="input-text" type="text" placeholder="Username/Email" name="email">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" name="submit">Login</button>
    </form>
    <a class="btn-red sign-up" href="<?php echo $host[0].'?controller=authen&action=login'?>">Register</a>
</nav>