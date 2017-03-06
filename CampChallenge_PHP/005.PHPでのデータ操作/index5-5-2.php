<?php
session_start();

// NOTE:
 // 情報がないならじゃなくて情報が入っているならで考える
// if(!isset( )) {} じゃなくて、if(isset( )){} で考えるのも手。
// NOTE:
if(isset($_POST['f_name'])){
$_SESSION['f_name'] = $_POST['f_name'];
}
if(isset($_POST['l_name'])){
$_SESSION['l_name'] = $_POST['l_name'];
}
if(isset($_POST['sex'])){
$_SESSION['sex'] = $_POST['sex'];
}
if(isset($_POST['hobby'])){
$_SESSION['hobby'] = $_POST['hobby'];
}

if(isset($_SESSION['f_name'])){
    echo "Hi,".$_SESSION['f_name']."<br>";
}
// if(isset($_SESSION['l_name'])){
//     echo $_SESSION['l_name'];
// }
if(isset($_SESSION['sex'])){
    echo $_SESSION['sex']."<br>";
}
if(isset($_SESSION['hobby'])){
    echo $_SESSION['hobby'];
}

?>
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>HTML</title>
     </head>
     <body>
         <br/>
         <br/>
         <form action="index5-5-2.php" method="post">
             First Name: <br><input type="text" name="f_name" placeholder="Taro" autofocus><br>
             Last Name:<br> <input type="text" name="l_name" placeholder="PHP"><br>
             <br>
             <input type="radio" name="sex" value="man"> Male<br>
             <input type="radio" name="sex" value="woman"> Female<br>
              <br>
              <p></p>
             <textarea name="hobby" rows="8" cols="80" placeholder="My hobby is swimming..."></textarea>
             <input type="submit" name="submit">
     </body>
 </html>
