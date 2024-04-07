<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <link rel="stylesheet" href="style.css">

  
  <title>Loading</title>
</head>
<body>
  <?php include 'components/user_header.php'; ?>


  <section class="events" id="events">
    <div class="events-text">
      <h2>This Page Is Coming Soon...</h2>
      <!-- <h2>Upcoming Events</h2>
      <h4>Join us in our upcoming events to learn, network, and grow.</h4> -->
    </div>

    <div class="loading">
      <div class="bar">
        <div class="ball"></div>
      </div>
    </div>

    <div class="events-img">
      <a href="#"> loading . . .</a>
    </div>

  </section>




  <style>
    :root{
      --main-color:#6db4f7;
      --red:#e74c3c;
      --orange:#f39c12;
      --light-color:#888;
      --light-bg:#eee;
      --black:#2c3e50;
      --white:#fff;
      --border:.1rem solid rgba(0,0,0,.2);
    }

    body{
      background-color: #c9d6ff;
      background:linear-gradient(to right,#e2e2e2,#c9d6ff);
    }

    .header {
      background: rgb(233, 231, 231);
    }

    ::-webkit-scrollbar {
      width: 0;
    }

    ::-webkit-scrollbar-track {
      background: transparent;
    }

    ::-webkit-scrollbar-thumb {
      background: transparent;
    }


    .events {
      position: relative;
      width: 100%;
      height: 100vh;
      background-position: center;
    }

    .events-text {
      text-align: center;
      padding-top: 7rem;
    }

    .events-text h2 {
      font-size: 3.5rem;
      line-height: 1.1px;
      color: var(--black);
    }

    .loading {
      display: flex;
      justify-content: center;
      align-items: center;
      padding-top: 15rem;
    }

    .events-img {
      display: flex;
      justify-content: center;
      align-items: center;
      padding-top: 10rem;
    }

    .events-img a{
      max-width: 100%;
      height: auto; 
      border-radius: 10px;
      border: var(--main-color) solid 2px;
      color: var(--light-color);
      font-size: 2rem;
      padding: .2rem 1rem;
      width: 40rem;
    }

    /* Loader */
    .ball {
      position: relative;
      bottom: 40px;
      left: calc(100% - 20px);
      width: 40px;
      height: 40px;
      background: #98bdba;
      border-radius: 50%;
      animation: ball-move8234 3s ease-in-out 1s infinite alternate;
    }

    .ball::after {
      position: absolute;
      content: '';
      top: 25px;
      right: 5px;
      width: 5px;
      height: 5px;
      background: #000;
      border-radius: 50%;
    }

    .bar {
      width: 200px;
      height: 12.5px;
      background: #FFDAAF;
      border-radius: 30px;
      transform: rotate(-15deg);
      animation: up-down6123 3s ease-in-out 1s infinite alternate;
    }

    @keyframes up-down6123 {
      from {
        transform: rotate(-15deg);
      }

      to {
        transform: rotate(15deg);
      }
    }

    @keyframes ball-move8234 {
      from {
        left: calc(100% - 40px);
        transform: rotate(360deg);
      }

      to {
        left: calc(0% - 20px);
        transform: rotate(0deg);
      }
    }


  </style>

  <script src="script.js"></script>
</body>
</html>