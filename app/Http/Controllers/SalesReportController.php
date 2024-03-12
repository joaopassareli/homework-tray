<?php

namespace App\Http\Controllers;

use App\Services\SalesReportService;

class SalesReportController extends Controller
{
    public function __construct(
        protected SalesReportService $salesReportService,
    ){}

    public function show ($id)
    {
        $data = $this->salesReportService->showAllSalesFromVendorId($id);

        return view('sales-report.show')
            ->with('vendor', $data['vendor'])
            ->with('sales', $data['sales'])
            ->with('totalSalesValue', $data['totalSalesValue'])
            ->with('totalComission', $data['totalComission']);
    }

}
