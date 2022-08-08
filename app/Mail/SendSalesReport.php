<?php

namespace App\Mail;

use App\Models\Vendor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\DB;
use App\Services\CalculateTotalSales;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSalesReport extends Mailable
{
    use Queueable, SerializesModels;

    private $vendors;
    private $sales;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->vendors = Vendor::all();
        $this->sales = DB::table('sales')->whereDate('created_at', date('Y-m-d'))->get();
    }

    // Enviar o Vendor::all() e dentro do build tentar fazer um foreach para enviar todos os e-mails;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Relatório de Vendas');

        foreach($this->vendors as $vendor){
            $this->to($vendor->email, $vendor->name);
        }

        $totalSalesValue = CalculateTotalSales::calculateTotalSales($this->sales);

        return $this->view('mail.sendSalesReport', [
            'vendors' => $this->vendors,
            'sales' => $this->sales,
            'totalSalesValue' => $totalSalesValue
        ]);
    }
}
