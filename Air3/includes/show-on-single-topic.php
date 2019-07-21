<?php
/*
You can use this <pun_include> if you want to show something in the sidebar *ONLY* on one single specific topic/thread.

PLEASE NOTE: The content shown in this file will only be shown if the URL ends in "id=" and NOT "pid=".
To get this working with "pid=" it requires an extra database query.

First you will need the exact topic ID that you wish to show this file on.
You can get the topic ID by visiting the topic on your forum and then looking at the end of the URL.

For example, if we want to show the below "Lorem Ipsum" text ONLY on the following topic:-

http://fluxbb.org/forums/viewtopic.php?id=6817 <-- The topic ID here would be 6817.
NOTE: If the URL ends in "pid=" instead of "id=" that is not the correct ID. That is a specific posts ID not the topic ID.

We add this number further down the page (about 5 lines down from here)
*/

// Tell this include only to execute when viewing a topic
if (basename($_SERVER['PHP_SELF'], '.php')=="viewtopic") {

	// Tell this include which Topic ID this content should be shown on
	$onlyshowonid = 6817; 

	// When this code is run on your website we will get the ID of the topic being loaded...
	if(isset($_GET['id']) && is_numeric($_GET['id'])) { 
	
	// and if the current topic ID matches that which we set above (6817)...
	if($onlyshowonid==$_GET['id']) {
	
	// We display whatever content we have below...
?>

			<div class="include">
				<h4>@includes.</h4>
				<p>This text shown right here only appears on this topic! If you're not seeing this you are viewing the incorrect topic.</p>
			</div>

<?php

		// Do not edit below this line (unless you know what youre doing).
		}
	}
}
?>