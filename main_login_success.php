<?php

include 'config.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>

<body>
    <header>
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {

        ?>
                <?php include '_fw/log_nav.php'; ?>
        <?php
            }
        } else {
            echo "0 results";
        }

        ?>
    </header>
    <main>
        <div class="carousel-position">
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" class="d-block w-100" height="700" alt="..." />
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1540151812223-c30b3fab58e6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" class="d-block w-100" height="700" alt="..." />
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80" class="d-block w-100" height="700" alt="..." />
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="main text" style="
          margin-top: -450px;
          color: white;
          text-align: center;
          padding-top: 0px;
          padding-bottom: 500px;
          z-index: 1;
          position: relative;
        ">
            <h1>Looking for recommended projects?</h1>
            <p class="px-5" style="font-size: 20px">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio
                inventore provident impedit voluptates ab error omnis adipisci earum
                magni doloremque!
            </p>
            <a class="btn btn-primary" href="#" role="button">Link</a>
        </div>

        <div class="text-center p-4" style="padding-top: 100px; position: static">
            <h1>About</h1>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi
                nulla optio nemo provident beatae perferendis repellendus veritatis ab
                unde neque?
            </p>
        </div>

        <section class="vh-100" style="background-color: #5f59f7;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card mb-5" style="border-radius: 15px;">
                            <div class="card-body p-4">
                                <h3 class="mb-3">Program Title</h3>
                                <p class="small mb-0"><i class="far fa-star fa-lg"></i> <span class="mx-2">|</span> Created by
                                    <strong>MDBootstrap</strong> on 11 April , 2021
                                </p>
                                <hr class="my-4">
                                <div class="d-flex justify-content-start align-items-center">
                                    <p class="mb-0 text-uppercase"><i class="fas fa-cog me-2"></i> <span class="text-muted small">settings</span></p>
                                    <p class="mb-0 text-uppercase"><i class="fas fa-link ms-4 me-2"></i> <span class="text-muted small">program link</span></p>
                                    <p class="mb-0 text-uppercase"><i class="fas fa-ellipsis-h ms-4 me-2"></i> <span class="text-muted small">program link</span>
                                        <span class="ms-3 me-4">|</span>
                                    </p>
                                    <a href="#!">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-2.webp" alt="avatar" class="img-fluid rounded-circle me-3" width="35">
                                    </a>
                                    <button type="button" class="btn btn-outline-dark btn-sm btn-floating">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-4">
                                <h3 class="mb-3">Company Culture</h3>
                                <p class="small mb-0"><i class="fas fa-star fa-lg text-warning"></i> <span class="mx-2">|</span>
                                    Public <span class="mx-2">|</span> Updated by <strong>MDBootstrap</strong> on 11 April , 2021
                                </p>
                                <hr class="my-4">
                                <div class="d-flex justify-content-start align-items-center">
                                    <p class="mb-0 text-uppercase"><i class="fas fa-cog me-2"></i> <span class="text-muted small">settings</span></p>
                                    <p class="mb-0 text-uppercase"><i class="fas fa-link ms-4 me-2"></i> <span class="text-muted small">program link</span></p>
                                    <p class="mb-0 text-uppercase"><i class="fas fa-ellipsis-h ms-4 me-2"></i> <span class="text-muted small">program link</span>
                                        <span class="ms-3 me-4">|</span>
                                    </p>
                                    <a href="#!">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-2.webp" alt="avatar" class="img-fluid rounded-circle me-1" width="35">
                                    </a>
                                    <a href="#!">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-3.webp" alt="avatar" class="img-fluid rounded-circle me-1" width="35">
                                    </a>
                                    <a href="#!">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-4.webp" alt="avatar" class="img-fluid rounded-circle me-1" width="35">
                                    </a>
                                    <a href="#!">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar" class="img-fluid rounded-circle me-3" width="35">
                                    </a>
                                    <button type="button" class="btn btn-outline-dark btn-sm btn-floating">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="mainContent01">
            <div class="container">
                <div class="d-lg-flex">
                    <div class="d-md-flex align-items-center mb-lg-0 mb-md-5">
                        <div class="col1 me-md-4 mb-md-0 mb-5">
                            <div class="card pb-4">
                                <span class="fab fa-envira mt-3"></span>
                                <p class="h4 pt-4">Freelancers</p>
                                <p class="p1 text-muted">
                                    Seeking justice in the world is a sed significant emotional
                                    and investment when we follow this call.
                                </p>
                                <span class="fas fa-arrow-right"></span>
                            </div>
                        </div>
                        <div class="col2 me-md-4 mb-md-0 mb-5">
                            <div class="card pb-4">
                                <span class="fas fa-cut mt-3"></span>
                                <p class="h4 pt-4">Projects</p>
                                <p class="p1 text-muted">
                                    Seeking justice in the world is a sed significant emotional
                                    and investment when we follow this call.
                                </p>
                                <span class="fas fa-arrow-right"></span>
                            </div>
                        </div>
                        <div class="col3 me-md-4 mb-md-0 mb-5">
                            <div class="card pb-4">
                                <span class="fas fa-people-carry mt-3"></span>
                                <p class="h4 pt-4">Training</p>
                                <p class="p1 text-muted">
                                    Seeking justice in the world is a sed significant emotional
                                    and investment when we follow this call.
                                </p>
                                <span class="fas fa-arrow-right"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col4">
                        <div class="content">
                            <span class="h-6">Types of Services</span>
                            <p class="h2 mb-4">Find your needs!</p>
                            <p class="text-muted mb-4">
                                A small river named Duden flows by their place and supplies it
                                with the necessary regelialia. It is a paradisematic country,
                                in which roasted parts of sentences fly into your.
                            </p>
                            <p><a href="#" class="btn btn-primary">Get a Quote</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="reviews">
        <figure class="snip1157">
            <blockquote>
                Calvin: You know sometimes when I'm talking, my words can't keep up
                with my thoughts... I wonder why we think faster than we speak.
                Hobbes: Probably so we can think twice.
                <div class="arrow"></div>
            </blockquote>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample3.jpg" alt="sq-sample3" />
            <div class="author">
                <h5>Pelican Steve <span> LIttleSnippets.net</span></h5>
            </div>
        </figure>
        <figure class="snip1157 hover">
            <blockquote>
                Thank you. before I begin, I'd like everyone to notice that my report
                is in a professional, clear plastic binder...When a report looks this
                good, you know it'll get an A. That's a tip kids. Write it down.
                <div class="arrow"></div>
            </blockquote>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample27.jpg" alt="sq-sample27" />
            <div class="author">
                <h5>Max Conversion<span> LIttleSnippets.net</span></h5>
            </div>
        </figure>
        <figure class="snip1157">
            <blockquote>
                My behaviour is addictive functioning in a disease process of toxic
                co-dependency. I need holistic healing and wellness before I'll accept
                any responsibility for my actions.
                <div class="arrow"></div>
            </blockquote>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample17.jpg" alt="sq-sample17" />
            <div class="author">
                <h5>Eleanor Faint<span> LIttleSnippets.net</span></h5>
            </div>
        </figure>
    </div>

    <footer>
        <?php include '_fw/main_footer.php'; ?>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        document.onreadystatechange = function() {
            let lastScrollPosition = 0;
            const navbar = document.querySelector(".navbar");
            window.addEventListener("scroll", function(e) {
                lastScrollPosition = window.scrollY;

                if (lastScrollPosition > 100)
                    navbar.classList.add("bg-dark", "navbar-dark");
                else navbar.classList.remove("bg-dark");
            });
        };
    </script>
</body>

</html>