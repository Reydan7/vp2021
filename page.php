
<?php
	$author_name = "reydan Niineorg";
	$week_day_names_et = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
	$full_time_now = date("d.m.Y H:i:S");
	$hour_now = date("H");
	//echo $hour_now
	//if(muutuja > and $muutuja <= 18)
	$weekday_now = date("N");
	$day_category = "ebamäärane";
	if($weekday_now <= 5){
		$day_category = "koolipäev";
	} else {
		$day_category = "puhkepäev";
	} 
		//kirjutame sõnumi sõltuvalt ajast
	if($hour_now <= 8){
		$time_msg = "tere hommikust";
	} elseif($hour_now > 8 and $hour_now < 18 and $weekday_now <= 5) {
		$time_msg = "head koolipäeva";
	} elseif($hour_now > 8 and $hour_now < 18 and $weekday_now > 5) {
		$time_msg =  "kena nädalavahetust";
	} else {
		$time_msg = "head õhtut";
	}
	
	//loeme fotode kataloogi sisu
	$photo_dir = "photos/";
	$allowed_photo_types = ["image/jpeg", "image/png"];
	//$all_files = scandir($photo_dir);
	$all_files = array_slice(scandir($photo_dir), 2);
	//var_dump($all_files);
	//$only_files = array_slice($all_files, 2);
	
	//sõelume välja ainult lubatud pildid
	$photo_files = [];
	foreach($all_files as $files){
		$file_info = getimagesize($photo_dir .$file);
		if(isset($file_info["mime"])){
			if(in_array($file_info["mime"], $allowed_photo_types)){
				array_push($photo_files, $files);
			}
		}
	}
	$limit = count($photo_files);
	//echo $limit
	$pic_num = mt_rand(0, $limit - 1);
	$pic_file = $photo_files[$pic_num];
	// <img src="pilt.jpg alt="Tallinna Ülikool">
	$pic_html =  '<img = src="' .$photo_dir .$pic_file .'" alt=Tallinna Ülikool">';
	
	
?>

<!DOCTYPE html>
<html lang="et">
	<head>
		<meta charset="utf-8">
		<title><?php$author_name; ?>, Landing page</title>
	</head>
	<body>
		<h1><?php$author_name; ?> minu leht</h1>
		<p>See leht on loodud õppetöö raames ja ei sisalda tõsiseltvõetavat sisu!</p>
		<p>Õppetöö toimub <a href="https://www.tlu.ee/dt">Tallinna Ülikoli Digitehnoloogiate instituudis.</a></p>
		<p>lehe avamise hetk: <span><?php echo $week_day_names_et[$weekday_now - 1] . ", " . $full_time_now . ", on " . $day_category; ?></span>.</p>
		<p><?php echo $time_msg ?></p>
		<ul>
		<li>HTML</li>
		<li>php</li>
		<li>Jne</li>
		</ul>
		<?php echo $pic_html; ?>
	</body>
</html
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 