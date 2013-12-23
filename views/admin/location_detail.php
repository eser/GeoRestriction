<?php
	$id = $id_location;
?>

<form name="locationForm<?php echo $id ?>" id="locationForm<?php echo $id ?>" action="<?php echo admin_url() ?>module/georestriction/location/save">

	<!-- Hidden fields -->
	<input id="id_location<?php echo $id ?>" name="id_location" type="hidden" value="<?php echo $id ?>" />

	<!-- Name -->
	<dl class="small">
		<dt>
			<label for="name<?php echo $id ?>"><?php echo lang('ionize_label_name')?></label>
		</dt>
		<dd>
			<!--
			The validation of this mandatory field is first done by JS
			by adding the attribute data-validators="required"
			see : http://mootools.net/docs/more/Forms/Form.Validator#Validators
			-->
			<input id="name<?php echo $id ?>" name="name" class="inputtext required" type="text" value="<?php echo $name ?>" data-validators="required" />
		</dd>
	</dl>

	<!-- Name -->
	<dl class="small">
		<dt>
			<label for="shortname<?php echo $id ?>"><?php echo lang('ionize_label_shortname')?></label>
		</dt>
		<dd>
			<!--
			The validation of this mandatory field is first done by JS
			by adding the attribute data-validators="required"
			see : http://mootools.net/docs/more/Forms/Form.Validator#Validators
			-->
			<input id="shortname<?php echo $id ?>" name="shortname" class="inputtext required" type="text" value="<?php echo $shortname ?>" data-validators="required" />
		</dd>
	</dl>

</form>

<!-- Save / Cancel buttons
	 Must be named bSave[windows_id] where 'window_id' is the used ID
	 or the window opening through ION.formWindow()
-->
<div class="buttons">
	<button id="bSavelocation<?php echo $id ?>" type="button" class="button yes right"><?php echo lang('ionize_button_save_close') ?></button>
	<button id="bCancellocation<?php echo $id ?>"  type="button" class="button no right"><?php echo lang('ionize_button_cancel') ?></button>
</div>



<script type="text/javascript">

	// Tabs init
	new TabSwapper({
		tabsContainer: 'locationTab<?php echo $id ?>',
		sectionsContainer: 'locationTabContent<?php echo $id ?>',
		selectedClass: 'selected',
		tabs: 'li',
		clickers: 'li a',
		sections: 'div.tabcontent<?php echo $id ?>'
	});

	// Autogrow textareas of the given form ID
	ION.initFormAutoGrow('locationForm<?php echo $id ?>');

</script>