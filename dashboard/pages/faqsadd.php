<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jurassicpot";


$conn = new mysqli($servername, $username, $password, $dbname);


	if(isset($_POST['submit'])){
		$title=$_POST['title'];
		$paragraph=$_POST['description'];
		
		$query="INSERT INTO faqs (title,description)VALUES('$title', '$paragraph')";
		$data=mysqli_query($conn,$query);
	}


?>

<div class="w-100 flex">
    <div class="dashboardSide1">

    </div>
    <div class="dashboardSide2">
        <div class="homeTitle">
            FAQs
        </div>
		
		
		
        <div class="w-100">
		<form method="POST">

			<div class="title">
				Title 
			</div>
				<textarea class="aboutUsCOnt" row="1" name = "title">
				
				</textarea>
				
				
			<div class="paragraph-1">
				Paragraph 
			</div>
				 <textarea class="aboutus-paragraph1" name = "description">
				
				</textarea>

	
    </div>
	<div class = "update-button">
			<input  id="submit" type="submit" name="submit" value="Save">
		</div>
	
</div>