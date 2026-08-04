<?php
/***************************************************
 * Author    : CS Developers
 * Author URI: https://www.comscidev.com
 * Facebook  : https://www.facebook.com/CSDevelopers
 ***************************************************/
 
$api_token_url = 'https://trackapi.thailandpost.co.th/post/api/v1/authenticate/token';
$api_track_url = 'https://trackapi.thailandpost.co.th/post/api/v1/track';
$token_key = 'G%MbO;D#PRN8R?B8CQVGHiXiL?VrVKI1XeD#JIX#EsG~U=HAZsVWT3KkPvV!BYXYViSCZyNyNaQWYoTzL@CcToSDW^N.GsRISaOS';
 
function api_request($url, $token, $content = null){
     
    $headers = [
        'Authorization: Token '. $token,
        'Content-Type: application/json'
    ];
     
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($content));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 
    $result = curl_exec($ch);
    curl_close($ch);
       
    return json_decode($result, true);  
}
 
//Items
$items = [
    'status' => 'all',
    'language' => 'TH',
    'barcode' => [
        $this->input->post('ems')
    ]
];
 
//Step1: GetToken()
$res_token = api_request($api_token_url, $token_key);
 
//Step2: GetItems()
$res_items = api_request($api_track_url, $res_token['token'], $items);

//pre($res_items['response']['items']['EH270515683TH']);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); $memberName="order"; ?>
</head>
<body>
    <?php require('inc_topmenu.php'); ?>

    <!---------- MEMBER ---------->
    <div class="content-padding foot-pad minH">
        <div class="container-fluid">
			<div class="wrap-pad">

                <div class="member-section">
                    <div class="row">
                        <?php //require('inc_membermenu.php'); ?>

                        <!---------- MEMBER :: ORDER ---------->
                        <div class="col-lg-9 col-md-12 col-12">
                            <div class="row">
                                <div class="col">
                                    <h4>รายการสั่งซื้อ</h4>
                                </div>
                            </div>
                            <div class="status-section">
                                <div class="row">
                                    <!-- SEARCH BOX -->
                                    <form action="" method="post">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="input-group search">
                                            <input type="search" class="form-control shadow-none" placeholder="ค้นหารายการ" name="ems" value="<?php echo $this->input->post('ems');?>">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                            <!---------- ORDER :: INFO ---------->
                            <div class="headerTB d-none d-sm-block">
                                <div class="row">
                                    <div class="col-3">เลขที่บาร์โค้ด</div>
                                    <div class="col-3">สถานะ</div>
                                    <div class="col-2">วันที่</div>
                                    <div class="col-2">สถานที่</div>
                                    <div class="col-2">รหัสไปรษณีย์</div>
                                </div>
                            </div>
                            <div class="bodyTB divChangeStatus">
<?php
if(!empty($res_items['response']['items'][$this->input->post('ems')])) {
    foreach($res_items['response']['items'][$this->input->post('ems')] as $r) {
?>
                                <div class="bodyTB-sub">
                                    <div class="row">
                                        <div class="col-6 d-block d-sm-none">เลขที่บาร์โค้ด</div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="content-middle">
                                                <p><?php echo $r['barcode'];?></p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">สถานะ</div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="content-middle">
                                                <ul>
                                                    <li><?php echo $r['status_description'];?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">วันที่</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                            <?php echo $r['status_date'];?> 
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">สถานที่</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                            <?php echo $r['location'];?> 
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">รหัสไปรษณีย์</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                            <?php echo $r['postcode'];?> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php
    }
} else {
?>
                                <div class="bodyTB-sub">
                                    <div class="row" align="center">
                                        Not Found Data
                                    </div>
                                </div>
<?php
}
?>
                                <?php /*<div class="bodyTB-sub">
                                    <div class="row">
                                        <div class="col-6 d-block d-sm-none">เลขที่คำสั่งซื้อ</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>ST000456</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">วันที่สั่งซื้อ</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <ul>
                                                    <li>10/01/2021</li>
                                                    <li>15:30</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">จำนวน</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>2</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">ยอดรวม</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>฿ 967</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">สถานะ</div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="content-middle">
                                                <p>กำลังเตรียมจัดส่ง</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-12">
                                            <div class="content-middle">
                                                <a class="button-view" href="<?php echo site_url('member-order-detail');?>"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bodyTB-sub">
                                    <div class="row">
                                        <div class="col-6 d-block d-sm-none">เลขที่คำสั่งซื้อ</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>ST000456</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">วันที่สั่งซื้อ</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <ul>
                                                    <li>10/01/2021</li>
                                                    <li>15:30</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">จำนวน</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>2</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">ยอดรวม</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>฿ 967</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">สถานะ</div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="content-middle">
                                                <p>จัดส่งแล้ว</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-12">
                                            <div class="content-middle">
                                                <a class="button-view" href="<?php echo site_url('member-order-detail');?>"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bodyTB-sub">
                                    <div class="row">
                                        <div class="col-6 d-block d-sm-none">เลขที่คำสั่งซื้อ</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>ST000456</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">วันที่สั่งซื้อ</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <ul>
                                                    <li>10/01/2021</li>
                                                    <li>15:30</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">จำนวน</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>2</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">ยอดรวม</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>฿ 967</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">สถานะ</div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="content-middle">
                                                <div class="content-middle">
                                                    <p>รายการสำเร็จ</p>
                                                    <!--<ul class="w-review">
                                                        <li>รายการสำเร็จ</li>
                                                        <li>
                                                            <div class="content-center">
                                                                <a class="button-review" href=""><i class="fas fa-pencil-alt"></i>รีวิวสินค้า</a>
                                                            </div>
                                                        </li>
                                                    </ul>-->
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-12">
                                            <div class="content-middle">
                                                <a class="button-view" href="<?php echo site_url('member-order-detail');?>"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>*/ ?>

                            </div>

                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <?php require('inc_footer.php'); ?>
<script>
    function changeStatus(status) {
        $.post('<?php echo site_url('frontend/path/ajaxChangeStatus');?>', { order_status: status }, function(data) {
            $(".divChangeStatus").html(data);
        });
    }
</script>
</body>
</html>