<?php

/**
 * @return array|false
 */
function getcoverfiles($directory) {
	return array_filter(scandir($directory), function ($file) use ($directory)
		{
			return is_file("$directory/$file") && exif_imagetype("$directory/$file");
		});
}

/**
 * @return mixed
 */
function getrandomcover($coverFiles) {
	return $coverFiles[array_rand($coverFiles)];
}

/**
 * @return array|false
 */
function getcoversize($directory, $cover) {
	return getimagesize("$directory/$cover");
}

/**
 * @return bool
 */
function isvalidindex($index, $coverFiles) {
	$index = (int) $index;
	return isset($coverFiles[$index + 2]);
}

/**
 * @return mixed
 */
function getindexedcover($coverFiles, $index) {
	return $coverFiles[$index + 2];
}

/**
 * @return false|string
 */
function getcovercontents($directory, $cover) {
	return file_get_contents("$directory/$cover");
}

/**
 * @return string
 */
function generatecoverurl($cover) {
	return sprintf(
		"%s://%s/%s/covers/%s",
		isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http',
		$_SERVER['HTTP_HOST'],
		trim(dirname($_SERVER['REQUEST_URI']), '/'),
		$cover
	);
}
