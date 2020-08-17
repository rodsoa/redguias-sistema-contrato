<?php

namespace App\Mail;

use App\Domain\Models\Tables\Agreement;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AgreementMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $agreement)
    {
        $this->data = $agreement;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->text('agreements.email')
            ->subject('RedGUIAS - Financeiro')
            ->attachData(
                $this->data,
                'contrato-redguias-'.date('Y').'.pdf',
                [
                    'as' => 'contrato-redguias-'.date('Y'),
                    'mime' => 'application/pdf'
                ]
            );
    }
}
