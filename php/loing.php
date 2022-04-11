<?php
  session_start(); 
  include  "fucntion_query.php";
  $page = 'admin';
  $data = $_REQUEST;

  if(isset($data['submit'])){
     $login = checkLogin($data['username'],$data['password']);

     if(!is_null($login)){
      $user = getUser($login->user_id);
      if($user->status == 0){
        //user
        $_SESSION["book_id"] = $data['book_id'];
        $_SESSION["status"] = $user->status;
        $_SESSION["id"] = $user->user_id; 
        header("Location: manage-lend.php");
      }else{
        //admin
        $_SESSION["status"] = $user->status;
        $_SESSION["id"] = $user->user_id; 
        header("Location: manage-lend-admin.php");
      }
     }else{
      $_SESSION["check"] = 0; 
     }
  }
?>