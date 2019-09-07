<?php
session_start();
if ($_SESSION['id'] ==  null)
{
    header('Location: index.php');
}

require_once "vendor/autoload.php";
use App\classes\Student;
use App\classes\Login;

$student = new Student();

if (isset($_POST['btn'])){
    $message = $student->updateStudentInfo($data['id']);
}

$result = $student->getStudentInfoById($_GET['id']);
$data   = mysqli_fetch_assoc($result);

if(isset($_GET['logout'])){
    $logout = new Login();
    $logout->logout();
}

?>

<hr>
<a href="dashboard.php">Add Student</a>
<a href="view-student.php">View Student</a>
<a href="?logout=true">Logout</a>||
<a href=""><?php echo $_SESSION['name'];?></a>
<hr>

<form action="" method="post">
    <table>
        <tr>
            <th>Name</th>
            <td>
                <input type="text" required name="name" value="<?php echo $data['name']?>">
                <input type="hidden" required name="id" value="<?php echo $data['id']?>">
            </td>
        </tr>
        <tr>
            <th>Email</th>
            <td><input type="email" required name="email" value="<?php echo $data['email']?>"></td>
        </tr>
        <tr>
            <th>Mobile</th>
            <td><input type="number" required name="mobile" value="<?php echo $data['mobile']?>"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="Update"></td>
        </tr>
    </table>
</form>


