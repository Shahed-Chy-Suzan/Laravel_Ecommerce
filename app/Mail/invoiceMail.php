<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;   //------PaymentController theke patano $data k dhorechi,-------

    public function __construct($data)  //--$data----
    {
        $this->data = $data;            //---$data theke sob data te rakchi--
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()     //--------------
    {
        $info = $this->data;
        return $this->from('learnhunter@gmail.com')->view('mail.invoice',compact('info'))->subject('Successfully Buy product');
    }
}
