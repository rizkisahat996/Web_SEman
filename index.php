<?php
require 'vendor/autoload.php';
require_once __DIR__."/html_tag_helpers.php";




    \EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
    \EasyRdf\RdfNamespace::set('rdfs','http://www.w3.org/2000/01/rdf-schema#');
    \EasyRdf\RdfNamespace::set('dbo', 'http://dbpedia.org/ontology/');
    \EasyRdf\RdfNamespace::set('dbp', 'http://dbpedia.org/property/');
    \EasyRdf\RdfNamespace::setDefault('og');


$sparql_jena = new \EasyRdf\Sparql\Client('http://localhost:3030/sukarno/sparql');

$sparql_query = 'select ?synopsis ?child1  where{
  ?m dbo:child1 ?child1;
     rdfs:synopsis ?synopsis}';

  $result = $sparql_jena->query($sparql_query);

  foreach($result as $row){
    echo '<br>';
    echo '<b>';
    echo $row -> child1;
    echo '</b>';
    echo '<br/>';
    echo '<b>';
    echo $row -> synopsis;
    echo '</b>';
    echo '<br/>';
    }

    $uri_rdf = 'http://localhost/Web_SEman/w.rdf';
    $data = \EasyRdf\Graph::newAndLoad($uri_rdf);
    $pe = $data->primaryTopic();

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Car Clean</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesoeet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!--header section start -->
      <div class="header_section">
         <div class="container-fluid">
            <div class="costum_header">
               <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
               <div class="contact_menu">
                  <ul>
                     <li><img src="images/call-icon.png" class="padding_right_10"><a href="#">Call: +01 1234567890</a></li>
                     <li><img src="images/mail-icon.png" class="padding_right_10"><a href="#">Email: demo@gmail.com</a></li>
                     <li><img src="images/map-icon.png" class="padding_right_10"><a href="#">Location: lorm ipusm</a></li>
                  </ul>
               </div>
               <div class="menu_text">
                  <div id="myNav" class="overlay">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <div class="overlay-content">
                        <a href="index.html">Home</a>
                        <a href="services.html">Services</a>
                        <a href="providing.html">Providing</a>
                        <a href="choose.html">Choose</a>
                     </div>
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png" class="toggle_menu"></span>
               </div>
            </div>
         </div>
      </div>
      <!-- header section end -->
      <!-- banner section start -->
      <div class="banner_section layout_padding">
         <div class="container">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="banner_taital">
                              <h1 class="banner_taital"><?= $pe->get('foaf:name') ?></h1>
                              <p class="banner_text">There are many variations of passages of Lorem Ipsum available</p>
                           </div>
                           <div class="btn_main">
                              <div class="quote_bt active"><a href="#">Get A Quote</a></div>
                              <div class="contact_bt"><a href="#">Contact Us</a></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                      <div>
                      <?php
                      $doc = \EasyRdf\Graph::newAndLoad('https://dbpedia.org/page/Sukarno');
                        if ($doc->image) {
                          echo content_tag('img', null, array('src'=>$doc->image, 'class'=>'image'));
                        }
                        ?>
                      </div>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
               <i class="fa fa-arrow-left" aria-hidden="true"></i>
               </a>
               <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
               <i class="fa fa-arrow-right" aria-hidden="true"></i>
               </a>
            </div>
         </div>
      </div>
      <!-- banner section end -->
      <!-- services section start -->
      <div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Our <span style="color: #0c426e">Services</span></h1>
            <p class="services_text">t is a long established fact that a reader will be distracted by the readable content of a page when looking </p>
            <div class="services_section_2 layout_padding">
               <div class="row">
                  <div class="col-md-4 padding_right_0">
                     <div class="services_box">
                        <h4 class="express_text">Express Exterior</h4>
                        <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed </p>
                        <div class="seemore_bt"><a href="#">See More</a></div>
                        <div><img src="images/img-2.png" class="image_1"></div>
                     </div>
                  </div>
                  <div class="col-md-4 padding_0">
                     <div class="services_box">
                        <div><img src="images/img-1.png" class="image_1"></div>
                        <h4 class="express_text">Auto Detailing</h4>
                        <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed </p>
                        <div class="seemore_bt"><a href="#">See More</a></div>
                     </div>
                  </div>
                  <div class="col-md-4 padding_left_0">
                     <div class="services_box">
                        <h4 class="express_text">Full Service Car Wash</h4>
                        <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed </p>
                        <div class="seemore_bt"><a href="#">See More</a></div>
                        <div><img src="images/img-3.png" class="image_1"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- services section end -->
      <!-- providing section start -->
      <div class="providing_section layout_padding">
         <div class="container">
            <h1 class="services_taital">We’re Providing Best <span style="color: #0c426e">Quality Service</span></h1>
         </div>
      </div>
      <div class="providing_section_2 layout_padding">
         <div class="container">
            <h2 class="clean_text">Clean  And  Quality</h2>
            <p class="ipsum_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed </p>
            <div class="quote_bt_1"><a href="#">Get A Quote</a></div>
         </div>
      </div>
      <!-- providing section end -->
      <!-- choose section start -->
      <div class="choose_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Why <span style="color: #0c426e">Choose Us?</span></h1>
            <div class="choose_section_2 layout_padding">
               <div class="row">
                  <div class="col-md-4">
                     <div class="choose_box">
                        <div class="number_1">
                           <h4 class="number_text">01</h4>
                           <h4 class="trusted_text">Trusted Services</h4>
                        </div>
                        <p class="dummy_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The  </p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="choose_box">
                        <div class="number_1">
                           <h4 class="number_text">02</h4>
                           <h4 class="trusted_text">Talented Workers</h4>
                        </div>
                        <p class="dummy_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The  </p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="choose_box">
                        <div class="number_1">
                           <h4 class="number_text">03</h4>
                           <h4 class="trusted_text">Organic Products</h4>
                        </div>
                        <p class="dummy_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The  </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- choose section end -->
      <!-- testimonial section start -->
      <div class="testimonial_section layout_padding">
         <div class="container">
            <h1 class="testimonial_taital">Testimonial</h1>
            <div class="testimonial_section_2">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="testimonial_box">
                           <div class="tectimonial_mail">
                              <div class="client_image_section">
                                 <img src="images/client-img.png" class="client_img">
                              </div>
                              <div class="client_text_section">
                                 <p class="testimonial_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that</p>
                                 <h4 class="joech_text">Joech</h4>
                                 <p class="customer_text">Customer</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="testimonial_box">
                           <div class="tectimonial_mail">
                              <div class="client_image_section">
                                 <img src="images/client-img.png" class="client_img">
                              </div>
                              <div class="client_text_section">
                                 <p class="testimonial_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that</p>
                                 <h4 class="joech_text">Joech</h4>
                                 <p class="customer_text">Customer</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="testimonial_box">
                           <div class="tectimonial_mail">
                              <div class="client_image_section">
                                 <img src="images/client-img.png" class="client_img">
                              </div>
                              <div class="client_text_section">
                                 <p class="testimonial_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that</p>
                                 <h4 class="joech_text">Joech</h4>
                                 <p class="customer_text">Customer</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-arrow-right" aria-hidden="true"></i>
                  </a>
               </div>
            </div>
         </div>
      </div>
      <!-- testimonial section end -->
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-sm-6">
                  <h2 class="useful_text">Contact Us</h2>
                  <div class="location_text"><img src="images/map-icon1.png"><a href="#"><span class="padding_left_15">Location</span></a></div>
                  <div class="location_text"><img src="images/call-icon1.png"><a href="#"><span class="padding_left_15">(+71) 8522369417</span></a></div>
                  <div class="location_text"><img src="images/mail-icon1.png"><a href="#"><span class="padding_left_15">demo@gmail.com</span></a></div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <h2 class="useful_text">Useful link </h2>
                  <div class="footer_menu">
                     <ul>
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="service.html">Service</a></li>
                        <li><a href="blog.html">Blog</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <h2 class="useful_text">Opening Time</h2>
                  <p class="footer_text">Mon : 07;00am   to  09:00 pm</p>
                  <p class="footer_text">Mon : 07;00am   to  09:00 pm</p>
                  <p class="footer_text">Mon : 07;00am   to  09:00 pm</p>
               </div>
               <div class="col-sm-6 col-lg-3">
                  <h1 class="useful_text">Newsletter</h1>
                  <input type="text" class="Enter_text" placeholder="Enter Your Email" name="Enter Your Email">
                  <div class="subscribe_bt"><a href="#">Subscribe</a></div>
               </div>
            </div>
            <div class="social_icon">
               <div id="social">
                  <a class="facebookBtn smGlobalBtn" href="#"></a>
                  <a class="twitterBtn smGlobalBtn" href="#"></a>
                  <a class="instagramBtn smGlobalBtn" href="#"></a>
                  <a class="linkedinBtn smGlobalBtn" href="#"></a>
               </div>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">Copyright 2020 All Rights Reserved. Design by<a href="https://html.design"> Free  html Templates</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
            });
            
            $(".zoom").hover(function(){
            
            $(this).addClass('transition');
            }, function(){
            
            $(this).removeClass('transition');
            });
            });
            
      </script> 
      <script>
         function openNav() {
         document.getElementById("myNav").style.width = "100%";
         }
         
         function closeNav() {
         document.getElementById("myNav").style.width = "0%";
         }
      </script>   
   </body>
</html>