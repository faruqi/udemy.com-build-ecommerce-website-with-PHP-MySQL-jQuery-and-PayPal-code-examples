<?php
$id = Url::getParam('id');
if (!empty($id)) {
	
	$objOrder = new Order();
	$order = $objOrder->getOrder($id);
	
	if (!empty($order)) {
		
		$items = $objOrder->getOrderItems($id);
		
		$objCatalogue = new Catalogue();
		
		$objUser = new User();
		$user = $objUser->getUser($order['client']);
		
		$objCountry = new Country();
		
		$objBusiness = new Business();
		$business = $objBusiness->getBusiness();
		
		$objBasket = new Basket();
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Invoice</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta http-equiv="imagetoolbar" content="no" />
<link href="/css/invoice.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="wrapper">
	
	<h1>Invoice</h1>
	
	<div style="width:50%;float:left">		
		<p><strong>To:</strong>
		<?php echo $user['first_name']." ".$user['last_name']; ?><br />
		<?php echo $user['address_1']; ?><br />
		<?php echo !empty($user['address_2']) ? $user['address_2'].'<br />' : null; ?>
		<?php echo $user['town']; ?><br />
		<?php echo $user['county']; ?><br />
		<?php echo $user['post_code']; ?><br />
		<?php
			$country = $objCountry->getCountry($user['country']);
			echo $country['name'];
		?>
		</p>		
	</div>
	<div style="width:50%;float:right;text-align:right;">
		<p><strong><?php echo $business['name']; ?></strong><br />
		<?php echo nl2br($business['address']); ?><br />
		<?php echo $business['telephone']; ?><br />
		<?php echo $business['email']; ?><br />
		<?php echo $business['website']; ?>
		</p>
	</div>
	
	<div class="dev">&#160;</div>
	
	<h3>Order number <?php echo $id; ?></h3>
	
	<table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
		
		<tr>
			<th>Item</th>
			<th class="ta_r">Qty</th>
			<th class="ta_r col_15">Price</th>
		</tr>
		
		<?php foreach($items as $item) { ?>
		
			<tr>
				<td>
					<?php
						$product = $objCatalogue->getProduct($item['product']);
						echo $product['name'];
					?>
				</td>
				<td class="ta_r"><?php echo $item['qty']; ?></td>
				<td class="ta_r">
					&pound;<?php echo number_format($objBasket->itemTotal($item['price'], $item['qty']), 2); ?>
				</td>
			</tr>
		
		<?php } ?>
		
		<?php if ($order['vat_rate'] != 0) { ?>
			
			<tr>
				<td colspan="2" class="br_td">Sub-total:</td>
				<td class="ta_r br_td">
					&pound;<?php echo number_format($order['subtotal'], 2); ?>
				</td>
			</tr>
			
			<tr>
				<td colspan="2" class="br_td">
					VAT (<?php echo $order['vat_rate']; ?>%):
				</td>
				<td class="ta_r br_td">
					&pound;<?php echo number_format($order['vat'], 2); ?>
				</td>
			</tr>
			
		<?php } ?>
		
		<tr>
			<td colspan="2" class="br_td"><strong>Total:</strong></td>
			<td class="ta_r br_td">
				<strong>&pound;<?php echo number_format($order['total'], 2); ?></strong>
			</td>
		</tr>
		
	</table>
	
	<div class="dev br_td">&nbps;</div>
	
	<p><a href="#" onclick="window.print(); return false;">Print this invoice</a></p>
	
</div>

</body>
</html>

<?php } } ?>