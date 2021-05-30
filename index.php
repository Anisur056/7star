<?php include('server/config.php');

if(isset($_POST['submit'])){

  if(!empty($_POST['search'])){

  $search = $_POST['search'];
  $by = $_POST['by'];

  $show_data = mysqli_query($connect_db, "SELECT * FROM parcel_list WHERE $by LIKE '%$search%'");
}else{
  header('location: index.php');
}

}



?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>7 Star Cargo</title>
  <style type="text/css">
  .card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 20px; /* Added */
  }
  </style>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <link href="https://fonts.maateen.me/charukola-ultra-light/font.css" rel="stylesheet">

  <style>
  @import url('https://fonts.maateen.me/charukola-ultra-light/font.css');

  body {
    font-family: 'CharukolaUltraLight', Arial, sans-serif !important;
  }
  </style>
  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a href="index.php"><img src="logo.png"style="width:60px;height:60px;"/></a>
      
      <a class="navbar-brand" href="index.php" style="font-weight: bold;" >7 Star Cargo</a>
      <a class="navbar-brand" href="/server/index.php">Login</a>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
                        <div class="row">
                        <div class="col-xl-9 mx-auto">
                        <h1 class="mb-5">Know Your Parcel Information by Searching your Parcel CN Number. Have A Good Day..</h1>
                        </div>
                        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                        <form action="index.php" method="POST">

                        <div class="form-row">

                        <div class="form-group col-md-5">
                        <input type="text" class="form-control form-control-lg" name="search" placeholder="Search......">
                        </div>


                        <div class="form-group col-md-4">
                        <select class="form-control form-control-lg" name="by">
                        <option value="sl_no">By Refer Number</option>
                        <option value="id">By CN Number</option>
                        <option value="air_bl_no">By Air BL Number</option>
                        <option value="number">By Mobile Number</option>
                        </select>
                        </div>


                        <div class="form-group col-md-3">
                        <input type="submit" name="submit" class="form-control form-control-lg" value="Track Result">
                        </div>


                        </div>

                        </form>
                        </div>
                        </div>
    </div>

  </header>

  <!-- Search Result -->



<?php

if(isset($_POST['submit'])){

        echo '<h2 style="padding: 25px; text-align: center;">SEARCH RESULT OF : '.$search.'</h2>';

        echo '<div class="row" style="padding: 25px;">';


        while($all_data = mysqli_fetch_array($show_data)){

        $id = $all_data['id'];
        $d_status = $all_data['d_status'];
        $name = $all_data['name'];
        $sl_no = $all_data['sl_no'];
        $number = $all_data['number'];
        $air_bl_no = $all_data['air_bl_no'];


        echo '<div class="card" style="width: 26rem;">';
        echo '<div class="card-body">';

        echo
        '<h4 class="card-title">CN No : '.$id.'</h4>'.
        '<p class="card-text">'.$d_status.'</p>'.
        '<p class="card-text">'.$name.'</p>'.
        '<p class="card-text">Ref No : '.$sl_no.'</p>'.
        '<p class="card-text">'.$number.'</p>'.
        '<p class="card-text">Air Bl No : '.$air_bl_no.'</p>'.
        '<a href="#" class="btn btn-primary">Details</a>';

        echo "</div>";
        echo "</div>";
        }


        echo "</div>";
}
?>



<!-- Search Result -->

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-box m-auto text-primary"></i>
            </div>
            <h3>Door to Door</h3>
            <p class="lead mb-0">We Provide Door to Door Parcel Service All Over the Bangladesh!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-plane-departure m-auto text-primary"></i>
            </div>
            <h3>Quick Service</h3>
            <p class="lead mb-0">Send your Parcel in Quickest Way !</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="far fa-thumbs-up m-auto text-primary"></i>
            </div>
            <h3>Easy Send</h3>
            <p class="lead mb-0">Give Your Parcel to Your Frieds & Family Easy Way !</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-1.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>সন্দ্বীপে মালামাল পাঠানোর সুব্যবস্থা</h2>
          <p class="lead mb-0">আপনাদের পার্সেল পণ্য সন্দ্বীপে অতি দ্রুত পাঠানোর সু-ব্যবস্থা আছে। আমাদের পার্সেল সার্ভিস একটি নির্ভরযোগ্য প্রতিষ্ঠান।</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2.jpg');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>দ্রুত ডেলিভারি</h2>
          <p class="lead mb-0">১০ থেকে ১৫ দিনের মধ্যে আপনার কার্গো পার্সেল বাংলাদেশের সমগ্র অঞ্চলে নির্ভরতার সহিত পৌছানো হয়।</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-3.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>১০০% গ্যারান্টি কুইক সার্ভিস</h2>
          <p class="lead mb-0">বাংলাদেশের প্রতিটি জেলায় আপনার পরিবারের প্রয়োজনীয় মালামাল ১০০% গ্যারান্টি সহকারে অতি দ্রুত পৌছানো হয়।</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="testimonials text-center bg-light">
    <div class="container">
      <h2 class="mb-5">Our Air Cargo in U.A.E & Bangladesh.</h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-1.jpg" alt="">
            <h5>7 STAR CARGO & COURIER SERVICE</h5>
            <p class="font-weight-light mb-0">"BANGLADESH OFFFICE : 7 STAR CARGO & COURIER SERVICE"</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-2.jpg" alt="">
            <h5>7 STAR AIR CARGO</h5>
            <p class="font-weight-light mb-0">"UAE OFFICE : SANAIYA, STREET NO.2, AL AIN, U.A.E"</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-3.jpg" alt="">
            <h5>GREEN VALLEY AIR CARGO</h5>
            <p class="font-weight-light mb-0">"UAE OFFICE : BANI YAS, 7TH BUILDING, (NEAR MOSQUE & BRIDGE), ABU DHABI, U.A.E"</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4">Send Us SMS ... !</h2>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="Your Opinion">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Send</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="server/index.php">Login</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Our Parcel Service Area</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">Developed by · Anisur Rahman</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a target="_blank" href="https://www.facebook.com/greenvalleyaircargo">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <!--<li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>-->
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
