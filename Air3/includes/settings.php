<?php
// Load the global language file for all includes 
if (file_exists('style/'.$pun_user['style'].'/includes/lang/'.$pun_user['language'].'/includes.php')) {
  	require 'style/'.$pun_user['style'].'/includes/lang/'.$pun_user['language'].'/includes.php';
} else {
	require 'style/'.$pun_user['style'].'/includes/lang/English/includes.php';
}

// Load the global stylesheet for all includes 
if (file_exists('style/'.$pun_user['style'].'/includes/includes.css')) { ?>
<link rel="stylesheet" type="text/css" href="style/<?php echo $pun_user['style']; ?>/includes/includes.css" />
<?php } ?>
