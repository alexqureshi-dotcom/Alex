<?php
session_start();
require('includes/auth_check.php');

$page_title = "Log a rental | Library Rental System";

// If save_loan.php redirected back here with errors, read them once.
$errors = $_SESSION['borrow_errors'] ?? [];
$old    = $_SESSION['borrow_old'] ?? [];

//Get now but in NZ time
$nz_time = new DateTime('now', new DateTimeZone('Pacific/Auckland'));
$now = $nz_time->format('Y-m-d\TH:i');

unset($_SESSION['borrow_errors'], $_SESSION['borrow_old']);

include('includes/header.php');
include('includes/nav.php');
?>

<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h2 class="pt-5">Log a loan</h2>

            <?php if ($errors): ?>
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <form action="save_loan.php" method="POST">
                <div class="mb-3">
                    <label for="item_name" class="form-label">Item</label>
                    <input type="text" class="form-control" id="item_name" name="item_name"
                           value="<?= htmlspecialchars($old['item_name'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <!--
                    <input type="text" class="form-control" id="category" name="category"
                           value="<?= htmlspecialchars($old['category'] ?? '') ?>">
                    -->
                    <select class="form-select" id="category" name="category">
                        <option value="Books" <?= ($old['category'] ?? '') == 'Books' ? 'selected' : '' ?>>Books</option>
                        <option value="Optical Discs" <?= ($old['category'] ?? '') == 'Optical Discs' ? 'selected' : '' ?>>Optical Discs</option>
                        <option value="Device Usage" <?= ($old['category'] ?? '') == 'Device Usage' ? 'selected' : '' ?>>Device Usage</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="borrower_name" class="form-label">Borrower Name</label>
                    <input type="text" class="form-control" id="borrower_name" name="borrower_name"
                           value="<?= htmlspecialchars($old['borrower_name'] ?? '') ?>">
                </div>
                 <div class="mb-3">
                    <label for="borrower_email" class="form-label">Borrower Email</label>
                    <input type="text" class="form-control" id="borrower_email" name="borrower_email"
                           value="<?= htmlspecialchars($old['borrower_email'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="borrowed_date" class="form-label">Borrowed Date</label>
                    <input type="datetime-local" class="form-control" id="borrowed_date" name="borrowed_date"
                           value="<?= htmlspecialchars($old['borrowed_date'] ?? $now) ?>">
                </div>
                <div class="mb-3">
                    <label for="due_back" class="form-label">Due back</label>
                    <input type="date" class="form-control" id="due_back" name="due_back"
                           value="<?= htmlspecialchars($old['due_back'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="payment_type" class="form-label">Payment Type</label>
                    <input type="text" class="form-control" id="payment_type" name="payment_type"
                           value="<?= htmlspecialchars($old['payment_type'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="cost" class="form-label">Cost</label>
                    <input type="number" class="form-control" id="cost" name="cost"
                           value="<?= htmlspecialchars($old['cost'] ?? '') ?>">
                </div>  
                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <input type="text" class="form-control" id="notes" name="notes"
                           value="<?= htmlspecialchars($old['notes'] ?? '') ?>">
                </div>

                <button type="submit" class="btn btn-primary">Log rental</button>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
<?php include('includes/footer.php'); ?>