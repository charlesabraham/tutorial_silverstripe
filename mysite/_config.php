<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	'type' => 'MySQLDatabase',
	'server' => 'localhost',
	'username' => 'root',
	'password' => 'suyati123',
	'database' => 'silverstripe',
	'path' => ''
);

// Set the site locale
i18n::set_locale('en_US');





SS_Log::add_writer(new SS_LogFileWriter('../silverstripe-errors-warnings.log'), SS_Log::WARN, '<=');

// or just errors
SS_Log::add_writer(new SS_LogFileWriter('../silverstripe-errors.log'), SS_Log::ERR);

// or notices (e.g. for Deprecation Notifications)
SS_Log::add_writer(new SS_LogFileWriter('../silverstripe-errors-notices.log'), SS_Log::NOTICE);


//shortcode
ShortcodeParser::get('default')->register('my_shortcode', array('Page', 'MyCustomShortCode'));

ShortcodeParser::get('default')->register('my_math', array('Page', 'calculator'));

/*
SS_Log::log('Description of the error', SS_Log::WARN);
SS_Log::log('Description of the error', SS_Log::ERR);
SS_Log::log('Description of the error', SS_Log::NOTICE);
SS_Log::log('Description of the error', SS_Log::DEBUG);
*/
