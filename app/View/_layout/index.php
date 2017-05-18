<!DOCTYPE HTML>
<html>
 <head>
 <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="http://localhost/style/style.css"  />
  <?php
	if(isset($styleC))
		echo '<link rel="stylesheet" type="text/css" href="'.SERVER.'style/style1.css" />'

  ?>
 </head>
 <body style="background-image: url(http://weblabfon.com/_ld/3/355_01.png);">
	  <a href="http://localhost"></p></a>
  <div class="container">
      <p style="text-align:center; margin-top:220px;"><img style="margin-top:-280px;"  src="http://localhost/img/shifr.png"></p>
	  <div class="header">
        <div class="fon_header">
            <div class="container header_content">
                <div class="header_spisok">
			<?php echo $menu; //MENUHA ?>
                    <ul class="nav">



                    </ul>
                </div>


             </div>
        </div>
     </div>

			 <?php echo $content_for_layout; ?>

     </div>
 </body>
</html>
