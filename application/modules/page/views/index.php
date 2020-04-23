<script>
	$(document).ready(function() {
		$(".preloader").fadeOut();
	})
</script>
<section class="content">
	<div class="container-fluid">
		<div class="error-page">
			<div id="notfound">
				<div class="notfound">
					<div class="notfound-404"></div>
					<h1>403</h1>
					<h2>Oops! You Dont Have Access </h2>
					<p>Sorry but you dont have access to the page you are looking! </p>
					<a href=" <?= base_url('admin') ?> ">Back to homepage</a>
				</div>
			</div>
		</div>
	</div>
</section>

<link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">
<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/dist/error/css/style.css" />