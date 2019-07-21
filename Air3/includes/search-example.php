<div class="include">
<h4><?php echo $lang_includes['Search']; ?></h4>
		<form id="search" method="get" action="search.php">
			<input type="hidden" name="action" value="search" />
			<!-- Keyword Search -->
			<label class="conl"><?php echo $lang_includes['Keyword search']; ?><br /><input type="text" name="keywords" size="40" maxlength="100" /><br /></label>
			<?php 
			/* 
			If you want to customise your Quick Search box you can use the example codes found below.

			Simply copy any code you want between the BEGIN and END tags further down the page and edit the value to your needs where stated.
			
			## 1. SEARCH IN
			----------------------
			
			# By default the search box will search all forums the user has access to.
			
			# If you want to limit the Search Results to a specific forum use the below line of code (changing "1" to the forum id you want):
			<input type="hidden" name="forums[]" value="1" />

			# If you want to limit the Search Results to multiple forums use the above line of code again, eg it would look like this for forum IDs 1, 2, and 3:
			<input type="hidden" name="forums[]" value="1" />
			<input type="hidden" name="forums[]" value="2" />
			<input type="hidden" name="forums[]" value="3" />
			
			## 2. SEARCH IN
			----------------------
			# By default it will search in topic subject and message text. This can be changed as follows.
			
			# If you want to only search in topic subjects add the following
			<input type="hidden" name="search_in" value="-1" />
			
			# If you only want to search in message text add
			<input type="hidden" name="search_in" value="1" />
			
			## 3. SORT BY
			----------------------
			# By default it will show results based on there last post. We can change this behaviour too.
			
			# Sort by Author
			<input type="hidden" name="sort_by" value="1" />
			
			# Sort by Subject
			<input type="hidden" name="sort_by" value="2" />
			
			# Sort by Forum
			<input type="hidden" name="sort_by" value="3" />

			## 4. SORT ORDER
			----------------------
			
			# By default it will show results in Descending order (eg. Z-A, Newest-Oldest). Change this by adding the below line of code.
			<input type="hidden" name="sort_dir" value="ASC" />
			*/
			?>
			<!-- BEGIN: Custom Search Settings -->
			
			
			<!-- END: Custom Search Settings -->
			
			<?php # Finally, to show Search Results as topics or posts simply change value="posts" to value="topics" below ?>
			<input name="show_as" value="posts" type="hidden" />

			<input type="submit" name="search" class="submitBtn" value="Submit" accesskey="s" />
		</form>
</div>