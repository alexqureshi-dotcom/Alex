<?php
session_start();
require('includes/auth_check.php');
require('includes/conn_1dt.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: borrow.php');
    exit;
}

$item     = trim($_POST['item_name'] ?? '');
$borrower = trim($_POST['borrower_name'] ?? '');
$borrower_email = trim($_POST['borrower_email'] ?? '');
$notes = trim($_POST['notes'] ?? '');
$due      = $_POST['due_back'] ?? '';
$category      = $_POST['category'] ?? '';
$payment_type      = $_POST['payment_type'] ?? '';
$cost      = $_POST['cost'] ?? '';
$today    = date('Y-m-d');
// $now = date('Y-m-d H:i:s');
// $now_plus_minute = date('Y-m-d H:i', strtotime($now . ' +1 minute'));
$nz_time = new DateTime('now', new DateTimeZone('Pacific/Auckland'));
$now = $nz_time->format('Y-m-d\TH:i:s');

$borrowed_date      = $_POST['borrowed_date'] ?? '';
$errors   = [];

if ($item === '') {
    $errors[] = 'Please enter an item name.';
}
if ($category === '') {
    $errors[] = 'Please enter a category.';
}
if ($borrower === '') {
    $errors[] = 'Please enter a borrower name.';
}
if ($payment_type === '') {
    $errors[] = 'Please enter a payment type.';
}
if ($cost === '') {
    $errors[] = 'Please enter a cost.';
}
if ($borrower_email === '') {
    $errors[] = 'Please enter an email.';
}
if ($borrowed_date === '' || $borrowed_date > $now) { // does not work as we want
//if ($borrowed_date === '' ) {
    $errors[] = 'Please enter a date. Ensure the date/time is either the current date/time or prior';
}
if ($due === '' || $due < $today) {
    $errors[] = 'Due back date must be today or later.';
}

if ($errors) {
    $_SESSION['borrow_errors'] = $errors;
    $_SESSION['borrow_old']    = [
        'item_name' => $item, 
        'borrower_name' => $borrower, 
        'due_back' => $due, 
        'category' => $category, 
        'payment_type' => $payment_type, 
        'notes' => $notes,
        'borrowed_date' => $borrowed_date,
        'borrower_email' => $borrower_email,
        'cost' => $cost];
    header('Location: borrow.php');
    exit;
}

$sql = "INSERT INTO rentals (item_name, borrower_name, category, borrowed_date, due_back, payment_type, cost, logged_by, borrower_email, notes)
        VALUES (:item, :borrower, :category, :borrowed_date, :due, :payment_type, :cost, :logged_by, :borrower_email, :notes)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':item'      => $item,
    ':borrower'  => $borrower,
    ':category'  => $category,
    ':borrowed_date'  => $borrowed_date,
    ':due'       => $due,
    ':payment_type'       => $payment_type,
    ':cost'       => $cost,
    ':logged_by' => $_SESSION['id'],
    ':borrower_email' => $borrower_email,
    ':notes' => $notes,

]);

header('Location: manage_loans.php?logged=1');
exit;