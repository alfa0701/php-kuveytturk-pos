<?php
		
		set_time_limit(0);		// Sınırsız Süre Almak İçin
		error_reporting(E_ALL); // Hataları Gizle
		error_reporting(0);  	// Hataları Gizle
		
		$_title = "Sanal Pos - PHP";
		
		function temizle($string)
			{
				$string		=	strip_tags ($string);
				$find		=	array("'",'"','<','>');
				$replace	=	array('','','','');
				$string		=	str_replace($find, $replace, $string);
				return $string;
			}



		$Name					=	temizle		(	$_POST["CardHolderName"]);
		$Amount					=	temizle		(	$_POST["Amount"]*100);
		$CardNumber				=	temizle		(	$_POST["CardNumber"]);
		$CardExpireDateMonth	=	temizle		(	$_POST["CardExpireDateMonth"]);
		$CardExpireDateYear		=	temizle		(	$_POST["CardExpireDateYear"]);
		$CardCVV2				=	temizle		(	$_POST["CardCVV2"]);
		$TransactionSecurity	=	3;
		$siparis				=	time().'-'.rand(1000,9999).'-'.rand(10,100);

		if (
				($Name 					== "" ) or
				($Amount 				== "" ) or
				($CardNumber 			== "" ) or
				($CardExpireDateMonth	== "" ) or
				($CardExpireDateYear	== "" ) or
				($CardCVV2				== "" ) 
		){
			
			$value = "Location:index.php?alert=1"; header($value);  die;
		}

		


        $APIVersion						=	"1.0.0";
        $Type							=	"Sale";
        $CurrencyCode					=	"0949";		//TL islemleri için
        $MerchantOrderId				=	$siparis;
        $CustomerId						=	"";	//Müsteri Numarasi
        $MerchantId						=	""; //Magaza Kodu
        $OkUrl							=	"https://localhost/successpage.php";	//Basarili 
        $FailUrl						=	"https://localhost/failpage.php";		//Basarisiz
        $UserName						=	""; // Web Yönetim Olusturulan Api Rollü Kullanici
		$Password						=	"";	// Web Yönetim Olusturulan Api Rollü kullanici Sifresi
		$HashedPassword					=	base64_encode(sha1($Password,"ISO-8859-9")); //md5($Password);
        $HashData						=	base64_encode(sha1($MerchantId.$MerchantOrderId.$Amount.$OkUrl.$FailUrl.$UserName.$HashedPassword , "ISO-8859-9"));

	 try {

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POST, true); //POST Metodu kullanarak verileri gönder
			curl_setopt($ch, CURLOPT_HEADER, false); //Serverdan gelen Header bilgilerini önemseme.
			curl_setopt($ch, CURLOPT_URL,'https://boa.kuveytturk.com.tr/sanalposservice/'); //Baglanacagi URL
			curl_setopt($ch, CURLOPT_POSTFIELDS,
				'<KuveytTurkVPosMessage xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">'
				.'<APIVersion>1.0.0</APIVersion>'
				.'<OkUrl>'.$OkUrl.'</OkUrl>'
				.'<FailUrl>'.$FailUrl.'</FailUrl>'
				.'<HashData>'.$HashData.'</HashData>'
				.'<MerchantId>'.$MerchantId.'</MerchantId>'
				.'<CustomerId>'.$CustomerId.'</CustomerId>'
				.'<UserName>'.$UserName.'</UserName>'
				.'<CardNumber>'.$CardNumber.'</CardNumber>'
				.'<CardExpireDateYear>'.$CardExpireDateYear.'</CardExpireDateYear>'
				.'<CardExpireDateMonth>'.$CardExpireDateMonth.'</CardExpireDateMonth>'
				.'<CardCVV2>'.$CardCVV2.'</CardCVV2>'
				.'<CardHolderName>'.$Name.'</CardHolderName>'
				.'<CardType>MasterCard</CardType>'
				.'<BatchID>0</BatchID>'
				.'<TransactionType>'.$Type.'</TransactionType>'
				.'<InstallmentCount>0</InstallmentCount>'
				.'<Amount>'.$Amount.'</Amount>'
				.'<DisplayAmount>'.$Amount.'</DisplayAmount>'
				.'<CurrencyCode>'.$CurrencyCode.'</CurrencyCode>'
				.'<MerchantOrderId>'.$MerchantOrderId.'</MerchantOrderId>'
				.'<TransactionSecurity>'.$TransactionSecurity.'</TransactionSecurity>'
				.'</KuveytTurkVPosMessage>');

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Transfer sonuçlarini al.
			$data = curl_exec($ch);
			curl_close($ch);
		 }
		 catch (Exception $e) {
		 echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		 error_reporting(E_ALL);
		 ini_set("display_errors", 1);

?>
