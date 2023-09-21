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
        [
            "id"    => 1,
            "fname" => "Masud",
            "lname" => "Rana",
            "age"   => 18,
            "class" => 12,
            "roll"  => 001,
        ],
        [
            "id"    => 2,
            "fname" => "Al Amin",
            "lname" => "Islam",
            "age"   => 25,
            "class" => "BBA",
            "roll"  => 002,
        ],
        [
            "id"    => 3,
            "fname" => "Fatima",
            "lname" => "Khatun",
            "age"   => 18,
            "class" => 12,
            "roll"  => 003,
        ],
        [
            "id"    => 4,
            "fname" => "Parvej",
            "lname" => "Islam",
            "age"   => 18,
            "class" => 12,
            "roll"  => 004,
        ],
        [
            "id"    => 5,
            "fname" => "Monuar",
            "lname" => "Rahman",
            "age"   => 18,
            "class" => 12,
            "roll"  => 006,
        ]
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
                        <td><?php echo $student['fname'] . $student['lname']; ?></td>
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

 function addStudentData($fname, $lname, $age, $class, $roll){
    $serializeData = file_get_contents(DB);
    $students = unserialize($serializeData);
    $newId = count($students);
    $newStudent = [
        "id" => $newId,
        "fname" => $fname,
        "lname" => $lname,
        "age"   => $age,
        "class" => $class,
        "roll"  => $roll,
    ];

    array_push($students, $newStudent);

    $serializeData = serialize($students);
    file_put_contents(DB, $serializeData, LOCK_EX);
 }