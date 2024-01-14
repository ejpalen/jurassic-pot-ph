<div class="w-100 flex dash-aboutus">
    <div class="dashboardSide1">

    </div>
    <div class="dashboardSide2">
        <div class="homeTitle">
            <h1>About Us</h1>
        </div>
		
		<div class="title">
            <p>Title</p>
        </div>
		
        <div class="w-100">
		<form action="pages/aboutUsupdate.php" method="POST">
            <?php
                $query = "SELECT * FROM `aboutus` where aboutus_ID = '1'";
                $row1 = mysqli_fetch_assoc(mysqli_query($conn, $query));
            ?>
            <textarea class="" name="title" cols="30" rows="1"><?= $row1['header']?></textarea>

			
			<div class="paragraph-1">
				<p>Paragraph 1</p>
			</div>
			
			<?php
                $query = "SELECT * FROM `aboutus` where aboutus_ID = '1'";
                $row2 = mysqli_fetch_assoc(mysqli_query($conn, $query));
            ?>
            <textarea name="paragraph1" class="aboutus-paragraph1" cols="30" rows="5"><?= $row1['description']?></textarea>
			
			<div class="title">
				<p>Header 1</p>
			</div>
			
			<?php
                $query = "SELECT * FROM `aboutus` where aboutus_ID = '2'";
                $row3 = mysqli_fetch_assoc(mysqli_query($conn, $query));
            ?>
            <textarea name="title1" class="" cols="30" rows="1" ><?= $row3['header']?></textarea>
			<div class="paragraph-1">
				<p>Paragraph 2</p>
			</div>
			
			<?php
                $query = "SELECT * FROM `aboutus` where aboutus_ID = '2'";
                $row4 = mysqli_fetch_assoc(mysqli_query($conn, $query));
            ?>
            <textarea  name="paragraph2" class="aboutus-paragraph1" cols="30" rows="5"><?= $row4['description']?></textarea>
			
			<div class="title">
				<p>Header 2</p>
			</div>
			
			<?php
                $query = "SELECT * FROM `aboutus` where aboutus_ID = '3'";
                $row5 = mysqli_fetch_assoc(mysqli_query($conn, $query));
            ?>
            <textarea  name="title2" class="" cols="30" rows="1"><?= $row5['header']?></textarea>
			
			<div class="title">
				<p>Paragraph 3</p>
			</div>
			
			<?php
                $query = "SELECT * FROM `aboutus` where aboutus_ID = '3'";
                $row6 = mysqli_fetch_assoc(mysqli_query($conn, $query));
            ?>
            <textarea name="paragraph3" class="" cols="30" rows="5"><?= $row6['description']?></textarea>
			
            
		<div class = "update-button">
			<input  id="submit" type="submit" name="submit" value="Update">
		</div>
		</form>
    </div>
	

</div>