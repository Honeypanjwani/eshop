<!doctype html>
<html>
<head>
<title>Website</title>
<link href="../resource/css/bootstrap.min.css" rel="stylesheet">


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Work', 8],
  ['Eat', 2],
  ['TV', 4],
  ['Gym', 2],
  ['Sleep', 8]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'My Average Day', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
<div class="container">
 <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="dashboard.php">Ecomarce</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
	 <!--<li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
      </li>-->
	</ul>
	<ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"></a>
		<ul class="dropdown-menu">
			<li class="dropdown-item">
				<a class="nav-link" href="account.php">Edit Profile</a>	
			</li>	
			<li class="dropdown-item">
				<a class="nav-link text-danger" href="logout.php">Logout&nbsp;<i class="fa fa-power-off"></i></a>	
			</li>	
		</ul>
      </li>
    </ul>
  </div>
</div>
</nav>

<div class="container-fluid">
<div class="row">

