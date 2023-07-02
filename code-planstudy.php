<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_course']))
{
    $course_id = mysqli_real_escape_string($conn, $_POST['delete_course']);

    $query = "DELETE FROM studyplan WHERE id='$course_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Course Deleted Successfully";
        header("Location: planstudy.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Course Not Deleted";
        header("Location: planstudy.php");
        exit(0);
    }
}

if(isset($_POST['update_course']))
{
    $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);

    $course_code = mysqli_real_escape_string($conn, $_POST['course_code']);
    $course_name = mysqli_real_escape_string($conn, $_POST['course_name']);
    $credit_hours = mysqli_real_escape_string($conn, $_POST['credit_hours']);
    $lecturer_name = mysqli_real_escape_string($conn, $_POST['lecturer_name']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);

    $query = "UPDATE studyplan SET course_code = '$course_code' , course_name='$course_name', credit_hours='$credit_hours', lecturer_name='$lecturer_name', semester='$semester' WHERE course_id='$course_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Course Updated Successfully";
        header("Location: planstudy.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Course Not Updated";
        header("Location: planstudy.php");
        exit(0);
    }

}


if(isset($_POST['save_course']))
{
    $course_code = mysqli_real_escape_string($conn, $_POST['course_code']);
    $course_name = mysqli_real_escape_string($conn, $_POST['course_name']);
    $credit_hours = mysqli_real_escape_string($conn, $_POST['credit_hours']);
    $lecturer_name = mysqli_real_escape_string($conn, $_POST['lecturer_name']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);

    $query = "INSERT INTO studyplan (course_code, course_name,credit_hours,lecturer_name,semester) VALUES ('$course_code', '$course_name','$credit_hours','$lecturer_name','$semester')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Course Created Successfully";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Course Not Created";
        header("Location: student-create.php");
        exit(0);
    }
}

?>