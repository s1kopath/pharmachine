<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyTechnician extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $workstation;
    public function __construct($ws,$ws_issue)
    {
        $this->workstation = $ws;
        $this->workstationRepair = $ws_issue;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('backend.modules.workstation.notify')
            ->with(['notifyMsg'=>$this->workstation])
            ->with(['issueMsg'=>$this->workstationRepair]);
    }
}
