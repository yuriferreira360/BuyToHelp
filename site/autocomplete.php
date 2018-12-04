<?php 
$msg = "";

if(isset($_POST["btSubmit"])){
	if(empty($categorias = $_POST["inCategorias"])){
		$msg = "Você não colocou as categorias!";
	}else{
		$msg = "Você colocou as categorias!<br>";
		//var_dump($categorias);
		$array = explode(',', $categorias);
		var_dump($array);
	}
}
?>

<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>jQuery UI Autocomplete - Multiple values</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
	$( function() {
		var availableTags = [
			<?php 
			echo 
			'
			"Java",
			"JavaScript",
			"Lisp",
			"	Perl",
			"PHP",
			"Python"
			';

			?>
		];
		function split( val ) {
			return val.split( /,\s*/ );
		}
		function extractLast( term ) {
			return split( term ).pop();
		}

		$( "#tags" )
			// don't navigate away from the field on tab when selecting an item
			.on( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB &&
						$( this ).autocomplete( "instance" ).menu.active ) {
					event.preventDefault();
				}
			})
			.autocomplete({
				minLength: 0,
				source: function( request, response ) {
					// delegate back to autocomplete, but extract the last term
					response( $.ui.autocomplete.filter(
						availableTags, extractLast( request.term ) ) );
				},
				focus: function() {
					// prevent value inserted on focus
					return false;
				},
				select: function( event, ui ) {
					var terms = split( this.value );
					// remove the current input
					terms.pop();
					// add the selected item
					terms.push( ui.item.value );
					// add placeholder to get the comma-and-space at the end
					terms.push( "" );
					this.value = terms.join( ", " );
					return false;
				}
			});
	} );
	</script>
</head>
<body>

<div class="ui-widget">
	<form method="post" action="">
		<label for="tags">Categorias: </label>
		<input id="tags" size="50" name="inCategorias">
		<input type="submit" name="btSubmit">
	</form>
</div>
<div><?php echo $msg; ?></div>
</body>
</html>
