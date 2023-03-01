<?php
		$pages_dir = 'pages';
		if(!empty($_GET['p'])){
			$pages = scandir($pages_dir, 0);
			unset($pages[0], $pages[1]);
 
			$p = $_GET['p'];
			if(in_array($p.'.php', $pages)){
				include($pages_dir.'/'.$p.'.php');
			} else {
				include($pages_dir.'/blank.php');
			}
		} else {
			if (isset($_SESSION['level']))
			{
			   if ($_SESSION['level'] == "admin") {
					include($pages_dir.'/welcome.php');
				}
				   elseif ($_SESSION['level'] == "pimpinan"){
					include($pages_dir.'/home.php');
					}
			}
		}
		?>