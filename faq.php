<?php 
include('assets/php/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('assets/php/head-meta.php');?>
    <link rel="stylesheet" href="assets/css/aboutus.css">
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>faqs</title>
    <style>
      .accordion a {
        text-decoration: none;
        padding-bottom: 4x;
        color: #228017;
        border-bottom: 1px solid #228017;
        transition: all 0.1s ease-in-out;
		border-radius: 10px;
      }

      .accordion a:hover {
        padding-bottom: 5px;
        color: black;
        border-bottom: 1px solid black;
        transition: all 0.1s ease-in-out;
		border-radius: 10px;
      }
      .accordion {
		font-family: 'Poppins';
        width: 100%;
        margin: 150px auto 40px;
		border-radius: 10px;
		padding-top: 5px;
      }

      .accordion .contentBx {
        width: 800px;
        position: relative;
        margin: 10px auto;
        background-color: var(--c1);
        border: 1px solid #F1E4DA;
		border-radius: 10px;
      }
      .accordion .contentBx .label {
        position: relative;
        padding: 20px;
        color: #4A4846;
        cursor: pointer;
        transition: 0.2s ease-in-out all;
		border-radius: 10px;
      }
      .accordion .contentBx .label::before {
        content: "+";
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
        transition: 0.2s ease-in-out all;
		border-radius: 10px;
      }

      .accordion .contentBx.active .label {
        padding: 20px 20px;
        transition: 0.2s ease-in-out all;
        font-weight: bold;
      }

      .accordion .contentBx.active .label::before {
        content: "_";
        margin-top: -2px;
        transition: 0.2s ease-in-out all;
      }

      .accordion .contentBx .content {
        position: relative;
        height: 0;
        padding: 0 20px;
        overflow: hidden;
        transition: 0.2s ease-in-out all;
        margin: 0;
      }
	  
	  
      .accordion .contentBx.active .content {
        height: 100%;
        transition: 0.2s ease-in-out all;
        margin: 0 0 20px;
      }

      .accordion h1 {
        margin: 0 0 40px;
        text-align: center;
      }

      @media only screen and (max-width: 749px) {
        .accordion .contentBx {
          max-width: 95%;
		  
        }
        .accordion h1 {
          margin: 20px 0;
          font-size: 32px;
        }
		
      }
    </style>
  </head>
  <body>
  <?php
    include 'assets/php/header.php';
    ?>
	
		<div class="accordion">
      <h1>Frequently Asked Questions</h1>

<div class="faq-wrapper">
  
<?php $try = mysqli_query($conn, "SELECT * FROM faqs");
$delay = 0;
			while($d = mysqli_fetch_array($try)){
?>

<div class="contentBx" data-aos="fade-up" data-aos-delay="<?php echo  $delay+= 100?>">
        <div class="label"><?=  $d['title'] ?></div>
        <div class="content">
          <p>
            <?= $d['description'] ?>
          </p>
        </div>
      </div>

<?php
}?>

</div>
    </div>
  </body>
  <script>
    const accordion = document.getElementsByClassName("contentBx");

for (let i = 0; i < accordion.length; i++) {
  accordion[i].addEventListener("click", function () {
    // Remove "active" class from other elements
    for (let j = 0; j < accordion.length; j++) {
      if (j !== i) {
        accordion[j].classList.remove("active");
      }
    }

    // Toggle "active" class on the clicked element
    this.classList.toggle("active");
  });
}

	
	window.addEventListener("scroll", function () {
				  let nav = this.document.querySelector("nav");
				  let windowPosition = window.scrollY > 10;

				  nav.classList.toggle("scrolling-active", windowPosition);
				});
	
  </script>
<script src="assets/js/script.js"></script>
<?php include 'assets/php/aos.php'?>
</html>