<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header') ?>
</head>
<body class="page-body  page-fade" data-url="http://neon.dev">
<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	<?php $this->load->view('sidebar') ?>
	<div class="main-content">
		<?php $this->load->view('navbar') ?>
	</div>

</div>
	<?php $this->load->view('footer') ?>

</body>
</html>