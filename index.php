<?php 
/**
 * project all files required here
 * */ 
require "./inc/functions.php";
$info = '';
$task = $_GET['task'] ?? 'report';
if("seed" == $task){
    seed(DB);
    $info = "seeding is complete Now";
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
                        <h1>Student Information</h1>
                        <?php 
                            include_once"./nav/nav.php";
                        ?>
                        <p>
                            <?php echo $info; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>