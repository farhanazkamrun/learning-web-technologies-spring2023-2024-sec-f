<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if (empty($first_name) || empty($last_name)) {
    echo "First name and last name cannot be empty.";
} elseif (!preg_match('/^[a-zA-Z.-]+$/', $first_name) || !preg_match('/^[a-zA-Z.-]+$/', $last_name)) {
    echo "First name and last name can contain only letters, dots, and dashes.";
} elseif (str_word_count($first_name) < 2 || str_word_count($last_name) < 2) {
    echo "First name and last name must contain at least two words.";
} elseif (!ctype_alpha(substr($first_name, 0, 1)) || !ctype_alpha(substr($last_name, 0, 1))) {
    echo "First name and last name must start with a letter.";
}

// Email validation
if (empty($email)) {
    echo "Email cannot be empty.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
}

// Gender validation
if (empty($gender)) {
    echo "Gender cannot be empty.";
}

// DOB validation
if (empty($dob)) {
    echo "Date of birth cannot be empty.";
} elseif (!is_numeric($dob) || $dob < 1 || $dob > 31) {
    echo "Invalid day.";
}

// Phone validation (assuming standard 10-digit phone number)
if (empty($phone) || !is_numeric($phone) || strlen($phone) != 10) {
    echo "Invalid phone number.";
}

// Password validation
if (empty($password)) {
    echo "Password cannot be empty.";
} elseif ($password != $confirm_password) {
    echo "Passwords do not match.";
}
?>
