<?php 

session_start([
    'cookie_lifetime'   => 300, // 300 minutes
]);

$error = false;


$info = '';
$_SESSION['loggedin'] = '';



// if submit button here
if(isset($_POST['username']) && isset($_POST['password'])){
    if("masud" == $_POST['username'] && "1234" == $_POST['password']){
        $_SESSION['loggedin'] = true;
        $info = "Wellcome admin, You are Login Successfully";

    }else if(empty($_POST['username']) && empty($_POST['password'])){

        $info = "fields Not be Empty!!!";

    }else{
        
        $_SESSION['loggedin'] = false;
        $info = "Hello Stranger, Login Below";
        $error = true;
    }
}




if(isset($_POST['logout'])){
    $_SESSION['loggedin'] = false;
    session_destroy();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- normalize file -->
    <link rel="stylesheet" href="./css/normalize.css">
    <!-- milligram file -->
    <link rel="stylesheet" href="./css/milligram.min.css">
    <!-- CSS Main File -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div class="forms">
        <div class="container">
            <div class="row">
                <div class="column column-70 column-offset-30">
                    <div style="text-align: center;" class="student-admin">
                        <h1>Simple Auth Examples</h1>

                        
                        <p>
                            <?php  echo $info; ?>
                        </p>
                      
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="column column-50 column-offset-20">
                <?php 
                        // user and password validation
                        if($error){
                        ?>
                            <blockquote>
                                User Name and Password didn't much
                            </blockquote>
                        <?php

                        }
                        if(false == $_SESSION['loggedin']): 

                ?>
                    </div>
                </div>
                <div class="row">
                    <div class="column column-50 column-offset-20">
                        <form class="student_add_form" method="POST">
                                <label for="username">User Name</label>
                                <input type="text" id="username" name="username" >
                                <label for="password">Password</label>
                                <input type="text" id="password" name="password">
                                <button type="submit" name="submit">Log In</button>
                        </form>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="column column-70 column-offset-30">
                        <form class="student_add_form" method="POST">
                            <input type="hidden" name="logout">
                            <button type="submit" name="submit">Log Out</button>
                        </form>
                    </div>
                </div>

            <?php endif; ?>
        </div>
    </div>
    
</body>
</html>