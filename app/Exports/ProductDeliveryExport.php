<?php

namespace App\Exports;

use App\Models\ProductDelivery;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductDeliveryExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = [];

        $records = ProductDelivery::join('schedules', "schedules.id", "product_deliveries.schedule_id")
            ->join('products', "products.id", "schedules.product_id")
            ->join('vehicles', "vehicles.id", "product_deliveries.vehicle_id")
            ->join('suppliers', "suppliers.id", "schedules.supplier_id")
            ->select(
                "product_deliveries.created_at as createdAt",
                "suppliers.name as supplierName",
                "product_deliveries.place_delivery as placeDelivery",
                "products.title as productTitle",
                "products.id as productId",
                "vehicles.code as vehicleCode",
                "product_deliveries.first_weight as productFirstWeight",
                "product_deliveries.secondary_weight as productSecondaryWeight",
                "product_deliveries.product_price as productPrice",
                "schedules.shipping_unit as schedulesShippingUnit"
            )->get();

        if ($records) {
            foreach ($records as $i => $record) {
                $weight = max($record->productSecondaryWeight - $record->productFirstWeight, 0);

                $createdAt = Carbon::createFromFormat('Y-m-d H:i:s', $record->createdAt);

                $data[] = [
                    $i + 1,
                    $createdAt->format("m-d-Y h:i:s"),
                    $record->supplierName,
                    $record->placeDelivery,
                    $record->productTitle,
                    $record->vehicleCode,
                    $weight,
                    number_format($record->productPrice, 0, ',', '.'),
                    number_format($record->productPrice * $weight, 0, ',', '.'),
                    $record->schedulesShippingUnit,
                ];
            }
        }


        return  collect($data);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["STT", "Ngày", "Khách hàng", "Địa điểm giao hàng", "Loại hàng", "Số xe", "KL hàng", "Đơn giá", "Thành tiền", "Đơn vị VC"];
    }
}
