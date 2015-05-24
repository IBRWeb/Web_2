<?php

Admin::model('App\Administrator')->title('Administradores')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
        Column::string('name')->label('Usuario'),
	]);
	return $display;
})->create(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('username', 'Username')->required()->unique(),
		FormItem::text('password', 'Password')->required(),
		FormItem::text('name', 'Name')->required()->unique(),
		FormItem::select('role', 'Role')->enum(['admin', 'superAdmin'])->required(),
	]);
	return $form;
})->edit(function()
{
    $form = AdminForm::form();
    $form->items([
        FormItem::text('username', 'Username')->required()->unique(),
        FormItem::text('name', 'Name')->required()->unique(),
        FormItem::select('role', 'Role')->enum(['admin', 'superAdmin'])->required(),
    ]);
    return $form;
});