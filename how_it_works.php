<?php
session_start();
$page_title = "How it works | Library Rental System";
include('includes/header.php');
include('includes/nav.php');
?>
<!-- Start of content 1 -->
<div class="container pt-5">
    <div class="row">
        <h1 class="text-center">How this Library Rental System works</h1>
        <hr />
        <h3 class="pt-5">The problem</h3>
        <p>
            The current library system is old, run down and difficult to run/manage. Additionally,
            it’s hard to read and easy to log in through other devices; not being super secure.The 
            purpose of this library rental system is to create a digital solution/system (website) to 
            track book rentals, device rentals, cd rentals, dvd rentals, blu-ray rentals, 3D printing, 
            photocopying and how you pay. It must be easy to read, update and enter information into.
        </p>
        <h3 class="pt-4">Who it's for</h3>
        <p>
            The library monitors and the librarian should be able to access the website to see whether a 
            book is available or to allow someone to borrow a book/other rentals. Additionally, others 
            should be able to login and see the website to view which rentals are available. However, they 
            shouldn't have permission to change anything as they must talk to the librarian or a library 
            monitor for that.

        </p>
        <h3 class="pt-4">What it does</h3>
        <ul>
            <li>Lets a signed-in monitor log a loan — item, borrower, and due-back date</li>
            <li>Shows anyone, monitor or staff, a live public list of what's currently out</li>
            <li>Flags anything overdue</li>
            <li>Lets a monitor mark gear as returned, or correct a mistaken entry</li>
            <li>Shows images of the library</li>
            <li>Allows guests to browse the current loans</li>
        </ul>
    </div>
</div>

<?php
include('includes/footer.php');
?>