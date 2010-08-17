<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)): print $title; else: print "Website"; endif; ?></title>
		<link rel="stylesheet" href="/css/main.css" type="text/css" media="screen" title="Main" charset="utf-8"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
	<script>
		$(document).ready(function(){
			$('#submit_login').click(function(){
				var username = $('input[name=username]').val();
				var password = $('input[name=password]').val();
				var dataString = 'username='+ username + '&password=' + password;
				$.ajax({
					type: "POST",
					url: "/index.php/user/validate_json",
					dataType: "json",
					data: dataString,
					success: function(data) {
						if (data.logged) {
							$('form').replaceWith('<div style="background: green;">Your are now logged!</div>');
						}
					}
				});
				return false; // so the form doesn't submit
			});
		});
	</script>
</head>
<body>

