<?php
require_once 'cover-utils.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$coverDir = 'covers';
$coverFiles = getcoverfiles($coverDir);

if (empty($coverFiles)) {
	echo json_encode(['error' => 'No valid image files found']);
	return;
}

$randomCover = getrandomcover($coverFiles);
$coverSize = getcoversize($coverDir, $randomCover);

if (isset($_GET['index']) && !isvalidindex($_GET['index'], $coverFiles)) {
	echo json_encode(['error' => 'Invalid index']);
	return;
}

if (isset($_GET['index'])) {
	$randomCover = getindexedcover($coverFiles, (int)$_GET['index']);
	$coverSize = getcoversize($coverDir, $randomCover);
}

if ($coverSize === false) {
	echo json_encode(['error' => 'Failed to get image size']);
	return;
}

if (isset($_GET['image_only'])) {
	header('Content-Type: image/webp');
	echo getcovercontents($coverDir, $randomCover);
	return;
}

echo json_encode([
	'cover' => generatecoverurl($randomCover),
	'width' => $coverSize[0],
	'height' => $coverSize[1]
]);
