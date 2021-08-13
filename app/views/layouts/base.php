<!DOCTYPE html>
<html lang="en">

<head>
	<title>TeachAssistent - <?=$title?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Elearn project">
	<meta name="viewport" content="TeachAssistent Project">
	<link rel="stylesheet" href="<?=self::RES?>/styles/bootstrap4/bootstrap.min.css">
	<link rel="stylesheet" href="<?=self::RES?>/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=self::RES?>/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" href="<?=self::RES?>/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" href="<?=self::RES?>/plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" href="<?=self::RES?>/plugins/video-js/video-js.css">
	<link rel="stylesheet" href="<?=self::RES?>/styles/main_styles.css">
	<link rel="stylesheet" href="<?=self::RES?>/styles/responsive.css">
	<link rel="stylesheet" href="<?=self::RES?>/styles/base.css">
</head>

<body>
	<div class="super_container">

		<!-- Header -->
		<header class="header">
			<?php include('app/views/includes/topbar.php'); ?>
			<?php include('app/views/includes/header.php'); ?>
			<?php include('app/views/includes/search.php'); ?>
		</header>

		<!-- Menu -->
		<?php include('app/views/includes/nav.php'); ?>
		
		<!-- Content -->
		<?php include($this->contentPath); ?>

		<!-- Footer -->
		<?php include('app/views/includes/footer.php'); ?>

	</div>

	<script src="<?=self::RES?>/js/jquery-3.2.1.min.js"></script>
	<script src="<?=self::RES?>/styles/bootstrap4/popper.js"></script>
	<script src="<?=self::RES?>/styles/bootstrap4/bootstrap.min.js"></script>
	<script src="<?=self::RES?>/plugins/greensock/TweenMax.min.js"></script>
	<script src="<?=self::RES?>/plugins/greensock/TimelineMax.min.js"></script>
	<script src="<?=self::RES?>/plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script src="<?=self::RES?>/plugins/greensock/animation.gsap.min.js"></script>
	<script src="<?=self::RES?>/plugins/greensock/ScrollToPlugin.min.js"></script>
	<script src="<?=self::RES?>/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="<?=self::RES?>/plugins/easing/easing.js"></script>
	<script src="<?=self::RES?>/plugins/video-js/video.min.js"></script>
	<script src="<?=self::RES?>/plugins/video-js/Youtube.min.js"></script>
	<script src="<?=self::RES?>/plugins/parallax-js-master/parallax.min.js"></script>
	<script src="<?=self::RES?>/js/custom.js"></script>
</body>

</html>