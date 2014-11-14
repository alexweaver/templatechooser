<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Template Chooser');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>
	</title>
	<?php
		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js');
		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js');
		echo $this->Html->script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js');

		echo $this->Html->css('//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css');
		echo $this->Html->css('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css');

		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
			<?php echo $this->element('navbar'); ?>
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		<?php echo $this->element('sql_dump'); ?>
</body>
</html>
