<div class="include">
<?php 

	// How many top posters do we want to display?
	$numposters = 9;

	// Fetch top posters
	$topposters = array();
	$topresult = $db->query('SELECT id, username, num_posts FROM '.$db->prefix.'users ORDER BY num_posts DESC LIMIT '.$numposters.'', true) or error('Unable to fetch top posters', __FILE__, __LINE__, $db->error());
	
	while ($pun_top_posters = $db->fetch_assoc($topresult))
	{
		if ($pun_top_posters['id'] > 1)
		{
            if ($img_size = @getimagesize($pun_config['o_avatars_dir'].'/'.$pun_top_posters['id'].'.gif'))
                $topposters[] = "\n\t\t\t\t".'<li><a title="'.pun_htmlspecialchars($pun_top_posters['username']).'" href="profile.php?id='.$pun_top_posters['id'].'"><img src="'.$pun_config['o_avatars_dir'].'/'.$pun_top_posters['id'].'.gif" alt="'.pun_htmlspecialchars($pun_top_posters['username']).'" /></a>';
            else if ($img_size = @getimagesize($pun_config['o_avatars_dir'].'/'.$pun_top_posters['id'].'.jpg'))
                $topposters[] = "\n\t\t\t\t".'<li><a title="'.pun_htmlspecialchars($pun_top_posters['username']).'" href="profile.php?id='.$pun_top_posters['id'].'"><img src="'.$pun_config['o_avatars_dir'].'/'.$pun_top_posters['id'].'.jpg" alt="'.pun_htmlspecialchars($pun_top_posters['username']).'" /></a>';
            else if ($img_size = @getimagesize($pun_config['o_avatars_dir'].'/'.$pun_top_posters['id'].'.png'))
                $topposters[] = "\n\t\t\t\t".'<li><a title="'.pun_htmlspecialchars($pun_top_posters['username']).'" href="profile.php?id='.$pun_top_posters['id'].'"><img src="'.$pun_config['o_avatars_dir'].'/'.$pun_top_posters['id'].'.png" alt="'.pun_htmlspecialchars($pun_top_posters['username']).'" /></a>';
            else
                $topposters[] = "\n\t\t\t\t".'<li><a title="'.pun_htmlspecialchars($pun_top_posters['username']).'" href="profile.php?id='.$pun_top_posters['id'].'"><img src="style/Victory/img/no_avatar.png" alt="'.pun_htmlspecialchars($pun_top_posters['username']).'" /></a>';
		}
	}
?>

	<h4><?php echo $lang_includes['Top'].' '.$numposters.' '.$lang_includes['Posters']; ?></h4>
	
<?php	
	echo "\n\t\t".'<ul id="toppostersgrid" class="avatargrid clearb">'."\n\t\t\t\t\t\t\t".implode(',</li> ', $topposters).'</li>'."\n\t\t\t".'</ul>'."\n\t\t".'<br clear="all" />'."\n";
?>
</div>
