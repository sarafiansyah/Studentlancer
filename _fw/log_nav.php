<nav class="navbar fixed-top navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><b>Student</b>lancer</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Help
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="aboutDev.php">About</a></li>
                        <li><a class="dropdown-item" href="#">Customer Care</a></li>
                        <li>
                            <a class="dropdown-item" href="#">Report</a>
                        </li>
                    </ul>
                </li>
                <!-- <button type="button" class="btn btn-primary">Primary</button> -->
                <?php echo "                      
                          <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                            " . $row['firstname'] . "
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                                <li><a class='dropdown-item' href='users_profile.php'>Profile</a></li>
                                <li><a class='dropdown-item' href='#'>Another action</a></li>
                                <li>
                                    <a class='dropdown-item' href='main_logout.php'>Logout</a>
                                </li>
                            </ul>
                        </li>"  ?>
            </ul>
        </div>
    </div>
</nav>