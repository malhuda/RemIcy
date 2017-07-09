<?php
/* Template Name: Safelink */
?>
<!DOCTYPE html>
<html>
	<head>
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link href="<?php echo get_template_directory_uri(); ?>/css/safelink.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		<title>Safelink - <?php bloginfo("name"); ?></title>
	</head>
	<body>
		<div id="box-download">
			<script src="<?php echo get_template_directory_uri(); ?>/js/safelink.js" type="text/javascript"></script>
			<h1><?php bloginfo("name"); ?> - Safelink</h1>
			<button id="button" onclick="location.href='<?php echo esc_url(home_url( '/' )); ?>'"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</button>
			<script type="text/javascript">
			function generate(){
				var getSource = document.getElementById("input-url");
				if(getSource.value != "" && getSource.value.includes("http://") || getSource.value != "" && getSource.value.includes("https://")){
					var generateSource = source.encode(getSource.value);
					getSource.value = location.protocol + "//" + location.hostname + location.pathname + "?url=" + generateSource;
				}else if(getSource.value != "" && !getSource.value.includes("http://") || getSource.value != "" && !getSource.value.includes("https://")){
					getSource.placeholder = "URL harus mengandung http:// atau https://";
					getSource.value = "";
				}else if(getSource.value == ""){
					getSource.placeholder = "Masukkan URL";
				}
			}
			function show(){
				if(document.getElementById("box-generate").style.display == "none"){
					document.getElementById("box-generate").style.display = "block";
				}else{
					document.getElementById("box-generate").style.display = "none";
				}
			}
			var local = location.search;
			function process(){
				var get = source.build(local.replace("?url=", ""));
				window.open(get, "_self");
			}
			document.write("<button id='button' onclick='process();'><i class='fa fa-cloud-download'></i> Download</button>");
			</script>
			<p><a href="#" title="Direct Download">[ Direct Download ]</a></p>
			<div id="box-tutorial">
				<h1>Tutorial <i class="fa fa-question-circle" aria-hidden="true"></i></h1>
				<div class="box-tutorial">
					<p>Bagi kalian yang bingung melewati halaman ini bisa ikuti langkah berikut:</p>
					<li><span>Klik Tombol "DOWNLOAD"</span></li>
					<li><span>Maka akan tertuju ke tempat downlaod</span></li>
				</div>
			</div>
			<div id="generate-now">
				<button onclick="show();">Generate Now!</button>
			</div>
			<div id="box-generate" style="display: none;">
				<i class="fa fa-shield"></i><input type="text" placeholder="Masukkan URL" id="input-url"/>
				<input type="button" onclick="generate();" value="GET"/>
			</div>
			<h2>Copyright &copy; <?php echo date("Y") ?> <a href="<?php echo esc_url(home_url( '/' )); ?>"><?php bloginfo('name'); ?></a> All Rights Reserved. Powered by <a href="http://wordpress.org">Wordpress</a> & Design by <a href="http://facebook.com/masga.ex">Masga Ex</a></h2>
		</div>
	</body>
</html>