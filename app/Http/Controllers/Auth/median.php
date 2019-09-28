<?php


$regexpassword = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/";
if (isset($_POST['submit'])) {
    if(preg_match($regexpassword,$_POST['password'])){
        $is_password_Valid = "True";
    }else{
        $is_password_Valid = "False";
    }
    
}

?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>REGEX</title>
 </head>
 <body>
<form method="post">
<input type="text" placeholder="password" name="password">
<button value="submit" name="submit">Validasi</button>
 </form>    
 <?= $is_password_Valid;?>

 <pre>
   ^ mulai
   $ selesai /end
   []
   + Apply ke Semua
   \s Spasi
   0-9 angka
   a-z huruf kecil
   \d allow semua digit atau angka
   \w allow semua karakter
   .  allow semua
   \. period
   {5} apply rule 5 karaakter
   {5,10} apply rule 5 - 10 karaakter
</pre>
</body>
</html>