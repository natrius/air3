<?php
/*
Using FluxBB.org as an example, lets say the FluxBB developers wanted to add a "Search This Forum" module,
but they only wanted to show it in the following forums:-

General support (1.4 / 1.5)
Modifications (1.4 / 1.5)
General support (1.2)
Modifications (1.2)

When a user is viewing the Modifications (1.4 / 1.5) forum we want our "Search This Forum" module to be limited to only show results from that forum.
This way a user can quickly search for modifications without having to go to the Search page.

Similiarly, if viewing the 1.2 forum we want results to be limited to show mods for only 1.2

// So lets begin...

// Tell this include to execute only when viewing a forum... */
if (basename($_SERVER['PHP_SELF'], '.php')=="viewforum") {

	// AND only if the Forum ID is in the below array
	$quicksearchforumids = array(26,28,11,19);

	// When a user views a forum we Get the Forum ID they are viewing...
	if(isset($_GET['id']) && is_numeric($_GET['id'])) { 
	
	// If the forum being viewed is in our array above...
	if (in_array($_GET['id'], $quicksearchforumids)) { 
	
	// We will show the quick search box...
?>
<div class="include">
<h4>Quick Search This Forum</h4>
		<form id="search" method="get" action="search.php">
			<input type="hidden" name="action" value="search" />
			<!-- Keyword Search -->
			<label class="conl"><?php echo $lang_includes['Keyword search']; ?><br /><input type="text" name="keywords" size="40" maxlength="100" /><br /></label>
			<input type="hidden" name="forums[]" value="<?php echo $_GET['id']; ?>" /> 		<!-- Forum ID being viewed, and which we limit our results too -->
			<input type="hidden" name="search_in" value="-1" /> 	<!-- This will limit searches to subject only -->
			<input type="hidden" name="sort_by" value="2" />		<!-- This will sort the search results alphabetically -->
			<input type="hidden" name="sort_dir" value="ASC" /> 	<!-- Ascending order instead of Descending order (default) -->
			<input type="hidden" name="show_as" value="topics" /> 	<!-- Show Results As Topics -->
			<input type="submit" name="search" class="submitBtn" value="Submit" accesskey="s" />
		</form>
</div>

<?php	}
	}
}
?>