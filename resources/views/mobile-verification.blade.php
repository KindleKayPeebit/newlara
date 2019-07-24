<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css">
    <title> Twilio Follow ups</title>
  </head>
  <body>
	<section class="main-banner">
		<div class="inner-box">
			<div class="top-box">
				<h1 class="hdg">احصل على روابط كازينو سرية حقيقية</h1>
				
				<ul>
					<li>كازينو حقيقي لربح مال حقيقي</li>
					<li>احصل على مكافأت مجانية للعب مجاني في الكازينو</li>
					<li>اللعب المجاني في الكازينو بدون ايداع</li>
					<li>اربح الجائزه الكبرى في أفضل كازينو</li>
				</ul>
				
				<p class="des">العب بدون ايداع واربح مال حقيقي!</p>
			</div>
			
			<div class="btm-box first_div">
				<form method="POST" action="{{route('send-sms')}}">
					@csrf
					<div class="input-group">
						
						<input type="text" id="mobile_number" class="form-control" placeholder="البريد الالكتروني" name="contact_number" required>
					</div>
					<button type="submit" class="btn btn-submit" id="request_otp">شارك الان</button>
				</form>
			</div>
			<div class="btm-box btm2">
				<form method="POST" action="{{route('verify-user')}}">
					@csrf
					<input type="text" class="form-control" placeholder="OTP" name="code">
					<input type="hidden" class="form-control" name="contact_number" value="<?php if(Session::has('contact_number')) { echo Session::get('contact_number'); }?>">
					<button type="submit" class="btn btn-submit">شارك الان</button>
				</form>
			</div>
		</div>
	</section>
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  
   <script>
   	$(function() {
		$("#mobile_number").intlTelInput({
			allowExtensions: true,
			autoFormat: true,
			autoHideDialCode: false,
			autoPlaceholder: false,
			defaultCountry: "auto",
			ipinfoToken: "yolo",
			nationalMode: false,
			numberType: "MOBILE",
			onlyCountries: ['SA', 'QA', 'AE', 'KW','IN'],
			//preferredCountries: ['cn', 'jp'],
			preventInvalidNumbers: true,
			utilsScript: "lib/libphonenumber/build/utils.js"
	});
  });
   </script>
   <script>
   <?php if(Session::has('success1')) { ?>
         toastr.success("<?php echo Session::get('success1') ?>");
   <?php  } else if(Session::has('success')) { ?>
         toastr.success("<?php echo Session::get('success') ?>");
   <?php  } else if(Session::has('error')) { ?>
         toastr.error("<?php echo Session::get('error') ?>");
   	<?php } else if(Session::has('warning')) { ?>
   		 toastr.warning("<?php echo Session::get('warning') ?>");
   	<?php } else if(Session::has('info')) { ?>
   		 toastr.info("<?php echo Session::get('info') ?>");
   	<?php }?>
	</script>
	<script>
		<?php if(Session::has('success1')) { ?>
			$('.first_div').hide();
			$('.btm2').show();
		<?php  } ?>
	</script>
</body>
   
</html>