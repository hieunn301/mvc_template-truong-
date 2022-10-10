<?php
function isAdmin(){
    if(isset($_SESSION['user']) && isset($_SESSION['user']['role_id']) && $_SESSION['user']['role_id']==1 ){
        return true;
    }
    else{
        return false;
    }
}