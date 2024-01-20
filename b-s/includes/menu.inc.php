<ul>
			<li class="current_page_item"><a href="index.php">Home</a></li>
			<!--<li><a href="register.php">Register</a></li>-->
			<?php 
					if(isset($_SESSION['status']))
					{
						
						echo '<li><a href="logout.php">Logout</a></li>';
						
					}
					else
					{
						echo '<li><a href="register.php">Register</a></li>';
					}
			?>
			
			
			
			
			
			
			
			
</ul>
<ul>
			<?php 
					if(isset($_SESSION['status']))
					{
						
						echo '<li><a href="aboutus.php">About Us</a></li>';
						
					}
					else
					{
						echo '<li><a href="aboutus.php">About Us</a></li>';
					}
			?>
						
</ul>
<ul>
			<?php 
					if(isset($_SESSION['status']))
					{
						
						echo '<li><a href="contact.php">Contact</a></li>';
						
					}
					else
					{
						echo '<li><a href="contact.php"></a></li>';
					}
			?>
						
</ul>