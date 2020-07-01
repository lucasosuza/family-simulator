<?php
session_start();

require '../vendor/autoload.php';

$family = Controller::buildFamily();

if( isset( $_REQUEST['control'] ) ) {
	if( $_REQUEST['control'] == 'reset' ) {
		session_destroy();
		return;
	}

	if( !isset( $family['count'] ) )
            $family['count'] = 0;

	if( $_REQUEST['control'] == 'add_dad' ) {
		if( isset( $family['dad'] ) ) {
			echo 'ERROR: The family already has a dad. (No support for modern families yet. :))';
		} else {
			$family['dad'] = 1;
			$family['count']++;
		}
	}

	if( $_REQUEST['control'] == 'add_mum' ) {
		if( isset( $family['mum'] ) ) {
			echo 'ERROR: The family already has a mum. (No support for modern families yet. :))';
		} else {
			$family['mum'] = 1;
			$family['count']++;
		}
	}

	if( $_REQUEST['control'] == 'add_child' ) {
		if( ! isset( $family['mum'] ) || ! isset( $family['dad'] ) ) {
			echo 'ERROR: No child without a mum and a dad.';
		} else {

			if( ! isset( $family['children'] ) ) {
				$family['children'] = 1;
			} else {
				$family['children']++;
			}
			$family['count']++;
		}
	}

	if( $_REQUEST['control'] == 'add_cat' ) {
		if( ! isset( $family['mum'] ) && ! isset( $family['dad'] ) ) {
			echo 'ERROR: No cat without a mum or a dad.';
		} else {
			if( ! isset( $family['cat'] ) ) {
				$family['cat'] = 1;
			} else {
				$family['cat']++;
			}

			$family['count']++;
		}
	}

	if( $_REQUEST['control'] == 'add_dog' ) {
		if( ! isset( $family['mum'] ) && ! isset( $family['dad'] ) ) {
			echo 'ERROR: No dog without a mum or a dad.';
		} else {
			if( ! isset( $family['dog'] ) ) {
				$family['dog'] = 1;
			} else {
				$family['dog']++;
			}
			$family['count']++;
		}
	}

	if( $_REQUEST['control'] == 'add_goldfish' ) {
		if( ! isset( $family['mum'] ) && ! isset( $family['dad'] ) ) {
			echo 'ERROR: No goldfish without a mum or a dad.';
		} else {
			if( ! isset( $family['goldfish'] ) ) {
				$family['goldfish'] = 1;
			} else {
				$family['goldfish']++;
			}
			$family['count']++;
		}
	}

	$_SESSION['family'] = $family;

	return;
}


function getCosts($family) {
	$sum = 0;

	if( isset( $family['mum'] ) )
		$sum += 200;
	if( isset( $family['dad'] ) )
		$sum += 200;

	if( isset( $family['children'] ) ) {
		if( $family['children'] > 2 ) {
			$sum += $family['children'] * 100;
		} else {
			$sum += $family['children'] * 150;
		}
	}

	if( isset( $family['cat'] ) )
		$sum += $family['cat'] * 10;

	if( isset( $family['dog'] ) )
		$sum += $family['dog'] * 15;

	if( isset( $family['goldfish'] ) )
		$sum += $family['goldfish'] * 2;

	return $sum;
}

function sum() {


	$family = Controller::buildFamily();

	var_dump($family);

	if( !isset( $family) || empty($family->getCount()) ) {
		echo ' ';
		return;
	}

	if( $family['count'] > 0 ) {
		echo '<h2>Family</h2>';

		echo '<ul>';
		if( isset( $family['mum'] ) )
			echo '<li>Mum: ' . $family['mum'] . '</li>';
		if( isset( $family['dad'] ) )
			echo '<li>Dad: ' . $family['dad'] . '</li>';
		if( isset( $family['children'] ) )
			echo '<li>Children: ' . $family['children'] . '</li>';
		if( isset( $family['cat'] ) )
			echo '<li>Cats: ' . $family['cat'] . '</li>';
		if( isset( $family['dog'] ) )
			echo '<li>Dogs: ' . $family['dog'] . '</li>';
		if( isset( $family['goldfish'] ) )
			echo '<li>Goldfish: ' . $family['goldfish'] . '</li>';


		echo '<li><b>Total Members</b>: ' . $family['count'] . '</li>';
		echo '<li><b>Monthly Food Costs</b>: ' . getCosts($family) . ' $ </li>';


		echo '</ul>';
	}
}

if( isset( $_REQUEST['refresh'] ) ) {
	echo sum();
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
<input type="submit" name="add_cat" value="Add Cat" />
<input type="submit" name="add_dog" value="Add Dog" />
<input type="submit" name="add_goldfish" value="Add Goldfish" />
<input type="submit" name="reset" value="Reset" />
</form>

<div>
	<?php echo sum() ?>
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

