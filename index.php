<?php 
    require_once"./inc/functions.php";
    $info = '';
    $task = $_GET['task'] ?? 'report';
    $error = $_GET['error'] ?? '0';

    if("seed" == $task){
        seed();
        $info = "seeding is complete";
    }


    // delete students
    if("delete" == $task){
        $id = $_GET['id'];
        if($id > 0){
            deleteStudent($id);
        }
    } 


    $fname = "";
    $lname = "";
    $roll = "";

    // data send to database 
    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
       $roll = $_POST['roll'];
       
       $id = "";
       if(isset($_POST['id'])){
            $id = $id = $_POST['id'];
       }

        if($id){
           $result = upDateStudentInfo($id, $fname, $lname, $roll);
           if($result){
                header('location: index.php?task=report');
            }else{
                $error = 1;
            }
        }else{
            if($fname != "" && $lname != "" && $roll != "" ){
                $result =  addNewStudents($fname, $lname, $roll);
                 if($result){
                     header('location: index.php?task=report');
                 }else{
                     $error = 1;
                 }
             }else{
                 $info = "Data Not sent For Database";
             }
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
                            include_once "./nav/nav.php";
                        ?>
                        <p>
                            <?php echo $info; ?>
                        </p>
                    </div>
                </div>
            </div>

                     
            <?php if("1" == $error): ?>
                <div class="row">
                    <blockquote>
                        This Roll Is Dublicate
                    </blockquote>
                </div>
            <?php endif; ?>
           
            <?php if("report" == $task):?>
                <div class="row">
                    <div class="column column-70 column-offset-30">
                        <?php print_r(getStudents()); ?>
                    </div>
                </div>
            <?php endif; ?>


            <?php if("add" == $task): ?>
                <div class="row">
                <div class="column column-50 column-offset-20">
                   <form class="student_add_form" action="index.php?task=add" method="POST">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>">
                        <label for="roll">Roll</label>
                        <input type="text" id="roll" name="roll" value="<?php echo $roll; ?>">
                        <button type="submit" name="submit">Save Data</button>
                   </form>
                </div>
            </div>
            <?php endif; ?>

            <!-- student edite data here now -->
            <?php if("edit" == $task): 
               
                 $id = $_GET['id'];
                
                 $student = editStudent($id);

                 if($student):
                
                ?>
                <div class="row">
                <div class="column column-50 column-offset-20">
                   <form class="student_add_form" method="POST">
                        <input type="hidden" value="<?php echo $id ?>" name="id">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="fname" value="<?php echo $student['fname']; ?>">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname" value="<?php echo $student['lname']; ?>">
                        <label for="roll">Roll</label>
                        <input type="text" id="roll" name="roll" value="<?php echo  $student['roll']; ?>">
                        <button type="submit" name="submit">Update Data</button>
                   </form>
                </div>
            </div>
            <?php
                endif;
            endif; ?>
        </div>
    </div>
    
</body>
</html>