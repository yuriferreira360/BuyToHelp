<?php

$status = "";

if ($status == "teste") {
	# Em teste
	header("Location: test/");
} else {
	# Em desenvolvimento
	header("Location: site/");
}
