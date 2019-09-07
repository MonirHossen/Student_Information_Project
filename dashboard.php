<?php
require_once "vendor/autoload.php";
use App\classes\Student;
$message = "";
if (isset($_POST['btn'])){
    $student = new Student();
    $message = $student->saveStudentInfo();
}


?>
<h3><?php echo $message; ?></h3>
<hr>
<a href="dashboard.php">Add Student</a>
<a href="view-student.php">View Student</a>
<hr>
<form action="" method="post">
    <table>
        <tr>
            <th>Name</th>
            <td><input type="text" required name="name"></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><input type="email" required name="email"></td>
        </tr>
        <tr>
            <th>Mobile</th>
            <td><input type="number" required name="mobile"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="Submit"></td>
        </tr>
    </table>
</form>


