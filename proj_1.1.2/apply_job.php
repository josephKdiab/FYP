<?php
session_start();

if (!isset($_SESSION['EMAIL'])) {
    header("Location: index.php");
    exit();
} else {
    $applicant_email = $_SESSION['EMAIL'];
    $job_poster_email = $_GET['email'];
    $job_id = $_GET['job_id'];

    include 'connection.php';

    $query = "INSERT INTO `applications` (job_id, applicant_email, job_poster_email)
              VALUES ('$job_id', '$applicant_email', '$job_poster_email')";
    $res = mysqli_query($con, $query);

    if ($res) {
        // Insertion successful
        $_SESSION['success_message'] = "Your application has been sent.";
    } else {
        // Insertion failed
        $_SESSION['error_message'] = "Failed to send the application.";
    }

    mysqli_close($con);

    // Redirect to jobs.php with appropriate message
    header("Location: jobs.php?message=" . urlencode($_SESSION['success_message']));

}
?>