<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="clientPages.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<?php
require 'init.php';
require "navigationbar.php";
    echo $_SESSION["user"];
    echo $_SESSION["usertype"];


    ?>
<div class="container">
	<div class="well">
		<div class="row">
			<div class="col-sm-12">
				<h3>View Applicants</h3>
			</div>
		</div>
	</div>
</div>
<div class='container'>
	<div class='row'>


<div class='col-sm-2 sidenav' id='advLink'>
	<h4>Opportunities</h4>
	<ul class='nav nav-pills nav-stacked' id='opps'>
    <?php
        require 'functions.php';
        $result1 = get_opps();
        while( $row = $result1->fetch()){
            echo "<li><a>$row[0]</a></li>";
        };
    ?>
    </ul>
</div>

	
		<div class="col-sm-10 list" id="c">
				<div class='container-fluid'>
					<div class='row'>
						<div class='col-sm-12 title' >
							<h4 id ="title">Cick on an opportunity to see its applicants</h4>
						</div>
					</div>
				</div><br>

                <div id= try></div>
			</div>
	</div>
</div>

<script>
$(document).ready(function(){

    $("#opps li").click(function(){
        var title = $(this).text();
        $("#title").text(title);

        $.ajax({
            url : "get_applicants.php",
            type: 'GET',
            data: "name="+title,
            success: function(result){
                $("#c").empty();
                $("#c").append(result);
            }
        })

    });

});
</script>
</body>
</html>