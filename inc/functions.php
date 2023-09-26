<?php 
/**
 * create a database path and database name here 
 * */ 

define("DB", "C:/xampp/htdocs/crud/DB/database.txt");



/**
 * create a students data for seed name
 * */ 

 function seed(){
    $Data = [
      
    ];

    $serializeData = serialize($Data);

    file_put_contents(DB, $serializeData, LOCK_EX);
 }


/**
 * create a all student report here now
 * 
 * */

 function studentReports(){
    $serializeData = file_get_contents(DB);
    $students = unserialize($serializeData);

    ?>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Class</th>
                    <th>Roll</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($students as $student): ?>
                    <tr>
                        <td><?php echo $student['id']; ?></td>
                        <td><img style="width: 30px; height=30px;" src="../uploads/<?php echo $student['photo']; ?>"></td>
                        <td><?php echo $student['fname']. " " . $student['lname']; ?></td>
                        <td><?php echo $student['age']; ?></td>
                        <td><?php echo $student['class']; ?></td>
                        <td><?php echo $student['roll']; ?></td>
                        <td><a style="color: green;" href="index.php?task=edite&id=<?php echo $student['id']; ?>">Edite</a> | <a style="color: red;" href="index.php?task=delete&id=<?php echo $student['id']; ?>">Delete</a></td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    <?php 


 }


 /**
 * 
 * new student data send to database
 * 
 * */

 function addStudentData($fname, $lname, $age, $class, $roll, $photo){
    $founts = false;
    $serializeData = file_get_contents(DB);
    $students = unserialize($serializeData);
    foreach($students as $_student){
        if($_student['roll'] == $roll){
            $founts = true;
            break;
        }
    }
    if(!$founts){
        $newId = count($students);
        $newStudent = [
            "id" => $newId,
            "fname" => $fname,
            "lname" => $lname,
            "age"   => $age,
            "class" => $class,
            "roll"  => $roll,
            "photo"  => $photo['name'],
        ];

        array_push($students, $newStudent);

        $serializeData = serialize($students);
        file_put_contents(DB, $serializeData, LOCK_EX);
        return true;
    }

    return false;
 }