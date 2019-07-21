<?php
/*
You can use this <pun_include> if you want to show something in the sidebar *ONLY* on a few specific topics.

PLEASE NOTE: The content shown in this file will only be shown if the URL ends in "id=" and NOT "pid=".
To get this working with "pid=" it requires an extra database query.

First you will need a list of all of the topic IDs you wish to show this file on.
You can get the topic ID by visiting the topic on your forum and then looking at the end of the URL.

For example, if we want to show the below "Lorem Ipsum" text on the following three topics:-

http://fluxbb.org/forums/viewtopic.php?id=6817
http://fluxbb.org/forums/viewtopic.php?id=6803
http://fluxbb.org/forums/viewtopic.php?id=6721

The topic IDs are: 6817, 6803 and 6721.

NOTE: If the URL ends in "pid=" instead of "id=" that is not the correct ID. That is a specific posts ID not the topic ID.

We write these numbers into the array further down the page (about 10 lines down from here)
*/

// This include only executes when viewing a topic
if (basename($_SERVER['PHP_SELF'], '.php')=="viewtopic") {

	// Get Topic ID being viewed...
	if(isset($_GET['id']) && is_numeric($_GET['id'])) { 

	// Set the topic ids we want to show this include on
	$onlyshowonids = array(6817,6803,6721);
	
	// If the topic being viewed is in the list of IDs above we execute the include
	if (in_array($_GET['id'], $onlyshowonids)) { 
	
	// Whatever you want to show on these three topics is added below 
	?>
		
			<div class="include">
				<h4>Lorem Ipsum</h4>
				<p>Is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
			</div>
		
	<?php
	# Do not edit below this line.
	}
	}	
} ?>		