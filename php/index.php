 <?php
  session_start();
  $page = 'index';
  //unset($_SESSION["status"]);

  ?>
 <?php
  include "header.php";
  include  "fucntion_query.php";
  ?>
 <!DOCTYPE html>
 <html lang="en">
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <head>
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
 </head>

 <body>

   <!-- Navigation -->
   <?php include "navbar.php"; ?>
   <!-- Page Content -->
   <nav class="bottom-navbar">
     <a href="#home" class="fas fa-home"></a>
     <a href="#featured" class="fas fa-list"></a>
     <a href="#arrivals" class="fas fa-tags"></a>
     <a href="#reviews" class="fas fa-comments"></a>
     <a href="#blogs" class="fas fa-blog"></a>
   </nav>


   

<div class="login-form-container">

    <div id="close-login-btn" class="fas fa-times"></div>

    <form action="admin-page.php">
        <h3>sign in</h3>

        <?php if(isset($_SESSION["check"])){ unset($_SESSION["check"]) ?>
         <div class="alert alert-danger" role="alert">
          
         </div>
        <?php }?> 
        <?php if(isset($_SESSION["regis"])){ unset($_SESSION["regis"]) ?>
         <div class="alert alert-success" role="alert">
           คุณสามารถเข้าสู่ระบบได้แล้วค่ะ !
         </div>
        <?php }?> 
        <span>username</span>
        
            <input type="hidden" value="<?=@$_GET['book_id']?>" name="book_id">
        <input type="text"  class="box"  id="validationServer01" placeholder="username" name="username"  required>
        <span>password</span>
        <input type="password"  class="box" placeholder="enter your password" id="validationServer02" name="password" required>
        <div class="checkbox">
            <input type="checkbox" name="password" id="remember-me">
            <label for="remember-me"> remember me</label>
        </div>
        <input type="submit" class="btn" name="submit">
        
    </form>

</div>


   <section class="home" id="home">

     <div class="row">

       <div class="content">
         <h3>Welcome</h3>
         <p>Welcome to the book borrowing site.</p>
         <a href="#" class="btn">shop now</a>
       </div>

       <div class="swiper books-slider">
         <div class="swiper-wrapper">
           <a href="#" class="swiper-slide"><img src="image/book-1.png" alt=""></a>
           <a href="#" class="swiper-slide"><img src="image/book-2.png" alt=""></a>
           <a href="#" class="swiper-slide"><img src="image/book-3.png" alt=""></a>
           <a href="#" class="swiper-slide"><img src="image/book-4.png" alt=""></a>
           <a href="#" class="swiper-slide"><img src="image/book-5.png" alt=""></a>
           <a href="#" class="swiper-slide"><img src="image/book-6.png" alt=""></a>
         </div>
         <img src="image/stand.png" class="stand" alt="">
       </div>

     </div>
   </section>





   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>
   <!-- Bootstrap core JavaScript -->
   <script src="vendor/jquery/jquery.min.js"></script>
   <script src="vendor/popper/popper.min.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

 </body>

 </html>