<?php
/**
 * Slavitica Sketch MiniSite
 *
 * Copyright (c) 2010 Graham Weldon
 * Licensed under the LGPL GNU Lesser General Public License
 * Redistributions of files must retain the above copyright notice
 *
 * @author Graham Weldon (http://grahamweldon.com)
 * @copyright Copyright (c) 2010 Graham Weldon
 * @license LGPL GNU Lesser General Public License (http://www.gnu.org/licenses/lgpl.html)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Sketch: A Slavitica MiniSite'); ?> -
		<?php echo $title_for_layout; ?>
	</title>
	<?php
	echo $this->Html->meta('icon');
	echo $this->Html->css('reset');
	echo $this->Html->css('clearfix');
	echo $this->Html->css('styles');
	echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container" class="clearfix">
		<div id="header" class="clearfix">
			<h1><?php echo $this->Html->link(__('Sketch: A Slavitica MiniSite', true), '/'); ?></h1>
			<?php echo $this->element('navigation'); ?>
		</div>
		<div id="content" class="clearfix">
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
		</div>
		<?php echo $this->element('footer'); ?>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>