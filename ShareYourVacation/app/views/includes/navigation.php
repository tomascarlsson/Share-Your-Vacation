<!-- Navigation -->
<a href="<?= BASE_URI; ?>home/index">Home</a><br>
<a href="<?= BASE_URI; ?>admin/index">Admin</a><br>
<?php if (Session::get('user_email')) : ?>
	<a href="<?= BASE_URI; ?>admin/logout">Log out</a>
<?php endif; ?> 	

