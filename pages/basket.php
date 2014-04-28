<?php 
$session = Session::getSession('basket');

$objBasket = new Basket();

$out = array();

if (!empty($session)) {
	$objCatalogue = new Catalogue();
	foreach($session as $key => $value) {
		$out[$key] = $objCatalogue->getProduct($key);
	}
}

require_once('_header.php'); 
?>

<h1>Basket</h1>

<?php if (!empty($out)) { ?>
<div id="big_basket">
	<form action="" method="post" id="frm_basket">
	<table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
		<tr>
			<th>Item</th>
			<th class="ta_r">Qty</th>
			<th class="ta_r col_15">Price</th>
			<th class="ta_r col_15">Remove</th>
		</tr>
		
		<?php foreach($out as $item) { ?>
		
		<tr>
			<td><?php echo Helper::encodeHTML($item['name']); ?></td>
			<td><input type="text" name="qty-<?php echo $item['id']; ?>"
					id="qty-<?php echo $item['id']; ?>" class="fld_qty"
					value="<?php echo $session[$item['id']]['qty']; ?>" /></td>
			<td class="ta_r">&pound;<?php echo number_format($objBasket->itemTotal($item['price'], $session[$item['id']]['qty']), 2); ?></td>
			<td class="ta_r"><?php echo Basket::removeButton($item['id']); ?></td>
		</tr>
		
		<?php } ?>
		
		<?php if ($objBasket->_vat_rate != 0) { ?>
		
		<tr>
			<td colspan="2" class="br_td">Sub-total:</td>
			<td class="ta_r br_td">&pound;<?php echo number_format($objBasket->_sub_total, 2); ?></td>
			<td class="ta_r br_td">&#160;</td>
		</tr>
		<tr>
			<td colspan="2" class="br_td">VAT (<?php echo $objBasket->_vat_rate; ?>%):</td>
			<td class="ta_r br_td">&pound;<?php echo number_format($objBasket->_vat, 2); ?></td>
			<td class="ta_r br_td">&#160;</td>
		</tr>
		
		<?php } ?>
		
		<tr>
			<td colspan="2" class="br_td"><strong>Total:</strong></td>
			<td class="ta_r br_td"><strong>&pound;<?php echo number_format($objBasket->_total, 2); ?></strong></td>
			<td class="ta_r br_td">&#160;</td>
		</tr>
	</table>
	
	<div class="dev br_td">&#160;</div>
	
	<div class="sbm sbm_blue fl_r">
		<a href="/?page=checkout" class="btn">Checkout</a>
	</div>
	
	<div class="sbm sbm_blue fl_l update_basket">
		<span class="btn">Update</span>
	</div>
	
	</form>
</div>
<?php } else { ?>

<p>Your basket is currently empty.</p>

<?php } ?>
<?php require_once('_footer.php'); ?>