<?php 
		include './sharable/connect.php';
		
		if (isset($_POST['submit'])){
		$title = $_POST['title'];
		$title1 = $_POST['title1'];
		$title2 = $_POST['title2'];
		$paragraph1 = $_POST['paragraph1'];
		$paragraph2 = $_POST['paragraph2'];
		$paragraph3 = $_POST['paragraph3'];
	
		$query = "UPDATE `aboutus` SET 
		`header`='$title' WHERE aboutus_ID=1";
		
		$query1 = "UPDATE `aboutus` SET 
		`description`='$paragraph1' WHERE aboutus_ID=1";
		
		$query2 = "UPDATE `aboutus` SET 
		`header`='$title1' WHERE aboutus_ID=2";
		
		$query3 = "UPDATE `aboutus` SET 
		`description`='$paragraph2' WHERE aboutus_ID=2";
		
		$query4 = "UPDATE `aboutus` SET 
		`header`='$title2' WHERE aboutus_ID=3";
		
		$query5 = "UPDATE `aboutus` SET 
		`description`='$paragraph3' WHERE aboutus_ID=3";
		
		
		$result = @mysqli_query($conn, $query); 
		$result1 = @mysqli_query($conn, $query1); 
		$result2 = @mysqli_query($conn, $query2); 
		$result3 = @mysqli_query($conn, $query3); 
		$result4 = @mysqli_query($conn, $query4); 
		$result5 = @mysqli_query($conn, $query5); 

	

		
			}

			header("Location: ../index.php?page=pages/aboutUs.php");

			
		?>