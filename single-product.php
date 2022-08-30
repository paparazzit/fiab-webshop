
<?php 
require 'backend/core/init.php';

$part_id = filter_var($_GET['id']);

$item = getSinglePart($part_id);

$additionalImages = getRelatedImages($part_id);

dd(ROOT);
require 'views/single-product.view.php';?>