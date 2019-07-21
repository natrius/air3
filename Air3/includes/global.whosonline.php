<div class="include">
<?php 

if ($pun_config['o_users_online'] == '1')
{

	// Load the index.php language file
	require PUN_ROOT.'lang/'.$pun_config['o_default_lang'].'/index.php';

	// Fetch users online info and generate strings for output
	$num_guests = 0;
	$users = array();
	$whosresult = $db->query('SELECT user_id, ident FROM '.$db->prefix.'online WHERE idle=0 ORDER BY ident LIMIT 9', true) or error('Unable to fetch online list', __FILE__, __LINE__, $db->error());
	
	while ($pun_user_online = $db->fetch_assoc($whosresult))
	{
		if ($pun_user_online['user_id'] > 1)
		{
            if ($img_size = @getimagesize($pun_config['o_avatars_dir'].'/'.$pun_user_online['user_id'].'.gif'))
                $users[] = "\n\t\t\t\t".'<li><a title="'.pun_htmlspecialchars($pun_user_online['ident']).'" href="profile.php?id='.$pun_user_online['user_id'].'"><img src="'.$pun_config['o_avatars_dir'].'/'.$pun_user_online['user_id'].'.gif" alt="'.pun_htmlspecialchars($pun_user_online['ident']).'" /></a>';
            else if ($img_size = @getimagesize($pun_config['o_avatars_dir'].'/'.$pun_user_online['user_id'].'.jpg'))
                $users[] = "\n\t\t\t\t".'<li><a title="'.pun_htmlspecialchars($pun_user_online['ident']).'" href="profile.php?id='.$pun_user_online['user_id'].'"><img src="'.$pun_config['o_avatars_dir'].'/'.$pun_user_online['user_id'].'.jpg" alt="'.pun_htmlspecialchars($pun_user_online['ident']).'" /></a>';
            else if ($img_size = @getimagesize($pun_config['o_avatars_dir'].'/'.$pun_user_online['user_id'].'.png'))
                $users[] = "\n\t\t\t\t".'<li><a title="'.pun_htmlspecialchars($pun_user_online['ident']).'" href="profile.php?id='.$pun_user_online['user_id'].'"><img src="'.$pun_config['o_avatars_dir'].'/'.$pun_user_online['user_id'].'.png" alt="'.pun_htmlspecialchars($pun_user_online['ident']).'" /></a>';
            else
                $users[] = "\n\t\t\t\t".'<li><a title="'.pun_htmlspecialchars($pun_user_online['ident']).'" href="profile.php?id='.$pun_user_online['user_id'].'"><img src="style/Victory/img/no_avatar.png" alt="'.pun_htmlspecialchars($pun_user_online['ident']).'" /></a>';
		}
		else
			++$num_guests;
	}

	$num_users = count($users);
	$num_online = $num_users+$num_guests;
?>

	<h4><?php echo $lang_includes['Online Now']; ?> (<?php echo $num_online; ?>)</h4>
	
<?php	
	if ($num_users > 0)
		echo "\n\t\t".'<ul id="onlinenowgrid" class="avatargrid clearb">'."\n\t\t\t\t\t\t\t".implode(',</li> ', $users).'</li>'."\n\t\t\t".'</ul>'."\n\t\t".'<br clear="all" />'."\n";
	else
		echo "\t\t\t".'<div class="clearer"></div>'."\n";

	echo "\t\t\t".'<div><span>'.sprintf($lang_index['Users online'], '<strong>'.forum_number_format($num_users).'</strong>').'</span></div>'."\n\t\t\t".'<div><span>'.sprintf($lang_index['Guests online'], '<strong>'.forum_number_format($num_guests).'</strong>').'</span></div>'."\n";
	
}
?>
</div>