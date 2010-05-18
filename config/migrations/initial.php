<?php
class M4bf1fd93da004fb59c6cc7ebbe0b1c33 extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'projects' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
					'user_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'index'),
					'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45),
					'description' => array('type' => 'text', 'null' => true, 'default' => NULL),
					'open' => array('type' => 'boolean', 'null' => false, 'default' => '1', 'key' => 'index'),
					'submission_count' => array('type' => 'integer', 'null' => false, 'default' => '0'),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'user_id' => array('column' => 'user_id', 'unique' => 0),
						'open' => array('column' => 'open', 'unique' => 0),
					),
				),
				'submissions' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
					'user_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'index'),
					'project_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'index'),
					'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
					'description' => array('type' => 'text', 'null' => true, 'default' => NULL),
					'time_taken' => array('type' => 'integer', 'null' => false, 'default' => '0'),
					'file_name' => array('type' => 'text', 'null' => true, 'default' => NULL),
					'file_size' => array('type' => 'integer', 'null' => false, 'default' => '0'),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'user_id' => array('column' => 'user_id', 'unique' => 0),
						'project_id' => array('column' => 'project_id', 'unique' => 0),
					),
				),
				'users' => array(
					'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
					'email' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'index'),
					'display_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
					'password' => array('type' => 'string', 'null' => false, 'default' => NULL),
					'validation_token' => array('type' => 'string', 'null' => false, 'default' => NULL),
					'validated' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'key' => 'index'),
					'banned' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'key' => 'index'),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'email' => array('column' => 'email', 'unique' => 0),
						'validated' => array('column' => 'validated', 'unique' => 0),
						'banned' => array('column' => 'banned', 'unique' => 0),
					),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'projects', 'submissions', 'users'
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
