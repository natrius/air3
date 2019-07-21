<?php
# If you <pun_include> this file in style/Victory/admin.tpl it will fetch 10 latest FluxBB.org announcements
?>
<div class="include">
<h4><?php echo $lang_includes['Fluxbb Updates']; ?></h4>
<ul>
<?php $ch = curl_init("http://fluxbb.org/forums/extern.php?action=feed&fid=1&show=10"); curl_exec($ch); curl_close($ch); ?>
</ul>
</div>