<?php
require_once "vendor/autoload.php";
use App\classes\Student;

$result= "";

$student = new Student();
$result = $student->getAllStudentInfo();

if (isset($_GET['status'])){
    $student->deleteStudentInfo($_GET['id']);
}
if (isset($_POST['btn'])){
  $result =  $student->searchItemBySearchItem();
}


?>
<hr>
<a href="dashboard.php">Add Student</a>
<a href="view-student.php">View Student</a>

<form action="" method="post">
    <table>
        <tr>
            <td>Search Item</td>
            <td><input type="text" name="search_item"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Search" name="btn"></td>
        </tr>

    </table>
</form>

<hr>
<table width="600px" border="1px">
    <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Action</th>
    </tr>
    <?php while ($student =mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $student['id'];?></td>
        <td><?php echo $student['name'];?></td>
        <td><?php echo $student['email'];?></td>
        <td><?php echo $student['mobile'];?></td>
        <td>
            <a href="edit-student.php?id=<?php echo $student['id'];?>">Edit</a> |
            <a href="?status=delete&id=<?php echo $student['id'];?>" onclick="return confirm('Are You Sure Delete This')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
