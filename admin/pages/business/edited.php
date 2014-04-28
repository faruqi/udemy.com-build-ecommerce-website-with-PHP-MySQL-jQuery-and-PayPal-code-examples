<?php
$url = '/admin'.Url::getCurrentUrl(array('action', 'id'));
require_once('template/_header.php');
?>
<h1>Business</h1>
<p>The record has been updated successfully.<br />
<a href="<?php echo $url; ?>">Go back to the business record.</a></p>
<?php require_once('template/_footer.php'); ?>