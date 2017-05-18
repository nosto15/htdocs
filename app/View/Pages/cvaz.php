<style>


h1 {
  margin: 10px 0 30px;
  font-size: 220%;
}

/* the main layout */

#contentForm {
  display: block;
  width: 500px;
  margin: 70px auto;/*this line will center the page*/
  padding: 25px;
  border: 1px solid black;
  background-color: white;
}

/* and now the form formatting itself */
label {
  display: block;
  float: left;
  clear: left;
  Width: 150px;
  line-height: 20px;
  margin-bottom: 10px;
  margin: 5px 0;
}

input, textarea, select {
  margin: 0;
  padding: 2px;
  font-size: 1em;
  color: #666666;
  background: #F5F5F5;
  border: 1px solid #ccc;
  margin: 5px 0;
}   

input:focus, textarea:focus, select:focus {
  border: 1px solid #999;
  background-color: #FFFFFF;
}

input.button {
  cursor: pointer;
  border: none;
  font-weight: bold;
  background: url(images/submit.jpg) no-repeat left top;
  width: 90px;
  height: 28px;
  margin-left: 150px;
}

span.required{
  font-size: 13px !important;
  color: red !important;
}

.errormsg {
  display: block;
  width: 90%;
  height: 22px;
  line-height: 22px;
  color: #FFFFFF;
  font-weight: bold;
  background: #FF9D9D url(images/stop.gif) no-repeat 10px center;
  padding: 3px 10px 3px 40px;
  margin: 10px 0;
  border-top: 2px solid #FF0000;
  border-bottom: 2px solid #FF0000;
}

.msgSent {
  font-size: 20px;
  text-align: center;
}


</style>
     <div id="contentForm">

            <!-- The contact form starts from here-->
            <?php
                 $error    = ''; // сообщение об ошибке
                 $name     = ''; // имя отправителя
                 $email    = ''; // email отправителя
                 $subject  = ''; // тема
                 $message  = ''; // сообщение
               	 $spamcheck = ''; // проверка на спам

            if(isset($_POST['send']))
            {
                 $name     = $_POST['name'];
                 $email    = $_POST['email'];
                 $subject  = $_POST['subject'];
                 $message  = $_POST['message'];
               	 $spamcheck = $_POST['spamcheck'];

                if(trim($name) == '')
                {
                    $error = '<div class="errormsg">Пожалуйста, введите Ваше имя</div>';
                }
            	    else if(trim($email) == '')
                {
                    $error = '<div class="errormsg">Пожалуйста, введите Ваш email!</div>';
                }
                else if(!isEmail($email))
                {
                    $error = '<div class="errormsg">Вы ввели неправильный e-mail. Пожалуйста, исправьте его!</div>';
                }
            	    if(trim($subject) == '')
                {
                    $error = '<div class="errormsg">Пожалуйста, введите тему!</div>';
                }
            	else if(trim($message) == '')
                {
                    $error = '<div class="errormsg">Пожалуйста, введите сообщение!</div>';
                }
	          	else if(trim($spamcheck) == '')
	            {
	            	$error = '<div class="errormsg">Пожалуйста, введите проверку на спам!</div>';
	            }
	          	else if(trim($spamcheck) != '5')
	            {
	            	$error = '<div class="errormsg">Проверка на спам: Вы ввели неправильный результат! 2 + 3 = ???</div>';
	            }
                if($error == '')
                {
                    if(get_magic_quotes_gpc())
                    {
                        $message = stripslashes($message);
                    }

                 
                    // Обязательно укажите здесь Email на который должны приходить письма
                    $to      = "";

                
                    // [Сообщение через контактную форму] - тема сообщения - можете поменять на любую.
               

                    $subject = '[Сообщение через контактную форму] : ' . $subject;

                    // сообщение 
                    $msg     = "From : $name \r\ne-Mail : $email \r\nSubject : $subject \r\n\n" . "Message : \r\n$message";

                    mail($to, $subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n");
            ?>

                  <!-- Сообщение отправлено! (можете поменять текст)-->
                  <div style="text-align:center;">
                    <h1>Поздравляем!</h1>
                       <p>Спасибо <b><?=$name;?></b>, Ваше сообщение успешно отправлено!</p>
                  </div>
                  <!--End Message Sent-->


            <?php
                }
            }

            if(!isset($_POST['send']) || $error != '')
            {
            ?>

           
            <!--Error Message-->
            <?=$error;?>

            <form  method="post" name="contFrm" id="contFrm" action="">


                      <label><span class="required">*</span>Полное имя:</label>
            			<input name="name" type="text" class="box" id="name" size="30" value="<?=$name;?>" />

            			<label><span class="required">*</span> Email: </label>
            			<input name="email" type="text" class="box" id="email" size="30" value="<?=$email;?>" />

            			<label><span class="required">*</span> Тема: </label>
            			<input name="subject" type="text" class="box" id="subject" size="30" value="<?=$subject;?>" />

                 		<label><span class="required">*</span> Сообщение: </label>
                 		<textarea name="message" cols="40" rows="3"  id="message"><?=$message;?></textarea>

            			<label><span class="required">*</span> Проверка на спам: <br /><b>2 + 3=</b></label>
						<input name="spamcheck" type="text" class="box" id="spamcheck" size="4" value="<?=$spamcheck;?>" /><br /><br />

            			<!-- Submit Button-->
                 		<input name="send" type="submit" class="button" id="send" value="Отправить" />

            </form>

            <!-- E-mail verification. Do not edit -->
            <?php
            }

            function isEmail($email)
            {
                return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i"
                        ,$email));
            }
            ?>
            <!-- END CONTACT FORM -->
     
     </div> <!-- /contentForm -->
     


