<?php
session_start();
// Declare variable
$page_title = "Home | Library Rental System";
// Call files
include('includes/header.php');
include('includes/nav.php');
?>
<!-- Start of content 1 -->
<div class="container text-center pt-5">
    <div class="row align-items-start">
        <div class="col">
            <h1>Library Rental System</h1>
            <p class="lead">Tracks all library rentals — what's out, who has it, and when it's due back.</p>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">

            <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" style="height: 400px;">
                <div class="carousel-item active">
                <img src="/images/Library1a.webp" class="d-block w-100" alt="Library Books">
                </div>
                <div class="carousel-item">
                <img src="/images/Library2a.png" class="d-block w-100" alt="Library Devices">
                </div>
                <div class="carousel-item">
                <img src="/images/Library3.jpg" class="d-block w-100" alt="Library Optical Discs">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>


<!-- Start of cards -->
<div class="container pt-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card text-center h-100">
                <div class="card-body d-flex flex-column">
                    <i class="fa-solid fa-circle-info fa-3x mb-3"></i>
                    <h5 class="card-title">How it works</h5>
                    <p class="card-text">Who is the Library Rental System for, and what problem it solves.</p>
                    <a class="mt-auto" href="how_it_works.php"><button type="button" class="btn btn-primary btn-lg">Learn more</button></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center h-100">
                <div class="card-body d-flex flex-column">
                    <i class="fa-solid fa-list-check fa-3x mb-3"></i>
                    <h5 class="card-title">Current rentals</h5>
                    <p class="card-text">See what's borrowed right now, and what's overdue.</p>
                    <a class="mt-auto" href="view_loans.php"><button type="button" class="btn btn-primary btn-lg">View rentals</button></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center h-100">
                <div class="card-body d-flex flex-column">
                    <i class="fa-solid fa-user-shield fa-3x mb-3"></i>
                    <h5 class="card-title"><?php echo isset($_SESSION['id']) ? 'Control panel' : 'Monitor login'; ?></h5>
                    <p class="card-text">Log a rental, or mark items as returned.</p>
                    <a class="mt-auto" href="<?php echo isset($_SESSION['id']) ? 'control_panel.php' : 'login.php'; ?>">
                        <button type="button" class="btn btn-primary btn-lg"><?php echo isset($_SESSION['id']) ? 'Open' : 'Log in'; ?></button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Call footer
include('includes/footer.php');
?>