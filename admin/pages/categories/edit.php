<?php 
$id = Url::getParam('id');

if (!empty($id)) {
	
	$objCatalogue = new Catalogue();
	$category = $objCatalogue->getCategory($id);
	
	if (!empty($category)) {
	
		$objForm = new Form();
		$objValid = new Validation($objForm);
			
		if ($objForm->isPost('name')) {
			
			$objValid->_expected = array('name');			
			$objValid->_required = array('name');
			
			$name = $objForm->getPost('name');
			
			if ($objCatalogue->duplicateCategory($name, $id)) {
				$objValid->add2Errors('name_duplicate');
			}
			
			if ($objValid->isValid()) {
				
				if ($objCatalogue->updateCategory($name, $id)) {
					Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=edited');
				} else {
					Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=edited-failed');
				}
				
			}
			
		}
		
		require_once('template/_header.php'); 
?>
	
	<h1>Categories :: Edit</h1>
	
	<form action="" method="post">
		
		<table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
			
			<tr>
				<th><label for="name">Name: *</label></th>
				<td>
					<?php 
						echo $objValid->validate('name'); 
						echo $objValid->validate('name_duplicate');
					?>
					<input type="text" name="name" id="name" 
						value="<?php echo $objForm->stickyText('name', $category['name']); ?>" class="fld" />
				</td>
			</tr>
			
			<tr>
				<th>&nbsp;</th>
				<td>
					<label for="btn" class="sbm sbm_blue fl_l">
						<input type="submit" id="btn" class="btn" value="Update" />
					</label>
				</td>
			</tr>
			
			
		</table>
		
	</form>

<?php 
		require_once('template/_footer.php'); 
	}
}
?>