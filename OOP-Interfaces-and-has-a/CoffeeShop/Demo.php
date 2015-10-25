<?php
	require_once('CoffeeShop.php');
	require_once('Person.php');
	require_once('Bartender.php');
	require_once('Client.php');

	$coffee_shop1 = new CoffeeShop('Starbucks', '148 F. Street', 100, 'Rock');
	$coffee_shop2 = new CoffeeShop('Costa', '56 Fifth Street', 112, 'Pop');
	$coffee_shop3 = new CoffeeShop('Aida', '144 Sesame Street', 200, 'Jazz');

	$bartender1 = new Bartender('James Lincoln', 'male', 'Jazz', '255-656-484', 1250);
	$bartender2 = new Bartender('Catherine McDonald', 'female', 'Pop', '148-256-656', 1330);
	$bartender3 = new Bartender('Caroline Grace Rosewood', 'female', 'Rock', '254-775-984', 1400);
	$bartender4 = new Bartender('Smith Cronewell', 'male', 'Jazz', '102-024-986', 1130);
	$bartender5 = new Bartender('Nigel Rutherford', 'male', 'Clssic', '846-235-431', 1240);
	$bartender6 = new Bartender('Alexandra Fox', 'female', 'Country', '255-656-484', 1160);

	$client1 = new Client('Victoria Smith', 'female', 'Rock', 25);
	$client2 = new Client('Angel Warner', 'female', 'Jazz', 15);
	$client3 = new Client('Payton List', 'female', 'Soul', 17);
	$client4 = new Client('Carter Harper', 'male', 'Heavy Metal', 32);
	$client5 = new Client('Sam Johnson', 'male', 'Pop', 24);
	$client6 = new Client('Max Nellbourne', 'male', 'Hard Rock', 26);
	$client7 = new Client('Teresa Cones', 'female', 'Hip-Hop', 18);


	$coffee_shop1->add_bartender($bartender1);
	$coffee_shop1->add_bartender($bartender2);
	$coffee_shop1->add_client($client1);
	$coffee_shop1->add_client($client2);
	$coffee_shop1->add_client($client3);
	$coffee_shop1->add_client($client4);
	$coffee_shop2->add_client($client5);
	$coffee_shop2->add_bartender($bartender3);
	$client1->get_club_card(30);
	$client1->pay_bill('VISA credit card');
	$client1->show_client();

	$coffee_shop1->show_shop();
	$coffee_shop1->working_hours();
	$coffee_shop2->show_shop();
	$coffee_shop3->show_shop();

	$bartender1->deal_client($client1);
	$bartender1->deal_client($client2);
	$bartender1->show_bartender();

	echo "<hr>";
	$coffee_shop1->show_menu();
	echo "<hr/>";
	echo "<br/>";
	$bartender1->make_drink('Coffee', 'Ginger Latte');
?>