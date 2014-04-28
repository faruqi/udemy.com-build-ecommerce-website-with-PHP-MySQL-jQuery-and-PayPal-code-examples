<?php 
$id = Url::getParam('id');

if (!empty($id)) {
	
	$objCatalogue = new Catalogue();
	$product = $objCatalogue->getProduct($id);
	
	if (!empty($product)) {
	
		$objForm = new Form();
		$objValid = new Validation($objForm);
		$categories = $objCatalogue->getCategories();
			
		if ($objForm->isPost('name')) {
			
			$objValid->_expected = array(
				'category',
				'name',
				'description',
				'price'
			);
			
			$objValid->_required = array(
				'category',
				'name',
				'description',
				'price'
			);
			
			if ($objValid->isValid()) {
				
				if ($objCatalogue->updateProduct($objValid->_post, $id)) {
				
					$objUpload = new Upload();
					
					if ($objUpload->upload(CATALOGUE_PATH)) {
					
						if (is_file(CATALOGUE_PATH.DS.$product['image'])) {
							unlink(CATALOGUE_PATH.DS.$product['image']);
						}
					
						$objCatalogue->updateProduct(array('image' => $objUpload->_names[0]), $id);
						Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=edited');
					} else {
						Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=edited-no-upload');
					}
					
				} else {
					Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=edited-failed');
				}
				
			}
			
		}
		
		require_once('template/_header.php'); 
?>
	
	<h1>Products :: Edit</h1>
	
	<form action="" method="post" enctype="multipart/form-data">
		
		<table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
			
			<tr>
				<th><label for="category">Category: *</label></th>
				<td>
					<?php echo $objValid->validate('category'); ?>
					<select name="category" id="category" class="sel">
						<option value="">Select one&hellip;</option>
						<?php if (!empty($categories)) { ?>
							<?php foreach($categories as $cat) { ?>
							<option value="<?php echo $cat['id']; ?>"
							<?php echo $objForm->stickySelect('category', $cat['id'], $product['category']); ?>>
							<?php echo Helper::encodeHtml($cat['name']); ?>
							</option>
							<?php } ?>
						<?php } ?>
					</select>
				</td>
			</tr>
			
			<tr>
				<th><label for="name">Name: *</label></th>
				<td>
					<?php echo $objValid->validate('name'); ?>
					<input type="text" name="name" id="name" 
						value="<?php echo $objForm->stickyText('name', $product['name']); ?>" class="fld" />
				</td>
			</tr>
			
			<tr>
				<th><label for="description">Description: *</label></th>
				<td>
					<?php echo $objValid->validate('description'); ?>
					<textarea name="description" id="description" cols="" rows=""
						class="tar_fixed"><?php echo $objForm->stickyText('description', $product['description']); ?></textarea>
				</td>
			</tr>
			
			<tr>
				<th><label for="price">Price: *</label></th>
				<td>
					<?php echo $objValid->validate('price'); ?>
					<input type="text" name="price" id="price" 
						value="<?php echo $objForm->stickyText('price', $product['price']); ?>" class="fld_price" />
				</td>
			</tr>
			
			<tr>
				<th><label for="image">Image:</label></th>
				<td>
					<?php echo $objValid->validate('image'); ?>
					<input type="file" name="image" id="image" size="30" />
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