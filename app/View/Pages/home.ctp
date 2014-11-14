<?php 
	echo $this->Html->script('dragrace');
	echo $this->Html->css('formbuilder');

	Configure::load('controls');
	$control_dir = Configure::read('TemplateChooser.FormControlDirectory');
	$codes = Configure::read('TemplateChooser.FormControlCodes');
?>

<div style="padding: 5px;">
	<div style="max-width: 600px; margin: auto">
		<ul class="nav nav-tabs nav-justified" data-tabs="tabs">
			<li class="active"><a href="#inputs-pane" data-toggle="tab">Inputs</a></li>
			<li><a href="#checkboxes-pane" data-toggle="tab">Checkboxes</a></li>
			<li><a href="#selects-pane" data-toggle="tab">Selects</a></li>
			<li><a href="#radios-pane" data-toggle="tab">Radios</a></li>
		</ul>
		<div class="tab-content">
			<div id="inputs-pane" class="tab-pane active">
				<?php
					foreach ($codes as $i => $code)
					{
						$element = $this->element($control_dir . $codes[$i]); 
						echo $this->element('draggable', array('element' => $element));
					}
				?>
			</div>
			<div id="checkboxes-pane" class="tab-pane">
				<div class="draggable d">
					<div class="inner-drag inner-left">
						Vertical Checkboxes
					</div>
					<div class="inner-drag inner-right">

						<div><input  type="checkbox"/><span style="margin-left: 2px" style="display: inline-block">Option 1</span>
						</div>

						<input type="checkbox"><span style="margin-botom:20px">Option 2</span></input>
					</div>
				</div>
			</div>
			<div id="red" class="tab-pane">
				<div data-name="randy" class="draggable d">
					<div class="inner-drag inner-left">
						Select Box
					</div>
					<div class="inner-drag inner-right">
						<select><option>Option 1</option></select>		
					</div>
				</div>
			</div>
		</div>
		<div id="outer-header">
			<h2 id="form-header" class="editable-header" contenteditable="true">My Form</h2>
		</div>
		<div id="droppable">
			<ul id="mylist"></ul>
		</div>
		<?php
			echo $this->Form->postButton('Save', "/forms/create/", array('class' => 'btn btn-primary', 'onclick' => 'postData()')); 
		?>

		<script>
			function postData()
			{
				var input = $('<input></input>');
				input.attr('name', 'name');
				input.val($('#form-header').text());
				input.hide();
				$("form").append(input);
			}
		</script>
	</div>
</div>

