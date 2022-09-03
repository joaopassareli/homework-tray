<?php

namespace App\Services;

use App\Repository\SalesReportRepository;

class SalesReportService
{
    public function __construct(protected SalesReportRepository $salesReportRepository)
    {
    }

    public function showAllSalesFromVendorId(int $id)
    {
        return $this->salesReportRepository->getAllSalesFromVendorId($id);
    }
}
