<?php
Class User extends Database {
    protected $table = 'users';
    public function checkLogin($email, $password){
        // //0: tài khoản hoặc mk rỗng, 1: đăng nhập thành công, 2: tài khoản ko chính xác, 3: mk ko chính xác, 4: đăng nhập ko thành công
        if (empty($email) || empty($password)) {
            $statusLogin = 0;
        }
        else{
            $sql = "SELECT * FROM user WHERE email='$email'";
            $result =  $this->execute($sql);
            $checkResult = mysqli_num_rows($result);
            if ($checkResult < 1) {
                $statusLogin = 2;
            }else{
                if ($row = mysqli_fetch_assoc($result)) {
                    $pwd1 = $row['password'];
                    $_SESSION['user'] = $row ;
                    if($pwd1 != $password) {
                        $statusLogin = 3;
                    }else{
                        $statusLogin = 1;
                    }
                }else{
                    $statusLogin = 2;
                }
            }
        }
        return $statusLogin ;
        
    }
}