<?php
    session_start();
    function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }

    $user='root';
    $pass='';
    $dbname='projecthub';
    $topic = 'abc';
            $conn = new mysqli('localhost',$user,$pass,$dbname) or die("Connection failed");
            $sql = "SELECT * FROM project" ;
            $result = $conn->query($sql);
            $row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html  lang="en">
<head>
	<title>ProjectHub | Welcome</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="jquery/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
<div class="header1">
	<div class="row">
		<div class="col-md-3" style="font-size: 25px;">ProjectHub</div>
		<div class="col-md-6"></div>
		<div class="col-md-2"><button id="add-project-click">Add Project</button></div>
		<div class="col-md-1"><a href="logout.php"><button style="color: white">Logout</button></a></div>

	</div>
</div>
<div class="row">
	<div class="col-md-2" id="sidebar">
		<div id="interest">
			<div class="row" id=""><a>Web designing</a></div>
			<div class="row" id=""><a>Cloud Computing</a></div>
			<div class="row" id=""><a>Big Data</a></div>
			<div class="row" id=""><a>Machine learning</a></div>
			<div class="row" id=""><a>Android</a></div>
			<div class="row" id=""><a>iOS Development</a></div>
			<div class="row" id=""><a>Matlab</a></div>
			<div class="row" id=""><a>Image Processing</a></div>
			<div class="row" id=""><a>Cryptography</a></div>
			<div class="row" id=""><a>Technical Papers</a></div>
			<div class="row" id=""><a>Aptitude</a></div>
			<div class="row" id=""><a>Java</a></div>
			<div class="row" id=""><a>C++</a></div>
			<div class="row" id=""><a>C</a></div>
			<div class="row" id=""><a>Python</a></div>
			<div class="row" id=""><a>PHP</a></div>
			<div class="row" id=""><a>JavaScript</a></div>
		</div>
	</div>
	<div class="col-md-4" id="posts">
		<a><div id="post1" >	
			<div class="row">
				<div class="col-md-10 protitle" id="pro-title">Project Title1</div>
				<div class="col-md-1" id="pro-status">Status</div>
			</div><hr>
			<div class="row description" id="pro-desc">
				Description in 180 words. I think this much description will be enough to get an idea about the project. If you need then we can increase the length but the div height will increase.
			</div>
		</div></a>

	<?php
	$index = 0;
	foreach ($row as $key => $value) {
		$index = $index + 1;
		// var_dump($row['proj_title']);
		printf("<a href=''><div id='post_".$index."'>");
		printf("<div class='row'>");
				printf("<div class='col-md-10 protitle' id='pro-title'>".$row['proj_title']."</div>");
				printf("<div class='col-md-1' id='pro-status'>".$row['status']."</div>");
			printf("</div><hr>");
			printf("<div class='row description' id='pro-desc'>");
			printf ($row['description']);
			printf("</div>");
		printf("</div></a>");
	}
	?>
	</div>

	<div class="col-md-6" id="full_details">
		<div id="add-project">
			<center><h2>Wow! Tell Us About Your Project</h2></center><br>
			<form action="createPost.php" method="POST">
				<input type="text" name="project-title" placeholder="Project Title" required><br><Br>
				<input type="text" name="project-topic" placeholder="Project Topic" required><br><Br>
				<textarea name="project-description" placeholder="Project Description" required class="inputclass3"></textarea><br><Br>
				<div class="row">
					<div class="col-md-6">
						<input type="radio" name="project-status" value="running" class="radio-button"><span class="radio-field">Running</span> 
					</div>
					<div class="col-md-6">
						<input type="radio" name="project-status" value="done" class="radio-button"><span class="radio-field">Done</span><br><Br>
					</div>
				</div>
				<input type="submit" value="Inspire The World With This Project">

			</form>
		</div>
		<div id="project-full-descp">
			<div class="row">
				<div class="col-md-10 protitle" id="full-pro-title">Project Title</div>
				<div class="col-md-1" id="full-pro-status">Status</div>
			</div><hr>
			<div class="row description" id="full-pro-desc">Full Description here</div><hr>
			<div class="row buttons">
				<button>Join</button>
				<button>Request</button>
			</div>
		</div>

	</div>
</div>

</body>
<script type="text/javascript">
$(document).ready(function(){
    $("#add-project-click").click(function(){
        $("#add-project").toggle(1000);
        $("#project-full-descp").toggle(1000);

    });
    $("#post1").click(function(){
    	$("#add-project").toggle(1000);
        $("#project-full-descp").toggle(1000);
        document.getElementById('full-pro-title').innerHTML = document.getElementById('pro-title').innerHTML;
        document.getElementById('full-pro-status').innerHTML = document.getElementById('pro-status').innerHTML;
        document.getElementById('full-pro-desc').innerHTML = document.getElementById('pro-desc').innerHTML;
    });
});

</script>
</html>