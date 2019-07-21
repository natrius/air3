<?php
// Show login box if not logged in
if($pun_user['is_guest'])
{
	if(!isset($focus_element) || (isset($focus_element) && !in_array('login', $focus_element)))
	{
 
	// Load the language files
	require PUN_ROOT.'lang/'.$pun_user['language'].'/common.php';
	require PUN_ROOT.'lang/'.$pun_user['language'].'/login.php';

    // Try to determine if the data in HTTP_REFERER is valid (if not, we redirect to index.php after login)
    $redirect_url = (isset($_SERVER['HTTP_REFERER']) && preg_match('#^'.preg_quote($pun_config['o_base_url']).'/(.*?)\.php#i', $_SERVER['HTTP_REFERER'])) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : 'index.php';
  
	$required_fields = array('req_username' => $lang_common['Username'], 'req_password' => $lang_common['Password']);
 
?>
<div class="include">
	<h4><?php echo $lang_includes['Please Login']; ?></h4>
	<form id="logininclude" name="login" method="post" action="login.php?action=in" onsubmit="return process_form(this)">
	<a title="<?php echo $lang_includes['Please Login']; ?>" href="login.php"><img src="style/Victory/img/no_avatar.png" alt="<?php echo $lang_includes['Please Login']; ?>" /></a>
		<input type="hidden" name="form_sent" value="1" />
		<input type="hidden" name="redirect_url" value="<?php echo $redirect_url ?>" />
		<fieldset>
			<ol>	
				<li>
					<label for="req_username"><?php echo $lang_common['Username'] ?></label>
					<input id="req_username" name="req_username" type="text" placeholder="<?php echo $lang_common['Username'] ?>" required="required" />
				</li>
				<li>
					<label for="req_password"><?php echo $lang_common['Password'] ?></label>
					<input type="password" name="req_password" maxlength="16" id="req_password" placeholder="<?php echo $lang_common['Password'] ?>" required="required" />
				</li>
				<li>
					<label for="submit"></label>
					<input type="submit" class="submitBtn" id="loginbutton" name="submit" value="<?php echo $lang_common['Login'] ?>" />
				</li>
			</ol>
		</fieldset>
	</form>
</div>

<?php
	}
}
else {

/*---------------------------
 User is logged in
-----------------------------*/
?>
<div class="include">
		<h4><?php echo $lang_includes['Welcome Back']; ?></h4>
		<div id="loggedin">
			<?php 
            if ($img_size = @getimagesize($pun_config['o_avatars_dir'].'/'.$pun_user['id'].'.gif'))
                echo "\n\t\t\t\t".'<a title="'.pun_htmlspecialchars($pun_user['username']).'" href="profile.php?id='.$pun_user['id'].'"><img src="'.$pun_config['o_avatars_dir'].'/'.$pun_user['id'].'.gif" alt="'.pun_htmlspecialchars($pun_user['username']).'" /></a>';
            else if ($img_size = @getimagesize($pun_config['o_avatars_dir'].'/'.$pun_user['id'].'.jpg'))
                echo "\n\t\t\t\t".'<a title="'.pun_htmlspecialchars($pun_user['username']).'" href="profile.php?id='.$pun_user['id'].'"><img src="'.$pun_config['o_avatars_dir'].'/'.$pun_user['id'].'.jpg" alt="'.pun_htmlspecialchars($pun_user['username']).'" /></a>';
            else if ($img_size = @getimagesize($pun_config['o_avatars_dir'].'/'.$pun_user['id'].'.png'))
                echo "\n\t\t\t\t".'<a title="'.pun_htmlspecialchars($pun_user['username']).'" href="profile.php?id='.$pun_user['id'].'"><img src="'.$pun_config['o_avatars_dir'].'/'.$pun_user['id'].'.png" alt="'.pun_htmlspecialchars($pun_user['username']).'" /></a>';
            else
                echo "\n\t\t\t\t".'<a title="'.pun_htmlspecialchars($pun_user['username']).'" href="profile.php?section=personality&amp;id='.$pun_user['id'].'"><img src="style/Victory/img/upload-avatar.png" alt="'.$lang_includes['Upload Avatar'].'" /></a>';
			?>

			<p class="buttons">
				<!-- Logged In As -->
				<span><?php echo $lang_common['Logged in as']; ?> <strong id="loggedinuser"><?php echo pun_htmlspecialchars($pun_user['username']); ?></strong></span><br />
				<!-- Edit Profile Link -->
				<a href="profile.php?id=<?php echo $pun_user['id']; ?>" title="<?php echo $lang_includes['Edit Profile']; ?>" id="editprofile"><?php echo $lang_includes['Edit Profile']; ?></a> /
				<!-- If Mod/Admin Link To Admin Panel -->
				<?php if($pun_user['is_admmod']) { ?>
				<a href="admin_index.php" title="<?php echo $lang_common['Admin']; ?>" id="adminlink"><?php echo $lang_common['Admin']; ?></a> /
				<?php } ?>
				<!-- Logout Button -->
				<a href="login.php?action=out&amp;id=<?php echo $pun_user['id']; ?>&amp;csrf_token=<?php echo pun_hash($pun_user['id'].pun_hash(get_remote_address())); ?>" id="logoutbutton"><?php echo $lang_common['Logout']; ?></a>
			</p>
		</div>
</div>

<?php
}
?>