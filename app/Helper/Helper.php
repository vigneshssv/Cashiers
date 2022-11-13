<?php

use Ramsey\Uuid\Uuid;

function generate_uuid() {
	$uuid = Uuid::uuid1();
	return $uuid->toString();
}