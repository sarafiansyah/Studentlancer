 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="utf-8">
   <title>Studentlancer - <?php echo $title; ?></title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <meta name="description" content="" />
   <meta name="author" content="http://webthemez.com" />
   <!-- css -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
   <link href="<?php echo web_root; ?>plugins/home-plugins/css/bootstrap.min.css" rel="stylesheet" />
   <link href="<?php echo web_root; ?>plugins/home-plugins/css/fancybox/jquery.fancybox.css" rel="stylesheet">
   <link href="<?php echo web_root; ?>plugins/home-plugins/css/flexslider.css" rel="stylesheet" />
   <link href="<?php echo web_root; ?>plugins/home-plugins/css/style.css" rel="stylesheet" />
   <link href="<?php echo web_root; ?>plugins/home-plugins/css/styles.css" rel="stylesheet" />
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
   <!-- <link rel="stylesheet" href="<?php echo web_root; ?>plugins/dataTables/dataTables.bootstrap.css">  -->
   <link rel="stylesheet" href="<?php echo web_root; ?>plugins/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />
   <link rel="stylesheet" href="<?php echo web_root; ?>plugins/dataTables/jquery.dataTables.min.css">
   <link rel="stylesheet" href="<?php echo web_root; ?>plugins/dataTables/jquery.dataTables_themeroller.css">
   <!-- datetime picker CSS -->
   <link href="<?php echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
   <link href="<?php echo web_root; ?>plugins/datepicker/datepicker3.css" rel="stylesheet" media="screen">

   <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
   <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


 </head>

 <body>
   <div id="wrapper" class="home-page">

     <!-- start header -->
     <header>
       <div class="topbar ">
         <div class="container">
           <div class="row">
             <div class="col-md-12">
               <p class="pull-left hidden-xs"><i class="fa fa-phone"></i>Tel No. (+001) 123-456-789</p>
               <?php if (isset($_SESSION['APPLICANTID'])) {

                  $sql = "SELECT count(*) as 'COUNTNOTIF' FROM `tbljob` ORDER BY `DATEPOSTED` DESC";
                  $mydb->setQuery($sql);
                  $showNotif = $mydb->loadSingleResult();
                  $notif = isset($showNotif->COUNTNOTIF) ? $showNotif->COUNTNOTIF : 0;


                  $applicant = new Applicants();
                  $appl  = $applicant->single_applicant($_SESSION['APPLICANTID']);

                  $sql = "SELECT count(*) as 'COUNT' FROM `tbljobregistration` WHERE `PENDINGAPPLICATION`=0 AND `HVIEW`=0 AND `APPLICANTID`='{$appl->APPLICANTID}'";
                  $mydb->setQuery($sql);
                  $showMsg = $mydb->loadSingleResult();
                  $msg = isset($showMsg->COUNT) ? $showMsg->COUNT : 0;

                  echo ' <p class="pull-right login"><a title="View Notification(s)" href="' . web_root . 'applicant/index.php?view=notification"> <i class="fa fa-bell-o"></i> <span class="label label-success">' . $notif . '</span></a> | <a title="View Message(s)" href="' . web_root . 'applicant/index.php?view=message"> <i class="fa fa-envelope-o"></i> <span class="label label-success">' . $msg . '</span></a> | <a title="View Profile" href="' . web_root . 'applicant/"> <i class="fa fa-user"></i> Howdy, ' . $appl->FNAME . ' ' . $appl->LNAME . ' </a> | <a href="' . web_root . 'logout.php">  <i class="fa fa-sign-out"> </i>Logout</a> </p>';
                } else { ?>
                 <p class="pull-right login"><a data-target="#myModal" data-toggle="modal" href=""> <i class="fa fa-lock"></i> Login </a></p>
               <?php } ?>

             </div>
           </div>
         </div>
       </div>

       <div class="navbar fixed-top navbar-expand-lg navbar-default ">
         <div class="container-fluid">
           <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>
             <a class="navbar-brand" href="<?php echo web_root; ?>index.php">Studentlancer<!-- <img src="<?php echo web_root; ?>plugins/home-plugins/img/logo.png" alt="logo"/> --></a>
           </div>
           <div class="navbar-collapse collapse ">
             <ul class="nav navbar-nav">
               <li class="<?php echo !isset($_GET['q']) ? 'active' : '' ?>"><a href="<?php echo web_root; ?>index.php">Home</a></li>
               <li class="dropdown">
                 <a href="#" data-toggle="dropdown" class="dropdown-toggle">Job Search</b></a>
                 <ul class="dropdown-menu">
                   <li class="<?php if (isset($_GET['q'])) {
                                if ($_GET['q'] == 'advancesearch') {
                                  echo 'active';
                                } else {
                                  echo '';
                                }
                              }  ?>"><a href="<?php echo web_root; ?>index.php?q=advancesearch">Advance Search</a></li>
                   <li><a href="<?php echo web_root; ?>index.php?q=search-company">Job By Company</a></li>
                   <li><a href="<?php echo web_root; ?>index.php?q=search-function">Job By Function</a></li>
                   <li><a href="<?php echo web_root; ?>index.php?q=search-jobtitle">Job By Title</a></li>
                   <!--      <li><a href="#">Job for Women</a></li>
                              <li><a href="#">Job for Men</a></li> -->
                 </ul>
               </li>
               <li class="dropdown <?php if (isset($_GET['q'])) {
                                      if ($_GET['q'] == 'category') {
                                        echo 'active';
                                      } else {
                                        echo '';
                                      }
                                    }  ?>">
                 <a href="#" data-toggle="dropdown" class="dropdown-toggle">Popular Jobs </b></a>
                 <ul class="dropdown-menu">
                   <?php
                    $sql = "SELECT * FROM `tblcategory` LIMIT 10";
                    $mydb->setQuery($sql);
                    $cur = $mydb->loadResultList();

                    foreach ($cur as $result) {
                      # code...

                      if (isset($_GET['search'])) {
                        # code...
                        if ($result->CATEGORY == $_GET['search']) {
                          # code...
                          $viewresult = '<li class="active"><a href="' . web_root . 'index.php?q=category&search=' . $result->CATEGORY . '">' . $result->CATEGORY . ' Jobs</a></li>';
                        } else {
                          $viewresult = '<li><a href="' . web_root . 'index.php?q=category&search=' . $result->CATEGORY . '">' . $result->CATEGORY . ' Jobs</a></li>';
                        }
                      } else {
                        $viewresult = '<li><a href="' . web_root . 'index.php?q=category&search=' . $result->CATEGORY . '">' . $result->CATEGORY . ' Jobs</a></li>';
                      }

                      echo $viewresult;
                    }

                    ?>
                 </ul>
               </li>
               <li class="<?php if (isset($_GET['q'])) {
                            if ($_GET['q'] == 'company') {
                              echo 'active';
                            } else {
                              echo '';
                            }
                          }  ?>"><a href="<?php echo web_root; ?>index.php?q=company">Company</a></li>
               <li class="<?php if (isset($_GET['q'])) {
                            if ($_GET['q'] == 'hiring') {
                              echo 'active';
                            } else {
                              echo '';
                            }
                          } ?>"><a href="<?php echo web_root; ?>index.php?q=hiring">Hiring Now</a></li>
               <li class="<?php if (isset($_GET['q'])) {
                            if ($_GET['q'] == 'About') {
                              echo 'active';
                            } else {
                              echo '';
                            }
                          }  ?>"><a href="<?php echo web_root; ?>index.php?q=About">About Us</a></li>
               <li class="<?php if (isset($_GET['q'])) {
                            if ($_GET['q'] == 'Contact') {
                              echo 'active';
                            } else {
                              echo '';
                            }
                          }  ?>"><a href="<?php echo web_root; ?>index.php?q=Contact">Contact</a></li>
             </ul>
           </div>
         </div>
       </div>
     </header>
     <!-- end header -->

     <?php
      if (!isset($_SESSION['APPLICANTID'])) {
        include("login.php");
      }
      ?>
     <?php

      if (isset($_GET['q'])) {
        # code...
        echo '<section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="pageTitle">' . $title . '</h2>
                    </div>
                </div>
            </div>
            </section>';
      }


      require_once $content;

      ?>


     <footer>
       <div class="container">
         <div class="row">
           <div class="col-md-4 col-sm-4">
             <div class="widget">
               <h5 class="widgetheading">Our Contact</h5>
               <address>
                 <strong>UKRIDA</strong><br>
                 Jl. Tanjung Duren Raya No.4, RT.12/RW.2, Tj. Duren Utara, Kec. Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11470
               </address>
               <p>
                 <i class="icon-phone"></i> (021) 5666953 <br>
                 <i class="icon-envelope-alt"></i> ukrida@gmail.com
               </p>
             </div>
           </div>
           <div class="col-md-4 col-sm-4">
             <div class="widget">
               <h5 class="widgetheading">Quick Links</h5>
               <ul class="link-list">
                 <li><a href="<?php echo web_root; ?>index.php">Home</a></li>
                 <li><a href="<?php echo web_root; ?>index.php?q=company">Company</a></li>
                 <li><a href="<?php echo web_root; ?>index.php?q=hiring">Hiring</a></li>
                 <li><a href="<?php echo web_root; ?>index.php?q=About">About us</a></li>
                 <li><a href="<?php echo web_root; ?>index.php?q=Contact">Contact us</a></li>
               </ul>
             </div>
           </div>
           <div class="col-md-4 col-sm-4">
             <div class="widget">
               <h5 class="widgetheading">Latest posts</h5>
               <ul class="link-list">
                 <?php
                  $sql = "SELECT * FROM `tblcompany` c,`tbljob` j WHERE c.`COMPANYID`=j.`COMPANYID`   ORDER BY DATEPOSTED DESC LIMIT 3";
                  $mydb->setQuery($sql);
                  $cur = $mydb->loadResultList();


                  foreach ($cur as $result) {
                    echo ' <li><a href="' . web_root . 'index.php?q=viewjob&search=' . $result->JOBID . '">' . $result->COMPANYNAME . '/ ' . $result->OCCUPATIONTITLE . '</a></li>';
                  }
                  ?>
               </ul>
             </div>
           </div>
           <!--       <div class="col-md-3 col-sm-3">
        <div class="widget">
          <h5 class="widgetheading">Recent News</h5>
          <ul class="link-list">
            <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
            <li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
            <li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
          </ul>
        </div>
      </div> -->
         </div>
       </div>
       <div id="sub-footer">
         <div class="container">
           <div class="row">
             <div class="col-lg-6">
               <div class="copyright">
                 <p>
                   <span>&copy; 2023 PT. Studentlancer Crisanustama.
                 </p>
               </div>
             </div>
             <div class="col-lg-6">
               <ul class="social-network">
                 <div style="font-size: 20px;">
                   <a href="" class="me-3 text-reset">
                     <i class="fab fa-facebook-f"></i>
                   </a>
                   <a href="" class="me-3 text-reset">
                     <i class="fab fa-twitter"></i>
                   </a>
                   <a href="" class="me-3 text-reset">
                     <i class="fab fa-google"></i>
                   </a>
                   <a href="" class="me-3 text-reset">
                     <i class="fab fa-instagram"></i>
                   </a>
                   <a href="" class="me-3 text-reset">
                     <i class="fab fa-linkedin"></i>
                   </a>
                   <a href="" class="me-3 text-reset">
                     <i class="fab fa-github"></i>
                   </a>
               </ul>
             </div>
           </div>
         </div>
       </div>
     </footer>
   </div>
   <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
   <!-- javascript
    ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.js"></script>
   <script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.easing.1.3.js"></script>
   <script src="<?php echo web_root; ?>plugins/home-plugins/js/bootstrap.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>


   <script src="  https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

   <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>


   <script type="text/javascript" src="<?php echo web_root; ?>plugins/dataTables/dataTables.bootstrap.min.js"></script>
   <script src="<?php echo web_root; ?>plugins/datatables/jquery.dataTables.min.js"></script>

   <script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/bootstrap-datepicker.js" charset="UTF-8"></script>
   <script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
   <script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>

   <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.js"></script>
   <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
   <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>

   <script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.fancybox.pack.js"></script>
   <script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.fancybox-media.js"></script>
   <script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.flexslider.js"></script>
   <script src="<?php echo web_root; ?>plugins/home-plugins/js/animate.js"></script>


   <!-- Vendor Scripts -->
   <script src="<?php echo web_root; ?>plugins/home-plugins/js/modernizr.custom.js"></script>
   <script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.isotope.min.js"></script>
   <script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.magnific-popup.min.js"></script>
   <script src="<?php echo web_root; ?>plugins/home-plugins/js/animate.js"></script>
   <script src="<?php echo web_root; ?>plugins/home-plugins/js/custom.js"></script>
   <!-- <script src="<?php echo web_root; ?>plugins/paralax/paralax.js"></script>  -->
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>

   <script type="text/javascript">
     AOS.init();

     $(function() {
       $("#dash-table").DataTable();
       $('#dash-table2').DataTable({
         "paging": true,
         "lengthChange": false,
         "searching": false,
         "ordering": true,
         "info": true,
         "autoWidth": false
       });
     });


     $("#btnlogin").click(function() {
       var username = document.getElementById("user_email");
       var pass = document.getElementById("user_pass");

       // alert(username.value)
       // alert(pass.value)
       if (username.value == "" && pass.value == "") {
         $('#loginerrormessage').fadeOut();
         $('#loginerrormessage').fadeIn();
         $('#loginerrormessage').css({
           "background": "red",
           "color": "#fff",
           "padding": "5px;"
         });
         $("#loginerrormessage").html("Invalid Username and Password!");
         //  $("#loginerrormessage").css(function(){ 
         //   "background-color" : "red";
         // });
       } else {

         $.ajax({ //create an ajax request to load_page.php
           type: "POST",
           url: "process.php?action=login",
           dataType: "text", //expect html to be returned  
           data: {
             USERNAME: username.value,
             PASS: pass.value
           },
           success: function(data) {
             // alert(data);
             $('#loginerrormessage').fadeOut();
             $('#loginerrormessage').fadeIn();
             $('#loginerrormessage').css({
               "background": "red",
               "color": "#fff",
               "padding": "5px;"
             });
             $('#loginerrormessage').html(data);
           }
         });
       }
     });


     $('input[data-mask]').each(function() {
       var input = $(this);
       input.setMask(input.data('mask'));
     });


     $('#BIRTHDATE').inputmask({
       mask: "2/1/y",
       placeholder: "mm/dd/yyyy",
       alias: "date",
       hourFormat: "24"
     });
     $('#HIREDDATE').inputmask({
       mask: "2/1/y",
       placeholder: "mm/dd/yyyy",
       alias: "date",
       hourFormat: "24"
     });

     $('.date_picker').datetimepicker({
       format: 'mm/dd/yyyy',
       startDate: '01/01/1950',
       language: 'en',
       weekStart: 1,
       todayBtn: 1,
       autoclose: 1,
       todayHighlight: 1,
       startView: 2,
       minView: 2,
       forceParse: 0

     });

     $(document).ready(function() {

       $(".owl-carousel").owlCarousel({

         autoPlay: 3000,
         items: 3,
         itemsDesktop: [1199, 3],
         itemsDesktopSmall: [979, 3],
         center: true,
         nav: true,
         loop: true,
         responsive: {
           600: {
             items: 1
           }
         }

       });

     });

     $(document).ready(function() {
       $(".testimonial .indicators li").click(function() {
         var i = $(this).index();
         var targetElement = $(".testimonial .tabs li");
         targetElement.eq(i).addClass('active');
         targetElement.not(targetElement[i]).removeClass('active');
       });
       $(".testimonial .tabs li").click(function() {
         var targetElement = $(".testimonial .tabs li");
         targetElement.addClass('active');
         targetElement.not($(this)).removeClass('active');
       });
     });
     $(document).ready(function() {
       $(".slider .swiper-pagination span").each(function(i) {
         $(this).text(i + 1).prepend("0");
       });
     });
   </script>

 </body>

 </html>