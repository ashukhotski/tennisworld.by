<?php
function getex($filename) {
	return end(explode(".", $filename));
}
if ($_FILES['upload']) {
	if (($_FILES['upload'] == 'none') or (empty($_FILES['upload']['name']))) {
		$message = "Вы не выбрали файл";
	} else if ($_FILES['upload']['size'] == 0 or $_FILES['upload']['size'] > 20500000) {
		$message = "Размер файла не соответствует нормам";
	} else if (!in_array(getex($_FILES['upload']['name']), array('jpg', 'jpeg', 'gif', 'png', 'bmp'))) {
		$message = "Файл не является изображением. Только jpg, jpeg, gif, png, bmp";
	} else if (!is_uploaded_file($_FILES['upload']['tmp_name'])) {
		$message = "Что-то пошло не так. Попытайтесь загрузить файл ещё раз.";
	} else {
		$name = rand(1, 1000).'-'.md5($_FILES['upload']['name']).'.'.getex($_FILES['upload']['name']);
		move_uploaded_file($_FILES['upload']['tmp_name'], "images/".$name);
		$full_path = 'http://tennisworld.by/images/'.$name;
		$message = "Файл ".$_FILES['upload']['name']." загружен";
	}
	$callback = $_REQUEST['CKEditorFuncNum'];
	echo '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("'.$callback.'", "'.$full_path.'", "'.$message.'");</script>';
}
?>