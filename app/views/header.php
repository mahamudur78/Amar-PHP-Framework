<!DOCTYPE html>
<html>
<head>
	<title>Your Page Title</title>
	<style>
		/* CSS styling for the layout */
		.container {/*display: flex;flex-direction: column;*/min-height: 100vh;width: 1200px;margin: auto;}
		header{background-color:#333;color:#fff;padding:20px}
		header a{text-decoration: none; color: #fff;}
		footer{background-color:#333;color:#fff;padding:20px;margin-top:auto}
		.main-content {border: 3px solid #bfbfbf;margin-top: 5px;margin-bottom: 5px;}
		.main-content h3 {background: #333;display: block;margin-block-start: 0px;margin-block-end: 0px;color: #fff;padding: 15px;}
		.content{flex: 1;display: flex;}
		.post{flex:3;background-color:#f1f1f1;padding:20px}
		.sidebar{flex:1;background-color:#ddd;padding:20px}
		.sidebar h3 {border: 1px solid #333;padding: 5px;margin-block-end: 0px;}
		.sidebar ul{padding-inline-start:0px}
		.sidebar ul li {list-style: none;margin-left: 0;padding: 10px;background: #545454; border-bottom: 1px solid white;}
		.sidebar ul li:hover{background: #333;}
		.sidebar ul li a{text-decoration: none;color: #fff; display: block;}
		.read-more {text-decoration: none;}

		.post-content {margin-bottom: 45px;}
		.title {border-bottom: 1px dashed #333;}
		.title h2 {margin: 0;}
		.title h2 a {text-decoration: none;}
		.title p {margin: 0; padding: 5px 0;}
		.title p a {text-decoration: none;}
		.desc p {line-height: 24px; font-size: 18px; text-align: justify;}

	</style>
</head>
<body>
	<div class="container">
	<header>
    	<h1><a href="<?php echo BASE_URL ?>">My Website</a></h1>
	</header>
	<div class="main-content">
	