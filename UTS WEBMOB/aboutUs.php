<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Roboto', sans-serif;
    }

    .about-us {
      background: #9f9f9f;
      color: black;
      padding: 60px 0;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      position: relative;
    }

    .carousel-item {
      height: 700px;
      position: relative;
    }

    .carousel-item img {
      width: 400px;
      height: 500px;
      object-fit: cover;
      object-position: center;
      border: 5px solid #000;
      border-radius: 50px; /* More rounded corners */
    }

    .carousel-caption {
      position: absolute;
      top: 80%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: #fff;
      animation: fadeIn 1.5s;
    }

    .carousel-caption h3,
    .carousel-caption p {
      background: rgba(0, 0, 0, 0.6);
      padding: 10px 15px;
      border-radius: 10px;
    }

    .nav {
      position: absolute;
      top: 50%;
      left: 20px; /* Position left arrow */
      transform: translateY(-50%);
      z-index: 1000;
    }

    .nav .btn {
      background-color: rgba(255, 255, 255, 0.7);
      color: rgba(0, 0, 0, 0.8);
      border: 2px solid rgba(0, 0, 0, 0.6);
      width: 50px;
      height: 50px;
      border-radius: 50%; /* Make the button round */
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 10px;
    }

    .nav .btn:hover {
      background-color: rgba(255, 255, 255, 0.9);
      color: rgba(0, 0, 0, 1);
    }

    .nav .btn ion-icon {
      font-size: 24px;
    }

    .nav.right {
      left: auto;
      right: 20px; /* Position right arrow */
    }

    .thumbnail-container {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-top: 20px;
    }

    .thumbnail {
      width: 125px;
      height: 200px;
      cursor: pointer;
      transition: transform 0.3s;
      border: 4px solid #000; /* Border color and thickness */
      border-radius: 20px; /* More rounded corners */
      position: relative; /* Positioning for pseudo-element */
      overflow: hidden; /* Ensures no overflow */
    }

    .thumbnail img {
      width: 100%;
      height: 100%;
      border-radius: 20px; /* Match border radius */
      object-fit: cover; /* Ensures the image covers the thumbnail */
    }

    .thumbnail:hover {
      transform: scale(1.1);
      border-color: #ffffff;
    }

    .thumbnail:before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      border-radius: 20px; /* Match border radius */
      border: 4px solid rgba(255, 255, 255, 0.6); /* Optional: adds a soft outer glow */
      z-index: -1; /* Behind the image */
      transition: border-color 0.3s; /* Transition for hover effect */
    }

    .thumbnail:hover:before {
      border-color: #007bff; /* Change on hover */
    }

    .back-button {
      display: block;
      margin: 20px auto; /* Center the button */
      background-color: #ffffff;
      color: #007bff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 16px;
      transition: background-color 0.3s;
    }

    .back-button:hover {
      background-color: #007bff;
      color: white;
    }

    footer {
      background-color: #343a40;
      color: white;
      text-align: center;
      padding: 20px 0;
    }

    .footer-links a {
      color: #ffffff;
      margin: 0 15px;
      text-decoration: none;
      transition: color 0.3s;
    }

    .footer-links a:hover {
      color: #007bff;
    }

    .table th{
      background-color: #001c2d;
      color: #fff;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
  </style>
</head>
<body>
  <section class="about-us py-5">
    <div class="container text-center">
      <h1 class="mb-4"><b>About Us</b></h1>

      <!-- Carousel -->
      <div id="teamCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="image/Ryan.jpeg" alt="Team Member 1">
            <div class="carousel-caption">
              <h3>Ryan Eryento</h3>
              <p>32230019</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="image/Joel.jpeg" alt="Team Member 2">
            <div class="carousel-caption">
              <h3>Joel Prasetya Pradipta</h3>
              <p>32230020</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="image/Nathasia.jpeg" alt="Team Member 3">
            <div class="carousel-caption">
              <h3>Nathasia Oktarina Riyani</h3>
              <p>32230025</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="image/Melvin.jpeg" alt="Team Member 4">
            <div class="carousel-caption">
              <h3>Melvin Wijaya Susanto</h3>
              <p>32230029</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="image/Caryn.jpeg" alt="Team Member 5">
            <div class="carousel-caption">
              <h3>Caryn Caroline</h3>
              <p>32230042</p>
            </div>
          </div>
        </div>

        <!-- Thumbnail Navigation -->
        <div class="thumbnail-container">
          <div class="thumbnail" data-target="#teamCarousel" data-slide-to="0">
            <img src="image/Ryan.jpeg" alt="Thumbnail 1">
          </div>
          <div class="thumbnail" data-target="#teamCarousel" data-slide-to="1">
            <img src="image/Joel.jpeg" alt="Thumbnail 2">
          </div>
          <div class="thumbnail" data-target="#teamCarousel" data-slide-to="2">
            <img src="image/Nathasia.jpeg" alt="Thumbnail 3">
          </div>
          <div class="thumbnail" data-target="#teamCarousel" data-slide-to="3">
            <img src="image/Melvin.jpeg" alt="Thumbnail 4">
          </div>
          <div class="thumbnail" data-target="#teamCarousel" data-slide-to="4">
            <img src="image/Caryn.jpeg" alt="Thumbnail 5">
          </div>
        </div>
      </div>

      <div class="table-responsive mt-5 animate-slideInDown">
        <table class="table table-striped" style="background-color: #fff">
          <thead>
            <tr>
              <th>Ryan Eryento -<br> 32230019</th>
              <th>Joel Prasetya Pradipta - 32230020</th>
              <th>Nathasia Oktarina Riyani - 32230025</th>
              <th>Melvin Wijaya Susanto - 32230029</th>
              <th>Caryn Caroline - 32230042</th>
            </tr>
          </thead>
          <tbody>
                <tr>
                  <td>Membuat dan mendesain Sign in</td>
                  <td>Database Dashboard </td>
                  <td>Membuat Sign in </td>
                  <td>Data Base dashboard </td>
                  <td>Desain About Us (Coloring)</td>
                </tr>

                <tr>
                  <td>Membuat dan mendesain Sign up</td>
                  <td>Desain About Us (Carousel, Button, img)</td>
                  <td>Membuat Sign up</td>
                  <td>About Us</td>
                  <td>Desain Input</td>
                </tr>

                <tr>
                  <td>Membuat database user, pegawai</td>
                  <td>Desain Card Dashboard</td>
                  <td>Desain Sign In</td>
                  <td>Desain About Us</td>
                  <td>Desain Main Dashboard</td>
                </tr>

                <tr>
                  <td>Membuat dan mendesain Dashboard bagian chart pegawai, jenis kelamin</td>
                  <td>Database Form
                  Input</td>
                  <td>Desain Sign up</td>
                  <td>Membuat Form
                  update</td>
                  <td>Data Base
                  Delete</td>
                </tr>

                <tr>
                  <td>Membuat form
                  input pegawai</td>
                  <td>Design Sidebar</td>
                  <td>Desain Dashboard</td>
                  <td>Database update, delete</td>
                  <td>Desain Sign Up</td>
                </tr>

                <tr>
                  <td>Membuat GetData</td>
                  <td>Design Form Update</td>
                  <td>

                  </td>
                  <td>Chart Salary</td>
                  <td>Membuat form input</td>
                </tr>

          </tbody>
        </table>
      </div>


      <!-- Back to Dashboard Button -->
      <button class="back-button" onclick="window.location.href='dashboard.php'">Back to Dashboard</button>
    </div>

    <nav class='nav'>
      <button class='btn' data-target="#teamCarousel" data-slide="prev">
        <ion-icon name="chevron-back-outline"></ion-icon>
      </button>
    </nav>
    <nav class='nav right'>
      <button class='btn' data-target="#teamCarousel" data-slide="next">
        <ion-icon name="chevron-forward-outline"></ion-icon>
      </button>
    </nav>
  </section>

  <footer>
    <div class="container">
      <p>&copy; Worker Management Data. All Rights Reserved.</p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
