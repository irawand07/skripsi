
<!DOCTYPE html>
<html>
<head>
<title>Cari Buku</title>
<?php define('BASE_URL','http://localhost/skripsi/'); ?>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Pinyon+Script' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
<link href="<?php echo BASE_URL; ?>assets/css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link href="<?php echo BASE_URL; ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta charset="UTF-8">
<script src="<?php echo BASE_URL; ?>assets/js/jquery.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/bootstrap.js"></script>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/jquery-ui.css" />


<script>
					$("span.menu").click(function(){
						$(".top-menu ul").slideToggle(200);
					});
				</script>
<!-- requried-jsfiles-for owl -->
				<link href="<?php echo BASE_URL; ?>assets/css/owl.carousel.css" rel="stylesheet">
							    <script src="<?php echo BASE_URL; ?>assets/js/owl.carousel.js"></script>
							        <script>
							    $(document).ready(function() {
							      $("#owl-demo").owlCarousel({
							        items : 1,
							        lazyLoad : true,
							        autoPlay : true,
							        navigation : true,
							        navigationText :  false,
							        pagination : false,
							      });
							    });
							    </script>
			<!-- //requried-jsfiles-for owl -->
</head>
<body>
