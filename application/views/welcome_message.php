<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
</head>
<body>
	<?php
	echo form_open_multipart('Welcome/uploadVideo');
	?>
	<input type="file" name="video_file">
	<input type="submit" name="upload" value="upload">
	<?php
	echo form_close();
	?>
	<a href="<?php echo base_url('Welcome/uploadVideo');?>">click</a>
</body>
</html>