<?php
    
     require_once 'connect.php';
     require_once 'functions.php';
     //require_once 'create_user.php';
?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/registr.css">
        <title>UNITbox</title>
    </head>
<body>
    <div class="header">
    <h4>Hello, 
<?php 
    $name = get_login();
     echo "$name!</h4>";
    if ($name !== "user")
    {
        if ($name == "admin")
        {
            echo '<a style="margin-left: 20px;" href="admin.php">Admin area';
        }
        echo '<a style="margin-left: 20px;" href="personal.php">Personal area';
    }
       
?>
    <h1 align="center">UNIT-box electronics store</h1>
    </div>
    <div class="menu">
        <ul class="nav">
           <li class="log"><a href="login.php">LOGIN</a></li>
           <li class="god"><a href="goods.php">GOODS</a>
            <div class="dropdown-content">
            <a href="<?php echo 'goods.php?1'; ?>">Laptops</a>
            <a href="<?php echo 'goods.php?2'; ?>">Computers</a>
            <a href="<?php echo 'goods.php?3'; ?>">Tables</a>
            <a href="<?php echo 'goods.php?4'; ?>">Monitors</a>
            <a href="<?php echo 'goods.php?5'; ?>">Monoblocks</a>
            </div>
            </li>
           <li class="bas"><a href="basket.php">BASKET<br></a></li>
           <li class="abo"><a href="main.php">HOME</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="user_form">
            <form method="post" name="" action="">
            Login: <br /><input style="border-radius:5px; padding: 3px;"name="login" value="" placeholder="login"/>
            <br />
            <br />
            E-mail:<br /> <input style="border-radius:5px; padding: 3px;" name="email" value=""  placeholder="e-mail"/>
            <br />
            <br />
            Password:<br /> <input style="border-radius:5px; padding: 3px;" type="password" name="passwd" value=""  placeholder="password"/>
            <br />
            <br />
           
            <input style="border-radius:5px; border: 2px solid green; padding: 3px; width:140px;" type="submit" name="reg_but" value="Register"/>
            
       </form>
 <?php
            if (isset($_POST["reg_but"]) && $_POST["login"] && $_POST["email"] && $_POST["passwd"])
            {
                if (add_user($_POST["email"], $_POST["passwd"], $_POST["login"], $link) == "created")
                {
                    echo '<style> form {display: none;} </style>';
                    echo "<p>Success!</p>";
                }
                else
                {
                    echo '<p style="color:red">User already exist!</p>';
                }
            }
?> 
       </div>
    </div>
   
    <div class="footer">&copy; vtolochk && vhavryle</div>
</body>
</html>
