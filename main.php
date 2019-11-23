<?php
require_once './Product.php';
require_once './order.php';

$opts = getopt(
	"somh",
	['suggestion', 'order', 'menu', 'help'],
	$optind
);

$args = array_slice($_SERVER['argv'], $optind);

if (!array_key_exists('order', $opts) && array_key_exists('o', $opts)) {
	$opts['order'] = $opts['o'];
}

if (!array_key_exists('help', $opts) && array_key_exists('h', $opts)) {
	$opts['help'] = $opts['h'];
}

if (!array_key_exists('menu', $opts) && array_key_exists('m', $opts)) {
	$opts['menu'] = $opts['m'];
}

if (!array_key_exists('suggestion', $opts) && array_key_exists('s', $opts)) {
	$opts['suggestion'] = $opts['s'];
}

$file_menu = fopen("menu.txt", "r");

$products = [];
while (!feof($file_menu)) {
	$food_line = trim(fgets($file_menu));
	[$id, $price, $name] = explode(" ", $food_line, 3);

	$products[$id] = new Product($id, $name, $price);
}


// if ($_SERVER['argc'] < 2) {
// 	$error = <<<EOT

// Invalid arguments!!!
// Usage the following command for help.
// {$_SERVER['argv'][0]} -h

// EOT;

// 	fprintf(STDERR, "%s\n", $error);
// 	exit(0);
// }

if (array_key_exists('menu', $opts)) {
	foreach ($products as $product) {
		printf("%s %-20s %5s\n", $product->id, $product->name, number_format($product->price, 2));
	}
}


// if (array_key_exists('h', $opts)) {
// 	$message = <<<EOT
// usage: {$_SERVER['argv'][0]} [options] [--]
// -s|--suggestion: If you don't want to see menu, we'll provide you the suggestion.
// -o|--order: To see the menu and take the order.
// -m|--menu: To see menu.
// -e|--exit.
// EOT;
// 	printf("\n%s", $message);
// 	exit(0);
// }

// $choice = 0;

// if (array_key_exists('s', $opts)) {
// 	printf("\n------------------date------------------");
// 	printf("\n\t1) Monday ");
// 	printf("\n\t2) Tuesday ");
// 	printf("\n\t3) Wednesday ");
// 	printf("\n\t4) Thursday ");
// 	printf("\n\t5) Friday ");
// 	printf("\n\t6) Saturday ");
// 	printf("\n\t7) Sunday ");
// 	printf("\nPlease choose a date.");
// 	fscanf(STDIN, "%d", $choice);

// 	if ($choice == 1) {
// 		printf("\n------------------Suggestion------------------");
// 		printf("\n\t%s %d Bhat.", $menu[7][1], $menu[7][2]);
// 	} else if ($choice == 2) {
// 		printf("\n------------------Suggestion------------------");
// 		printf("\n\t%s %d Bhat.", $menu[8][1], $menu[8][2]);
// 	} else if ($choice == 3) {
// 		printf("\n------------------Suggestion------------------");
// 		printf("\n\t%s %d Bhat.", $menu[9][1], $menu[9][2]);
// 	} else if ($choice == 4) {
// 		printf("\n------------------Suggestion------------------");
// 		printf("\n\t%s %d Bhat.", $menu[10][1], $menu[10][2]);
// 	} else if ($choice == 5) {
// 		printf("\n------------------Suggestion------------------");
// 		printf("\n\t%s %d Bhat.", $menu[11][1], $menu[11][2]);
// 	} else if ($choice == 6) {
// 		printf("\n------------------Suggestion------------------");
// 		printf("\n\t%s %d Bhat.", $menu[12][1], $menu[12][2]);
// 	} else if ($choice == 7) {
// 		printf("\n------------------Suggestion------------------");
// 		printf("\n\t%s %d Bhat.", $menu[13][1], $menu[13][2]);
// 	} else {
// 		printf("\n------------------Suggestion------------------");
// 		printf("\n\tPlease enter the correct number~");
// 	}
// }

if (array_key_exists('order', $opts)) {
	$cart = [];

	while (true) {
		echo "Please input the meal serial number and quantity(eg. FD0001 5 or F for finish): ";
		fscanf("%s", $input);

		if ($input == 'f' || $input == 'F') {
			break;
		}

		[$id, $quantity] = explode(" ", $input);


		// for ($j = 1; $j <= $n; $j++) {
		// 	if ($number[$i] == $menu[$j][0]) {
		// 		$list[$i] = new ordering($menu[$j][0], $menu[$j][1], $menu[$j][2], $amount[$i]);
		// 		$cart[$i] = $list[$i]->putintocart();
		// 		$list[$i]->total($list[$i]->price(), $list[$i]->amount());
		// 		$total = $total + $list[$i]->showtotal();
		// 	}
		// }
		// printf("\nDo you want to continue ordering(y/n)? ");
		// fscanf(STDIN, "%s", $input1);
		// if ($input1 == 'N' || $input1 == 'n') break;
	}
	// echo "Total :" . $total;
}
