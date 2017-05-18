	<body>
        <div class="fon">
            
				<?php
				if(!isset($_POST['login']) && !isset($_POST['pass']))
				{
					echo '
					<div class="vhod">
					<div class="priv">
						<p>Добро пожаловать!</p>
						<p>Введите правильные имя<br> пользователя и пароль<br> для входа на сайт!</p>
						<a href="./regisrtation">Регистрация</a>
					</div>
						<div class="vxod"><h2>Вход</h2></div>
						<form method="POST"><div class="auto">
							<div class="user">
							<b>Имя пользователя</b>
							<input maxlength="20" name="login">
							</div>
								<div class="pass">
								<b>Пароль</b><br>
								<input type="password" name="pass">
								</div>
						<input class="but" type="submit" value="Вход">
              <br><br>
								</div>
						</form>
					</div>';
				}
        else
        {
            $file = fopen("logins.txt", "r");
            while(!feof($file))
            {
                $line = fgets($file);// Проверка логина, затем проверка пароля, после вывод каких-то данных. echo @$arr[1].'=='.$_POST['pwd'];
                $arr = explode('|', $line);
                if(@$arr[0] == $_POST['login'] && @$arr[1] == $_POST['pass'])
                {
                  echo '<p style="text-align: center; margin-top: 50px;font-size:25px;">Поздравляем,Вы вошли в систему </p>';
				  echo '<p style="text-align: center; margin-top: 50px;font-size:25px;"><a href="cvaz">Обратная связь</a> </p>';
                  echo '<a href="./vxod"><p style="text-align: center; margin-top: 100px;font-size:25px;">Выход</p> </a>';
                  break;
                }
                if(feof($file))
                {
                  echo '<p style="margin-left:300px;font-size:30px;color:red;">Вы ввели неправельные данные</p>';
                  echo '
        					<div class="vhod">
							<div class="priv">
								<a href="registration">Регистрация</a>
							</div>
        						<form method="POST"><div class="auto">
        							<div class="user">
        							<b>Имя пользователя</b>
        							<input maxlength="20" name="login">
        							</div>
        								<div class="pass">
        								<b>Пароль</b><br>
        								<input type="password" name="pass">
        								</div>
        						<input class="but" type="submit" value="Вход">
                      <br><br>
        								</div>
        						</form>
        					</div>';
                  break;
                }
            }
            fclose($file);
        }

				?>
        </div>
    </body>
