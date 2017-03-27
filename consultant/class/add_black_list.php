<?php
 require 'black_list.php'; session_start(); if(isset($_SESSION['who']) AND $_SESSION['who'] == "operator"){ if(!empty($_POST['user_id'])){ $load = new BlackList($_POST['user_id']); $load->addInList(); } }else{ die('Error! Нету прав!'); } ?>
