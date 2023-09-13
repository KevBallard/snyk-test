<?php
// allow previous activity to complete
sleep(2);

$uploadPath = JPATH_SITE.'/components/com_chronoforms6/chronoforms/uploads/';
$files = '';

try {
	if ($handle = opendir($uploadPath)) {
		while (false !== ($entry = readdir($handle))) {
			if ($entry != '.' && $entry != '..' && $entry != 'index.html') {
				unlink($uploadPath . $entry);
				$files .= $entry . PHP_EOL;
			}
		}
		closedir($handle);
	}
}
catch (Exception $e) {}

return $files;
