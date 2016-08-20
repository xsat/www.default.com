<?php

error_reporting(E_ALL);

try {
	include_once __DIR__ . '/../apps/common/components/Application.php';
	$application = new \Common\Application();
	echo $application->getCompressedContent();
} catch (Phalcon\Exception $e) {
	echo $e->getMessage();
} catch (PDOException $e){
	echo $e->getMessage();
}
