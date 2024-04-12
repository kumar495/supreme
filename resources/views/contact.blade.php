@include('header')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <!-- Bootstrap CSS -->
  <!-- Custom CSS -->
  <style>
    /* Custom styles */
    .contact-section {
      padding: 80px 0;
    }
    .contact-form {
      background-color: #f8f9fa;
      padding: 40px;
      border-radius: 10px;
    }
    .map-container {
      position: relative;
      overflow: hidden;
      margin-top: 30px;
    }
    .map {
      width: 100%;
      height: 400px; /* adjust the height as needed */
    }
    .contact-info {
      margin-top: 30px;
    }
    .contact-info img {
      width: 100%;
      height: auto;
      border-radius: 10px;
    }
  
    .header-image {
      width: 100%;
      height: auto;
      border-radius: 10px;
    }
  </style>
</head>
<body>
<img src="{{ asset('images/contact1.png') }}" alt="Placeholder Image" class="mb-4 rounded img-fluid header-image">

<section class="contact-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      </div>
      <div class="col-md-6">
        <!-- Contact form -->
        <div class="contact-form">
          <h2>Contact Us</h2>
          @include('inquery.create');

        </div>
      </div>
      <div class="col-md-6">
        <!-- Map -->
        <div class="map-container">
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.992392314694!2d85.32402531506216!3d27.717245982791085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19e92aaaabc7%3A0xf975f5da10de033e!2sKathmandu%2C%20Nepal!5e0!3m2!1sen!2sca!4v1649335558726!5m2!1sen!2sca" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="col-md-6">
  <div class="contact-info">
    <h3>Email</h3>
    <p>info@supremehimalayas.com</p>
  </div>
</div>

<div class="col-md-6">
  <div class="contact-info">
    <h3>Phone</h3>
    <p>+9779823477992</p>
  </div>
</div>

<div class="col-md-6">
  <div class="contact-info">
    <h3>Location</h3>
    <p>Krishna Mandir, Lalitpur 44705</p>
  </div>
</div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
@include('footer')

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap JS -->


</body>
</html>
