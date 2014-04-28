<?php
$url = '/admin'.Url::getCurrentUrl(array('action', 'id'));
require_once('template/_header.php');
?>
<h1>Clients :: Edit</h1>
<p>The record has been updated successfully.<br />
<a href="<?php echo $url; ?>">Go back to the list of clients.</a></p>
<?php require_once('template/_footer.php'); ?>