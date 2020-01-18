<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TEST</title>
</head>

<body>

</body>
<script src="<?=base_url("dist/js/jquery.min.js");?>"></script>

<?php $this->load->view("function");?>

<script>

	//membuat cookie
	$.when(setCookieServer('testcookie', '2020-01-18@1234.com')).done(function () {
		alert ('cookie created');
	});

	//ambil cookie
	$.when(getCookieServer('adminCookie')).done(function (response) {
		alert ('cookie:'+response);
	});

	//ambil cookie login yang di encrypt
	$.when(getLoginCookieServer('adminCookie')).done(function (response) {
		alert ('cookie:'+response);
	});
</script>


</html>
