<?php
require_once "vendor/autoload.php";
use App\classes\Login;

if (isset($_POST['btn'])){
    $user = new Login();
    $user->adminLoginCheck();
}

?>





<style>
    .form-controller{
        width: 50%;
        height: 40px;
        margin: 120px auto;
        box-shadow: 0 0 5px 5px gray;
        box-sizing: border-box;
        padding: 150px;
    }
</style>

<div class="form-controller">
    <form action="" method="post">
        <table>
            <tr>
                <th>Email</th>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="text" name="password"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" name="btn" value="LogIn"></td>
            </tr>
        </table>
    </form>
</div>
