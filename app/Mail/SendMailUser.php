<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $nome;
    public $email;
    public $senha;

    public function __construct($nome, $email, $senha)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Usuário Training System')
                    //->from('emaildobrenomol@gmail.com') pega do default no env
                    ->view('emails.novo_usuario')
                    ->with([
                        'nome' => $this->nome,
                        'email' => $this->email,
                        'senha' => $this->senha,
                    ]);
    }
}
