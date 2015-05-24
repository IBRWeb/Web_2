<?php

Admin::model('\App\Pray')->title('Oraciones')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([

	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('petitioner_name', 'Petitioner Name'),
		FormItem::text('petitioner_phone', 'Petitioner Phone'),
		FormItem::text('petitioner_email', 'Petitioner Email'),
		FormItem::checkbox('visit', 'Visit'),
		FormItem::text('address', 'Address'),
		FormItem::ckeditor('petition', 'Petition'),
	]);
	return $form;
});