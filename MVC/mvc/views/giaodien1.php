<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/css/style1.css">
    <title>Moderno</title>
</head>
<body>
   <div id="header">
       <table id="hd">
           <tr>
               <td><img src="./public/images/header/3vach.png"></td>
               <td><a href=""><img src="./public/images/header/logo.png" ></td>
               <td><input type="text"  value="Search for anything" ></td>
               <td><img src="./public/images/header/thongbao.png"></td>
               <td><img src="./public/images/header/avata.png"></td>
               <td>Hi, Luffy</td>
           </tr>
       </table>
   </div>
   <div id="mider">
        <div id="side">

        </div>
        <div id="menu">

        </div>
        <div id="content">
            <?php
            require_once"./mvc/views/pages/".$data["Page"].".php";
            ?>
        </div>
   </div>
   <div id="footer">
      footer
   </div>
</body>
</html>