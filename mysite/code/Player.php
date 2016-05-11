<?php

class Player extends DataObject {

    private static $db = array(
        'PlayerNumber' => 'Int',
        'FirstName' => 'Varchar(255)',
        'LastName' => 'Text',
        'Birthday' => 'Date'
    );
}

/*
$player = Player::create();

$player->FirstName = "yahoo";
$player->PlayerNumber = 9;

$player->write();

*/

for ($i = 0; $i < 5; $i++)
{

$playerdata = Player::get();
$playerdata = $playerdata->filter(array('PlayerNumber' => $i));
$ExistPlaynum = $playerdata->count();

	if(!$ExistPlaynum)
	{
	$player = Player::create();

	$player->FirstName = "first_".rand(0,50);
	$player->LastName = "last_".rand(50,100);
	$player->PlayerNumber = $i;
	$player->Birthday = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " - ".rand(1,5)." years"));
	$player->write();
	}
	/*else{
	$playerdata->LastName = "last_".rand();
	$playerdata->write();
	}*/
	
}


