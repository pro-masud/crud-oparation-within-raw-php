<?php 
/**
 * project all files required here
 * */ 
require "./inc/functions.php";
$info = '';
$task = $_GET['task'] ?? 'report';
$error = $_GET['error'] ?? '0';
if("seed" == $task){
    seed();
    $info = "seeding is complete Now";
}



/**
 * 
 * new student data upload to database 
 * 
 * */ 

 $fname = "";
 $lname = "";
 $age = "";
 $class = "";
 $roll = "";
 $photo = "";

 if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $class = $_POST['class'];
    $roll = $_POST['roll'];
    $photo = $_FILES['photo'];



    
    if($fname != "" && $lname != "" && $age != "" && $class != "" && $roll != "" && $photo != ""){
        
       $result =  addStudentData($fname, $lname, $age, $class, $roll, $photo);
    
        move_uploaded_file($photo['tmp_name'], "./uploads/" . $photo['name']);


        $info = "Data Send Successfuly";
        if($result){
            header('location: index.php?task=report');
        }else{
            $error = 1;
        }
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

            
            <?php if("1" == $error): ?>
            <div class="row">
                <div class="column column-70 column-offset-30">
                   <blockquote>
                        <p>Dublicate Roll Number</p>
                   </blockquote>
                </div>
            </div>
            <?php endif; ?>


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
                   <form class="student_add_form" action="index.php?task=add" method="POST"  enctype="multipart/form-data">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>">
                        <label for="age">Age</label>
                        <input type="text" id="age" name="age" value="<?php echo $age; ?>">
                        <label for="class">Class</label>
                        <input type="text" id="class" name="class" value="<?php echo $class; ?>">
                        <label for="roll">Roll</label>
                        <input type="text" id="roll" name="roll" value="<?php echo $roll; ?>">
                        <label for="photo">Photo</label>
                        <input type="file" id="photo" name="photo" value="<?php echo $photo; ?>">
                        <button type="submit" name="submit">Save Data</button>
                   </form>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
</body>
</html>