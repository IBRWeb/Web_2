<?php

Admin::model('\App\DevotionalPost')->title('Devocionales')->display(function ()
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
		FormItem::text('title', 'Title'),
		FormItem::text('author', 'Author'),
		FormItem::text('slug', 'Slug'),
		FormItem::select('image_id', 'Image')->model('App\Image')->display('title'),
		FormItem::ckeditor('content', 'Content'),
	]);
	return $form;
});