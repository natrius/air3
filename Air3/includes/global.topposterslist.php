<div class="include">
<?php 

	// How many top posters do we want to display?
	$numposters = 9;

	// Fetch top posters
	$topposters = array();
	$toppresult = $db->query('SELECT u.id, u.title, u.username, u.num_posts, u.group_id, g.g_id, g.g_user_title FROM '.$db->prefix.'users AS u INNER JOIN '.$db->prefix.'groups AS g ON g.g_id=u.group_id ORDER BY num_posts DESC LIMIT '.$numposters.'', true) or error('Unable to fetch top posters', __FILE__, __LINE__, $db->error());
	
	while ($pun_top_posters = $db->fetch_assoc($toppresult))
	{
		if ($pun_top_posters['id'] > 1)
		{
		
		$inc_user_title = get_title($pun_top_posters);

		if ($pun_config['o_censoring'] == '1')
			$inc_user_title = censor_words($inc_user_title);

			
            if ($img_size = @getimagesize($pun_config['o_avatars_dir'].'/'.$pun_top_posters['id'].'.gif'))
                $topposters[] = "\n\t\t\t\t".'<li>
				<a title="'.pun_htmlspecialchars($pun_top_posters['username']).'" href="profile.php?id='.$pun_top_posters['id'].'"><img src="'.$pun_config['o_avatars_dir'].'/'.$pun_top_posters['id'].'.gif" alt="'.pun_htmlspecialchars($pun_top_posters['username']).'" /></a>
				<a title="'.pun_htmlspecialchars($pun_top_posters['username']).'" href="profile.php?id='.$pun_top_posters['id'].'">'.pun_htmlspecialchars($pun_top_posters['username']).'</a>
				<span class="incusertitle"><br />'.pun_htmlspecialchars($inc_user_title).'</span>
				<span class="incusernumposts"><br />'.pun_htmlspecialchars($pun_top_posters['num_posts']).' '.$lang_includes['Posts'].'</span>';
				
            else if ($img_size = @getimagesize($pun_config['o_avatars_dir'].'/'.$pun_top_posters['id'].'.jpg'))
                $topposters[] = "\n\t\t\t\t".'<li><a title="'.pun_htmlspecialchars($pun_top_posters['username']).'" href="profile.php?id='.$pun_top_posters['id'].'"><img src="'.$pun_config['o_avatars_dir'].'/'.$pun_top_posters['id'].'.jpg" alt="'.pun_htmlspecialchars($pun_top_posters['username']).'" /></a>
				<a title="'.pun_htmlspecialchars($pun_top_posters['username']).'" href="profile.php?id='.$pun_top_posters['id'].'">'.pun_htmlspecialchars($pun_top_posters['username']).'</a>
				<span class="incusertitle"><br />'.pun_htmlspecialchars($inc_user_title).'</span>
				<span class="incusernumposts"><br />'.pun_htmlspecialchars($pun_top_posters['num_posts']).' '.$lang_includes['Posts'].'</span>';
				
            else if ($img_size = @getimagesize($pun_config['o_avatars_dir'].'/'.$pun_top_posters['id'].'.png'))
                $topposters[] = "\n\t\t\t\t".'<li><a title="'.pun_htmlspecialchars($pun_top_posters['username']).'" href="profile.php?id='.$pun_top_posters['id'].'"><img src="'.$pun_config['o_avatars_dir'].'/'.$pun_top_posters['id'].'.png" alt="'.pun_htmlspecialchars($pun_top_posters['username']).'" /></a>
				<a title="'.pun_htmlspecialchars($pun_top_posters['username']).'" href="profile.php?id='.$pun_top_posters['id'].'">'.pun_htmlspecialchars($pun_top_posters['username']).'</a>
				<span class="incusertitle"><br />'.pun_htmlspecialchars($inc_user_title).'</span>
				<span class="incusernumposts"><br />'.pun_htmlspecialchars($pun_top_posters['num_posts']).' '.$lang_includes['Posts'].'</span>';
				
            else
                $topposters[] = "\n\t\t\t\t".'<li><a title="'.pun_htmlspecialchars($pun_top_posters['username']).'" href="profile.php?id='.$pun_top_posters['id'].'"><img src="style/Victory/img/no_avatar.png" alt="'.pun_htmlspecialchars($pun_top_posters['username']).'" /></a>
				<a title="'.pun_htmlspecialchars($pun_top_posters['username']).'" href="profile.php?id='.$pun_top_posters['id'].'">'.pun_htmlspecialchars($pun_top_posters['username']).'</a>
				<span class="incusertitle"><br />'.pun_htmlspecialchars($inc_user_title).'</span>
				<span class="incusernumposts"><br />'.pun_htmlspecialchars($pun_top_posters['num_posts']).' '.$lang_includes['Posts'].'</span>';
		}
	}
?>

	<h4><?php echo $lang_includes['Top'].' '.$numposters.' '.$lang_includes['Posters']; ?></h4>
	
<?php	
	echo "\n\t\t".'<ul id="topposterslist" class="avatarlist clearb">'."\n\t\t\t\t\t\t\t".implode(',</li> ', $topposters).'</li>'."\n\t\t\t".'</ul>'."\n\t\t".'<br clear="all" />'."\n";
?>
</div>
