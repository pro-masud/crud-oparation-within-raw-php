<?php 
/**
 * project all files required here
 * */ 
require "./inc/functions.php";
$info = '';
$task = $_GET['task'] ?? 'report';
if("seed" == $task){
    seed();
    $info = "seeding is complete Now";
}



/**
 * 
 * new student data upload to database 
 * 
 * */ 

 if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $class = $_POST['class'];
    $roll = $_POST['roll'];

    if($fname != "" && $lname != "" && $age != "" && $class != "" && $roll != ""){
         addStudentData($fname, $lname, $age, $class, $roll);

        //echo $fname . $lname . "\n" . $age . "\n" . $class . "\n" . $roll;
        $info = "Data Send Successfuly";
    }else{
        $info = "Must field Not Empty!!!";
    }
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
            <?php if("report" == $task): ?>
            <div class="row">
                <div class="column column-70 column-offset-30">
                    <?php studentReports(); ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if("add" == $task): ?>
            <div class="row">
                <div class="column column-50 column-offset-20">
                   <form action="" method="POST">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="fname">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname">
                        <label for="age">Age</label>
                        <input type="text" id="age" name="age">
                        <label for="class">Class</label>
                        <input type="text" id="class" name="class">
                        <label for="roll">Roll</label>
                        <input type="text" id="roll" name="roll">
                        <button type="submit" name="submit">Save Data</button>
                   </form>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
</body>
</html>