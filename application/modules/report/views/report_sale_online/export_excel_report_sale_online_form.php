<?php
$csv_data = array(
	array('Create Time', 'Order Number', 'Status', 'SKU', 'BarCode', 'Item Description', 'Customer No', 'Customer Name', 'Shipping Name', 'Shipping Address', 'Shipping Phone', 'Tax Invoice Requested', 'Billing Name', 'Billing Address', 'Billing Phone', 'Customer ID / Tax Invoice', 'Branch No.', 'Biling Shipping', 'Pay Method', 'Normal Price', 'Promotion Price', 'Qty', 'UOM', 'Discount', 'Vat 7%', 'Paid Price Total', 'shippingFee', 'Delivery Date', 'shippingProvider', 'shippingProviderType', 'Remark', 'Coupon Code', 'Coupon Discount', 'Points', 'Points Discount'),
);

$rows = $this->model_report->get_report_sale_online_list($date_begin, $date_end, $order_status);

if(!empty($rows)) {
    foreach($rows as $r) {
        $coupon = $this->model_report->getCouponRecord($r->coupon_id);
        $coupon_discount = 0;
        if(!empty($coupon)) {
            if($coupon->coupon_type == 'บาท') {
                $coupon_discount = $coupon->coupon_discount;
            } elseif($coupon->coupon_type == '%') {
                $coupon_discount = $r->order_sub_total * $coupon->coupon_discount / 100;
            }
        }

        if($r->order_address_for_billing != '') $order_address_for_billing = 'ต้องการ'; else $order_address_for_billing = 'ไม่ต้องการ';

        if($r->order_shipping_method == 'Express') $order_shipping_method = 'Standard Delivery'; else $order_shipping_method = $r->order_shipping_method;

        $csv2 = array(
            $r->order_datetime_create, 
            $r->order_no, 
            $r->order_status, 
            $r->order_detail_code, 
            $r->order_detail_code, 
            $r->product_description_th, 
            $r->member_id, 
            $r->member_name, 
            $r->member_surname, 
            $r->order_name, 
            $r->order_surname, 
            $r->order_address.' '.$this->model_report->get_tumbol_record($r->order_tumbol)->name_in_thai.' '.$this->model_report->get_amphur_record($r->order_amphur)->name_in_thai.' '.$this->model_report->get_province_record($r->order_province)->name_in_thai.' '.$r->order_postcode,
            $r->order_tel, 
            $r->order_address_for_billing, 
            $r->order_billing_name, 
            $r->order_billing_surname, 
            $r->order_billing_address, 
            @$this->model_report->get_tumbol_record($r->order_billing_tumbol)->name_in_thai.'
             '.@$this->model_report->get_amphur_record($r->order_billing_amphur)->name_in_thai.'
             '.@$this->model_report->get_province_record($r->order_billing_province)->name_in_thai.'
             '.$r->order_billing_postcode, 
            $r->order_billing_tel, 
            $r->order_billing_card_id, 
            $r->order_address_for_billing, 
            $r->order_payment_method, 
            $r->product_price_before_discount, 
            $r->order_discount, 
            $r->order_detail_qty, 
            $r->order_discount, 
            $r->order_detail_price * 7 / 100, 
            $r->order_detail_price * $r->order_detail_qty, 
            $r->order_shipping, 
            $order_shipping_method, 
            $r->order_note, 
            @$coupon->coupon_code, 
            $coupon_discount, 
            $r->order_point, 
            $r->order_use_point
        );

        array_push($csv_data, $csv2);
    }
}

export_data_to_csv($csv_data); 

/**
     *
     * Exports an associative array into a CSV file using PHP.
     *
     * @see https://stackoverflow.com/questions/21988581/write-utf-8-characters-to-file-with-fputcsv-in-php
     *
     * @param array     $data       The table you want to export in CSV
     * @param string    $filename   The name of the file you want to export
     * @param string    $delimiter  The CSV delimiter you wish to use. The default ";" is used for a compatibility with microsoft excel
     * @param string    $enclosure  The type of enclosure used in the CSV file, by default it will be a quote "
     */
    function export_data_to_csv($data, $filename = 'export', $delimiter = ';', $enclosure = '"') {
        // Tells to the browser that a file is returned, with its name : $filename.csv
        header("Content-disposition: attachment; filename=export_sale_online_".date('YmdHis').".csv");
        // Tells to the browser that the content is a csv file
        header("Content-Type: text/csv");

        // I open PHP memory as a file
        $fp = fopen("php://output", 'w');

        // Insert the UTF-8 BOM in the file
        fputs($fp, $bom = ( chr(0xEF) . chr(0xBB) . chr(0xBF) ));

        // I add the array keys as CSV headers
        fputcsv($fp, array_keys($data[0]), $delimiter, $enclosure);

        // Add all the data in the file
        foreach ($data as $fields) {
            fputcsv($fp, $fields, $delimiter, $enclosure);
        }

        // Close the file
        fclose($fp);

        // Stop the script
        die();
    }
?>
 