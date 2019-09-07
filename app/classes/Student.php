<?php

namespace App\classes;

class Student
{
    public function saveStudentInfo(){
//        $data = (object)$_POST;

        extract($_POST);
       $link = mysqli_connect("localhost","root","","student_information");

//       $sql    = "INSERT INTO students (name,email,mobile) VALUES('$data->name','$data->email','$data->mobile')";

       $sql    = "INSERT INTO students (name,email,mobile) VALUES('$name','$email','$mobile')";
       if ($message = mysqli_query($link,$sql))
       {
           return $message = "Data Insert Successfully";
       }
       else{
          die("Database Problem".mysqli_error($link));
       }

    }

    public function getAllStudentInfo(){
        $link = mysqli_connect("localhost","root","","student_information");
        $sql  = "SELECT * FROM students";
        if ($result = mysqli_query($link,$sql))
        {
            return $result;
        }
        else{
            die("Database Problem".mysqli_error($link));
        }
    }
    public function getStudentInfoById($id){
        $link = mysqli_connect("localhost","root","","student_information");
        $sql  = "SELECT * FROM students WHERE id='$id'";
        if ($result = mysqli_query($link,$sql))
        {
            return $result;
        }
        else{
            die("Database Problem".mysqli_error($link));
        }
    }

    public function updateStudentInfo(){
        extract($_POST);
        $link = mysqli_connect("localhost","root","","student_information");
        $sql  = "UPDATE students SET name='$name',email='$email',mobile='$mobile' WHERE id='$id'";
        if ($message = mysqli_query($link,$sql)){
            header("Location: view-student.php");
        }
        else{
            die("Database Problem".mysqli_error($link));
        }
    }
    public function deleteStudentInfo($id){
        $link = mysqli_connect("localhost","root","","student_information");
        $sql  = "DELETE FROM students WHERE id='$id'";
        if ($message = mysqli_query($link,$sql)){
            header("Location: view-student.php");
        }
        else{
            die("Database Problem".mysqli_error($link));
        }
    }
    public function searchItemBySearchItem(){
        extract($_POST);
        $link = mysqli_connect('localhost','root','','student_information');
        $sql = "SELECT * FROM students WHERE name like '%$search_item%' || email like '%$search_item%' || mobile like '%$search_item%'";
        if ($result = mysqli_query($link,$sql))
        {
            return $result;
        }
        else
        {
            die("Database Problem".mysqli_error($link));
        }
    }

}