<?php
require '../vendor/autoload.php';

$family = FamilyDao::getFamily();

if( isset( $_REQUEST['control'] ) ) {
	if( $_REQUEST['control'] == 'reset' ) {
	    // fixme their is a bug here
		FamilyDao::reset();
		return;
	}

	if( $_REQUEST['control'] == 'add_dad' ) {
		$family->addDad();
	}

	if( $_REQUEST['control'] == 'add_mum' ) {
		$family->addMum();
	}

	if( $_REQUEST['control'] == 'add_child' ) {
		$family->addChild();
	}

	if( $_REQUEST['control'] == 'add_cat' ) {
		$family->addCat();
	}

	if( $_REQUEST['control'] == 'add_dog' ) {
		$family->addDog();
	}

	if( $_REQUEST['control'] == 'add_goldfish' ) {
        $family->addGoldfish();
	}

    if( $_REQUEST['control'] == 'adapt_child' ) {
        $family->adaptChild();
    }

	FamilyDao::updateFamily($family);

	return;
}

if( isset( $_REQUEST['refresh'] ) ) {
	echo FamilyCosts::sum(FamilyDao::getFamily());
	return;
}
?>

<html>
<head>
	<title>Family Simulator</title>
</head>
<body>
<h1>Family Simulator</h1>
<form>
<input type="submit" name="add_mum" value="Add Mum" />
<input type="submit" name="add_dad" value="Add Dad" />
<input type="submit" name="add_child" value="Add Child" />
<input type="submit" name="adapt_child" value="Adapt Child" />
<input type="submit" name="add_cat" value="Add Cat" />
<input type="submit" name="add_dog" value="Add Dog" />
<input type="submit" name="add_goldfish" value="Add Goldfish" />
<input type="submit" name="reset" value="Reset" />
</form>

<div>
	<?php echo FamilyCosts::sum(FamilyDao::getFamily()) ?>
</div>


<script src="jquery-1.12.4.min.js"></script>
<script type="text/javascript">
	(function( $ ) {
		$( 'input' ).on( 'click', function() {
			$( 'input' ).removeAttr('data-clicked');
			$( this ).attr('data-clicked', 'clicked');
		})
		$( 'form' ).on( 'submit', function( e ) {
			e.preventDefault();

			$.ajax({
				method: "POST",
				data: { control: $( '[data-clicked]' ).attr( 'name' ) }
			}).done(function( error ) {
				if( error ) {
					alert( error );
				} else {
					$.ajax({
						method: "POST",
						data: { refresh: 1 }
					}).done(function( sum ) {
						if( sum ) {
							$( 'div' ).html( sum );
						}
					});
				}
			});
		} );
	})(jQuery);
</script>
</body>
</html>

