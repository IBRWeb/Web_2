<?php namespace App\Helpers;

use Illuminate\Mail\Mailer;

class MailSender {

    public function __construct(Mailer $mail)
    {
        $this->mail = $mail;
        $this->contactEmail = 'contacto@ibresurreccion.org.mx';
        $this->contactEmailAlias = 'Contacto IBR';
        $this->infoEmail = 'info@ibresurreccion.org.mx';
        $this->infoEmailAlias = 'Información IBR';
        $this->adminEmail = 'admin@ibresurreccion.org.mx';
        $this->adminEmailAlias = 'Administrador IBR';
        $this->ministerEmail = 'pastor@ibresurreccion.org.mx';
        $this->ministerEmailAlias = 'Pastor IBR';
        $this->treasuryEmail = 'tesoreria@ibresurreccion.org.mx';
        $this->treasuryEmailAlias = 'Tesoreria IBR';
    }

    public function prayerMail($model)
    {
        $this->mail->send('emails.prayer', $model->attributesToArray(), function($message) use ($model)
        {
           $message->to($model->petitioner_email, $model->petitioner_name)
               ->cc($this->infoEmail)
               ->from($this->contactEmail, $this->contactEmailAlias)
               ->subject('Tu petición ha sido recibida');
        });
    }

    public function contactMail($request)
    {
        $this->mail->send('emails.contact', $request->except('_token'), function($message) use ($request)
        {
            $message->to($request->get('email'), $request->get('name'))
                ->cc($this->infoEmail)
                ->from($this->contactEmail, $this->contactEmailAlias)
                ->subject('Mensaje de Contacto IBR');
        });
    }



}