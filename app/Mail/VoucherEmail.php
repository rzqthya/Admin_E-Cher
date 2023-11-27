<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VoucherEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('emails.voucher')
            ->with([
                'nama' => $this->data['nama'],
                'email' => $this->data['email'],
                'nopol' => $this->data['nopol'],
                'merchant_id' => $this->data['merchant_id'],
                'voucher_id' => $this->data['voucher_id'],
                'masa_berlaku' => $this->data['masa_berlaku'],
            ])
            ->subject('Voucher Samsat'); 
    }
}
