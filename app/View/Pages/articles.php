<link rel="stylesheet" type="text/css" href="<?php echo $SERVER; ?>style/style.css" />
<div class="body">
	
	
	<?php 
		session_start(); 
		$DB = Dbconnect::instance()->getConnect(); 
		$user = $DB->select("SELECT * FROM `article` WHERE id = $num_art"); 
		
		
		if($num_art != 0) 
		{ 
			foreach($user as $shit => $do) 
			{ 
			echo "<h1 style=\"text-align:center;\">".$do[title]."<a name=\"\1\">#".$do[id]."</a></h1>"; 
			echo "<div><h3>Последнее обновление: ".$do[update]."</h3>"; 
			echo "<p style=\"font-size:25px;\">".$do[discription]."</p>"; 
			echo "<a style=\"font-size:25px;\" href=\"http://localhost/articles \">Назад.</a></div>"; 
			} 
		} 
		else 
		{ 
		$DB = Dbconnect::instance()->getConnect(); 
		$user = $DB->select('SELECT * FROM `article`'); 
		
		foreach($user as $shit => $do) 
			{ 
			echo "<h1 style=\"text-align:center;\">".$do[title]."</h1>"; 
			echo "<p style=\"font-size:25px;\">".mb_substr($do[discription], 0, 400,"UTF-8")."...</p>"; 
			echo "<a style=\"font-size:25px;\" href=\"articles/".$do[id]."\">Открыть полную статью...</a>"; 
			echo "<h3>Последнее обновление: ".$do[update]."</h3>"; 
			} 
		}
		if($user==null)
			errorPath("<p style=\"font-size:25px;\">Заданной статьи нет в данный момент:( </p>");
	?>
	
	
	
</div>