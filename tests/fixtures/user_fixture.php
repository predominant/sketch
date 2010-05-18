<?php
/* User Fixture generated on: 2010-05-18 12:05:44 : 1274150444 */
class UserFixture extends CakeTestFixture {
	var $name = 'User';

	var $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'email' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'display_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'password' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'validation_token' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'validated' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'key' => 'index'),
		'banned' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'email' => array('column' => 'email', 'unique' => 0), 'validated' => array('column' => 'validated', 'unique' => 0), 'banned' => array('column' => 'banned', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => '4bf1fe2c-28cc-4f36-b8b4-c815be0b1c33',
			'email' => 'Lorem ipsum dolor sit amet',
			'display_name' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'validation_token' => 'Lorem ipsum dolor sit amet',
			'validated' => 1,
			'banned' => 1,
			'created' => '2010-05-18 12:40:44',
			'modified' => '2010-05-18 12:40:44'
		),
	);
}
?>