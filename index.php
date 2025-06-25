<?php
session_start();
include('databasecon.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $NAME = $_POST["Name"];
    $PHONE = $_POST["phone"];
    $EMAIL = $_POST["email"];
    $SERVICE = $_POST["service"];
    $DESCRIPTION = $_POST["description"];

    $sql = "INSERT INTO `orders` (`Name`, `phone no.`, `email`, `service_id`, `description`) 
            VALUES ('$NAME', '$PHONE', '$EMAIL', '$SERVICE', '$DESCRIPTION')";

    if (mysqli_query($con, $sql)) {
        // ✅ Email Configuration
        $to = $EMAIL;
        $subject = "Your Order with Frumes Agency";
        $message = "
        Dear $NAME,

        Thank you for placing your order with us!
        We will get back to you shortly.

        Regards,
        Frumes Team
        ";
        $headers = "From: frumesmedia@gmail.com\r\n";

        // ✅ Send the email
        mail($to, $subject, $message, $headers);

        $_SESSION['success'] = "Order placed!";
    } else {
        $_SESSION['error'] = "Error placing your order.";
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
  $sql_sv = "SELECT * FROM services";
  $res_sv = mysqli_query($con, $sql_sv) OR die("querry error!");
?>
<?php
    include("header.php");
?>
<?php if(isset($_SESSION['success']) || isset($_SESSION['error'])): ?>
  <div class="position-fixed start-50 translate-middle-x mt-4" style="top: 70px; z-index: 1055;">
    <div id="alertBox" class="alert d-flex 
      <?php echo isset($_SESSION['success']) ? 'alert-success' : 'alert-danger'; ?> 
      alert-dismissible fade show px-4 py-2 shadow small" role="alert" style="min-width: 300px; max-width: 600px;">
      
      <div class="me-3 mb-0">
        <?php 
          echo $_SESSION['success'] ?? $_SESSION['error']; 
          unset($_SESSION['success'], $_SESSION['error']); 
        ?>
      </div>

    </div>
  </div>
<?php endif; ?>



  <!-- Hero Section -->
   <section id="home">
        <div class="hero">
                <div class="hero-content">
                    <h1>Hello, we are <strong>Frumes</strong></h1><br>
                    <p class="lead">A MEDIA MARKETING AGENCY</p><br>
                    <p>We help forward-thinking brands unlock the potential of media.</p><br>
                    <a href="#order" class="btn btn-light text-primary">Place Your Order</a>
                </div>
                <!-- <img src="/GPT/Artboard22.jpg" alt="Rocket" class="rocket-img"> -->
        </div>
  <section class="py-5 section" id="testimonials">
  <div class="container text-center">
    <h2 class="mb-5">Testimonials</h2>

    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php 
          $test_sql = "SELECT * FROM `testimonials`";
          $result_testi = mysqli_query($con, $test_sql);
          $isFirst = true;
          if (mysqli_num_rows($result_testi) > 0) {
            while ($row = mysqli_fetch_assoc($result_testi)) {
        ?>
        <div class="carousel-item <?php echo $isFirst ? 'active' : ''; ?>">
          <div class="d-flex flex-column align-items-center">
            <img src="<?php echo $row['t_img'] ?>" class="rounded-circle mb-3" alt="Client" width="100" height="100">
            <p class="w-75 mx-auto"><?php echo $row['feedback'] ?></p>
            <h5 class="mt-2"><?php echo $row['t_name'] ?></h5>
          </div>
        </div>
        <?php 
              $isFirst = false;
            }
          } 
        ?>
      </div>

      <!-- Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>
</section>

<!-- Our Services -->
  <div class="section" id="services">
  <div class="container">
    <h2 class="section-title text-center mb-5">OUR SERVICES</h2>
    <div class="row justify-content-center">
    <?php if(mysqli_num_rows($res_sv) > 0){ 
      while($row = mysqli_fetch_assoc($res_sv)){
    ?>  
      <div class="col-6 col-md-3 icon-box position-relative">
        <i class="<?php echo $row['s_icon']; ?>"></i>
        <h5><?php echo $row['s_name']; ?></h5>
        <div class="service-detail">
          <?php echo $row['s_para']; ?>
        </div>
      </div>
    <?php } 
          }
    ?>   
      </div>
    </div>
  </div>

  <section class="py-5 section" id="brands">
  <div class="container text-center mb-4">
    <h2 class="mb-4">Our Trusted Brands</h2>

    <div id="brandCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000" data-bs-wrap="true">
      <div class="carousel-inner">
          <?php 

            $bsql = "SELECT * FROM `brands`";
            $first = true;
            $bres = mysqli_query($con,$bsql);
            while($brow = mysqli_fetch_assoc($bres)){

            
          ?>
            <div class="carousel-item <?php if($first){ echo 'active'; $first = false; } ?>">
              <img src="<?php echo $brow['b_logo']; ?>" class="brand-logo mx-auto d-block" alt="Microsoft">
            </div>
            <?php } ?>     
      </div>
      <!-- Carousel Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#brandCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#brandCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>
</section>



  <!-- Contact Form -->
  <div class="form-section" id="order">
    <div class="container">
      <h2 class="section-title text-dark">PLACE YOUR ORDER</h2>
      <form class="row g-3 justify-content-center" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="col-4" >
          <input type="text" name="Name" class="form-control" placeholder="Name" required>
        </div>
        <div class="col-4">
          <input type="text" name="phone" class="form-control" placeholder="phone no." required>
        </div>
        <div class="col-8">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        
        <div class="col-8">
            <select class="form-select" name="service" required>
                <option value="">Select a Service</option>
                <?php $res_sv = mysqli_query($con, $sql_sv) OR die("querry error!");
                      while($row = mysqli_fetch_assoc($res_sv)){ 
                ?>
                  <option value="<?php echo $row['s_id'];?>">
                    <?php echo $row['s_name'];?>
                  </option>
                <?php } ?>  
              </select>
        </div>

        <div class="col-8">
          <textarea class="form-control" name="description" rows="4" placeholder="Explain About Your Project"></textarea>
        </div>
        <div class="col-8">
          <button type="submit" class="btn btn-primary btn-color px-5">Order</button>
        </div>
      </form>
    </div>
  </div>
<!-- practice -->

  <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-3">Connect with us</p>
            <div class="d-flex justify-content-center gap-4 mb-3">
            <a href="https://www.linkedin.com/" target="_blank" class="text-white fs-4">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="mailto:info@frumes.com" class="text-white fs-4">
                <i class="fas fa-envelope"></i>
            </a>
            <a href="https://www.instagram.com/" target="_blank" class="text-white fs-4">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://twitter.com/" target="_blank" class="text-white fs-4">
                <i class="fab fa-twitter"></i>
            </a>
            </div>
            <p class="mb-0">&copy; 2025 Frumes. All rights reserved.</p>
        </div>
  </footer>

  <script src="/GPT/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
