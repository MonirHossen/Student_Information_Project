<?php


namespace App\classes;


class Login
{
    public function adminLoginCheck(){

        extract($_POST);
        $md5_password = md5($password);
        $link = mysqli_connect('localhost','root','','Student_Information');
        $sql = "SELECT * FROM users WHERE email ='$email' && password ='$md5_password'";

        if ($queryResult = mysqli_query($link,$sql))
        {
            $user = mysqli_fetch_assoc($queryResult);
              if ($user)
              {
                  header('Location: dashboard.php');
              }
              else
              {
                  header('Location: index.php');
              }
        }
        else
        {
            die("Query Problem".mysqli_error($link));
        }
    }
}