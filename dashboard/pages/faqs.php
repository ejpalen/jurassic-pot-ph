
<?php 
		$username ="root";
		$password="";
		$database="jurassicpot";
		if (isset($_POST['submit'])){
		$title1 = $_POST['title1'];
		$title2 = $_POST['title2'];
		$title3 = $_POST['title3'];
		$title4 = $_POST['title4'];
		$title5 = $_POST['title5'];
		$paragraph1 = $_POST['paragraph1'];
		$paragraph2 = $_POST['paragraph2'];
		$paragraph3 = $_POST['paragraph3'];
		$paragraph4 = $_POST['paragraph4'];
		$paragraph5 = $_POST['paragraph5'];
		
		$query1 = "UPDATE `faqs` SET 
		`title`='$title1' WHERE id=1";
		$query2 = "UPDATE `faqs` SET 
		`description`='$paragraph1' WHERE id=1";
		
		$query3 = "UPDATE `faqs` SET 
		`title`='$title2' WHERE id=2";
		$query4 = "UPDATE `faqs` SET 
		`description`='$paragraph2' WHERE id=2";
		
		$query5 = "UPDATE `faqs` SET 
		`title`='$title3' WHERE id=3";
		$query6 = "UPDATE `faqs` SET 
		`description`='$paragraph3' WHERE id=3";
		
		$query7 = "UPDATE `faqs` SET 
		`title`='$title4' WHERE id=4";
		$query8 = "UPDATE `faqs` SET 
		`description`='$paragraph4' WHERE id=4";
		
		$query9 = "UPDATE `faqs` SET 
		`title`='$title5' WHERE id=5";
		$query10 = "UPDATE `faqs` SET 
		`description`='$paragraph5' WHERE id=5";
		
		
		$result1 = @mysqli_query($conn, $query1); 
		$result2 = @mysqli_query($conn, $query2); 
		$result3 = @mysqli_query($conn, $query3); 
		$result4 = @mysqli_query($conn, $query4); 
		$result5 = @mysqli_query($conn, $query5); 
		$result6 = @mysqli_query($conn, $query6); 
		$result7 = @mysqli_query($conn, $query7);
	    $result8 = @mysqli_query($conn, $query8); 
		$result9 = @mysqli_query($conn, $query9); 
		$result10 = @mysqli_query($conn, $query10); 
		
		if (mysqli_query($conn, $query1)){
			header("Refresh:0");
		}
		
		if (mysqli_query($conn, $query2)){
			header("Refresh:0");
		}
		
		if (mysqli_query($conn, $query3)){
			header("Refresh:0");
		}
		
		if (mysqli_query($conn, $query4)){
			header("Refresh:0");
		}
		
		if (mysqli_query($conn, $query5)){
			header("Refresh:0");
		}
		
		if (mysqli_query($conn, $query6)){
			header("Refresh:0");
		}
		
		if (mysqli_query($conn, $query7)){
			header("Refresh:0");
		}
		
		if (mysqli_query($conn, $query8)){
			header("Refresh:0");
		}
		
		if (mysqli_query($conn, $query9)){
			header("Refresh:0");
		}
		
		if (mysqli_query($conn, $query10)){
			header("Refresh:0");
		}
	}
?>

<div class="w-100 flex">
    <div class="dashboardSide1">

    </div>
    <div class="dashboardSide2">
        <div class="homeTitle">
            FAQs
        </div>
		
		<div class="title">
            Title 1
        </div>
		
        <div class="w-100 dash-aboutus">
		<form action="index.php?page=pages/faqs.php" method="POST">
            <?php
                $query = "SELECT * FROM `faqs` where id = '1'";
                $row1 = mysqli_fetch_assoc(mysqli_query($conn, $query));
            ?>
            <textarea class="" row="1" cols="30"  name = "title1">
            <?= $row1['title']?>
            </textarea>
			
			<div class="paragraph-1">
				Paragraph 1
			</div>
			
			<?php
                $query = "SELECT * FROM `faqs` where id = '1'";
                $row2 = mysqli_fetch_assoc(mysqli_query($conn, $query));
            ?>
            <textarea class="aboutus-paragraph1"name = "paragraph1"  row="1" cols="30" >
            <?= $row2['description']?>
            </textarea>
			
			<div class="title">
				Title 2
			</div>
			
			<?php
                $query = "SELECT * FROM `faqs` where id = '2'";
                $row3 = mysqli_fetch_assoc(mysqli_query($conn, $query));
            ?>
            <textarea class="" row="1" cols="30" name = "title2">
            <?= $row3['title']?>
            </textarea>
			
			<div class="paragraph-1">
				Paragraph 2
			</div>
			
			<?php
                $query = "SELECT * FROM `faqs` where id = '2'";
                $row4 = mysqli_fetch_assoc(mysqli_query($conn, $query));
            ?>
            <textarea class="aboutus-paragraph1" row="10"  cols="30" name = "paragraph2">
            <?= $row4['description']?>
            </textarea>
			
			<div class="title">
				Title 3
			</div>
			
			<?php
                $query = "SELECT * FROM `faqs` where id = '3'";
                $row5 = mysqli_fetch_assoc(mysqli_query($conn, $query));
            ?>
            <textarea class="" row="1" cols="30" name = "title3">
            <?= $row5['title']?>
            </textarea>
			
			<div class="paragraph-1">
				Paragraph 3
			</div>
			
			<?php
                $query = "SELECT * FROM `faqs` where id = '3'";
                $row6 = mysqli_fetch_assoc(mysqli_query($conn, $query));
            ?>
            <textarea class="aboutus-paragraph1" row="10" cols="30" name = "paragraph3">
            <?= $row6['description']?>
            </textarea>
			
			<div class="title">
				Title 4
			</div>
			
			<?php
                $query = "SELECT * FROM `faqs` where id = '4'";
                $row7 = mysqli_fetch_assoc(mysqli_query($conn, $query));
            ?>
            <textarea class="" row="1" cols="30" name = "title4">
            <?= $row7['title']?>
            </textarea>
			
			<div class="paragraph-1">
				Paragraph 4
			</div>
			
			<?php
                $query = "SELECT * FROM `faqs` where id = '4'";
                $row8 = mysqli_fetch_assoc(mysqli_query($conn, $query));
            ?>
            <textarea class="aboutus-paragraph1" row="10"  cols="30"name = "paragraph4">
            <?= $row8['description']?>
            </textarea>
			
			<div class="title">
				Title 5
			</div>
			
			<?php
                $query = "SELECT * FROM `faqs` where id = '5'";
                $row9 = mysqli_fetch_assoc(mysqli_query($conn, $query));
            ?>
            <textarea class="" row="1" name = "title5">
            <?= $row9['title']?>
            </textarea>
			
			<div class="title">
				Paragraph 5
			</div>
			
			<?php
                $query = "SELECT * FROM `faqs` where id = '5'";
                $row10 = mysqli_fetch_assoc(mysqli_query($conn, $query));
            ?>
            <textarea class="" row="1" name = "paragraph5">
            <?= $row10['description']?>
            </textarea>
			
			
			
            
		<div class = "update-button">
			<input  id="submit" type="submit" name="submit" value="Update">
		</div>
    </div>
	

</div>