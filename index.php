<?php
		
		set_time_limit(0);			// Sınırsız Süre Almak İçin
		error_reporting(E_ALL);		// Hataları Gizle
		error_reporting(0);  		// Hataları Gizle
		$_title			= "Sanal Pos - PHP";
		$_link_payment	= "http://localhost/Payment.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $_title;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!--[if IE]>
	<link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lato:700" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">
<![endif]-->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/theme.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" href="css/font-awesome-ie7.min.css">
<![endif]-->
</head>

<body>



	<div class="pad30"></div>
	<div class="container wrapper">
	<div class="inner_content">

	<!-- sidebar -->
		<div class="row">
			

			<div class="span8 pad15">

			<!-- /SLIDER set height and width of your images in the script at the bottom of page -->

		<h2><span>Kredi Kartı İle Bağış</span></h2>

		<p>

		<form action="<?php echo $_link_payment; ?>" method="post" class="form-horizontal">
<fieldset>

<?php
		if ($_GET['alert'] == 1){
?>
		<div class="alert-error">
					<strong style="font-size:17px;">Lütfen Boş Alan Bırakmayınız</strong>
		</div>
<?php } ?>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="textinput">Kart Üzerindeki İsim</label>
  <div class="controls">
    <input id="CardHolderName" name="CardHolderName" type="text" placeholder="Kart Üzerindeki Ad ve Soyadı Giriniz." class="input-xlarge" required="">
  </div>
</div>



<!-- Appended Input-->
<div class="control-group">
  <label class="control-label "  for="BagisMiktari"> Miktarı</label>
  <div class="controls">
    <div class="input-append">
      <input id="BagisMiktari" name="Amount"  class="input-xlarge" placeholder="Miktarı Giriniz. (En Az 1 TL Olmalıdır)" type="text" required="">
      <span class="add-on">TL</span>
    </div>

  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="textinput">Kart Numarası</label>
  <div class="controls">
    <input id="CardNumber" name="CardNumber" type="text" placeholder="16 Haneli Kart Numarasını Giriniz." class="input-xlarge" required="">

  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="selectbasic">Son Kullanma Tarihi</label>
  <div class="controls">
    <select id="CardExpireDateMonth" name="CardExpireDateMonth" class="input-xlarge" style="width:135px;">
		<option value="01">01 (Ocak)</option>
		<option value="02">02 (Şubat)</option>
		<option value="03">03 (Mart)</option>
		<option value="04">04 (Nisan)</option>
		<option value="05">05 (Mayıs)</option>
		<option value="06">06 (Haziran)</option>
		<option value="07">07 (Temmuz)</option>
		<option value="08">08 (Ağustos)</option>
		<option value="09">09 (Eylül)</option>
		<option value="10">10 (Ekim)</option>
		<option value="11">11 (Kasım)</option>
		<option value="12">12 (Aralık)</option>
    </select>
	 <select id="CardExpireDateYear" name="CardExpireDateYear" class="input-xlarge" style="width:145px;">
		<option value="16">2016</option>
		<option value="17">2017</option>
		<option value="18">2018</option>
		<option value="19">2019</option>
		<option value="20">2020</option>
		<option value="21">2021</option>
		<option value="22">2022</option>
		<option value="23">2023</option>
		<option value="23">2024</option>
		<option value="23">2025</option>
		<option value="23">2026</option>
		<option value="23">2027</option>
		<option value="23">2028</option>
		<option value="23">2029</option>
		<option value="23">2030</option>
    </select>

  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="textinput">Güvenlik Kodu (CVV)</label>
  <div class="controls">
    <input id="CardCVV2" name="CardCVV2" type="text" placeholder="CVV Kodu" class="input-xlarge" required="" style="width:80px;">

  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="singlebutton"></label>
  <div class="controls">
    <button id="submit" type="submit" name="singlebutton" class="btn btn-success">Gönder</button>
  </div>
</div>

</fieldset>
</form>


</p>
		</div>
			</div>
				</div>
					</div>
					<!--//page-->




				<!--//end-->

<!-- scripts -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
