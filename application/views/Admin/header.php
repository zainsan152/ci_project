<!doctype html>
<html lang="en">
<head>
	<!--<link rel="stylesheet" href="<?/*= base_url("Assets/css/bootstrap.min.css") */?>">-->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Admin Panel</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<a class="navbar-brand" href="#" style="color:#fafcff;">Admin Panel</a>
	

	<?php 
		if($this->session->userdata('id'))
		{
	?>

	<li><a href="<?= base_url('admin/logout');?>" class="btn btn-danger" style="">Logout</a></li>

	<?php

}
?>

</nav>

