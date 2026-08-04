<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); $memberName="point"; ?>
</head>
<body>
    <?php require('inc_topmenu.php'); ?>

    <!---------- MEMBER ---------->
    <div class="content-padding foot-pad minH">
        <div class="container-fluid">
			<div class="wrap-pad">

                <div class="member-section">
                    <div class="row">
                        <?php require('inc_membermenu.php'); ?>

                        <!---------- MEMBER :: POINT ---------->
                        <div class="col-lg-9 col-md-12 col-12">
                            <div class="row">
                                <div class="col">
                                    <h4>คะแนนสะสม</h4>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-xl-7 col-lg-8 col-md-7 col-12">
                                    <div class="pointBox">
                                        <div class="pointBox-content">
                                            <div class="row">
                                                <div class="col">
                                                    <h5>ยอดคะแนนสะสม</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="my-point">
                                                        <p><span><?php if(!empty($point_all)) echo $point_all; else echo 0;?></span>คะแนน</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <!---------- POINT :: INFO ---------->
                            <div class="row justify-content-center">
                                <div class="col-xl-10 col-lg-11 col-md-11 col-12">
                                <div class="headerTB d-none d-sm-block">
                                        <div class="row">
                                            <div class="col-4">วันที่ได้รับ</div>
                                            <div class="col-4">เลขที่คำสั่งซื้อ</div>
                                            <div class="col-4">คะแนน</div>
                                        </div>
                                    </div>
                                    <div class="bodyTB">
<?php
if(!empty($order_desc)) {
    foreach($order_desc as $r) {
        $datetime_exp = explode(' ', $r->order_datetime_create);
        $date_exp = explode('-', $datetime_exp[0]);

        $day = $date_exp[2];
        $month = $date_exp[1];
        $year = $date_exp[0];

        $time_exp = explode(':', $datetime_exp[1]);

        $hour = $time_exp[0];
        $minute = $time_exp[1];
?>
                                        <div class="bodyTB-sub">
                                            <div class="row">
                                                <div class="col-6 d-block d-sm-none">วันที่ได้รับ</div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="content-middle">
                                                        <ul>
                                                            <li><?php echo $day;?>/<?php echo $month;?>/<?php echo $year;?></li>
                                                            <li><?php echo $hour;?>:<?php echo $minute;?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-6 d-block d-sm-none">เลขที่คำสั่งซื้อ</div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="content-middle">
                                                        <p><?php echo $r->order_no;?></p>
                                                    </div>
                                                </div>
                                                <div class="col-6 d-block d-sm-none">คะแนน</div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="content-middle">
                                                        <p>+<?php echo $r->order_point;?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
<?php
        $order_detail = $this->model_frontend->getOrderDetailPointResult($r->order_id);
        if(!empty($order_detail)) {
            foreach($order_detail as $od) {
                $datetime_exp = explode(' ', $r->order_datetime_create);
                $date_exp = explode('-', $datetime_exp[0]);

                $day = $date_exp[2];
                $month = $date_exp[1];
                $year = $date_exp[0];

                $time_exp = explode(':', $datetime_exp[1]);

                $hour = $time_exp[0];
                $minute = $time_exp[1];
?>
                                        <div class="bodyTB-sub">
                                            <div class="row">
                                                <div class="col-6 d-block d-sm-none">วันที่ได้รับ</div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="content-middle">
                                                        <ul>
                                                            <li><?php echo $day;?>/<?php echo $month;?>/<?php echo $year;?></li>
                                                            <li><?php echo $hour;?>:<?php echo $minute;?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-6 d-block d-sm-none">เลขที่คำสั่งซื้อ</div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="content-middle">
                                                        <p><?php echo $r->order_no;?></p>
                                                    </div>
                                                </div>
                                                <div class="col-6 d-block d-sm-none">คะแนน</div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="content-middle">
                                                        <p>-<?php echo $od->promotion_point;?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
<?php
            }
        }
    }
}
?>
                                        <?php /*<div class="bodyTB-sub">
                                            <div class="row">
                                                <div class="col-6 d-block d-sm-none">วันที่ได้รับ</div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="content-middle">
                                                        <ul>
                                                            <li>22/12/2021</li>
                                                            <li>15:30</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-6 d-block d-sm-none">เลขที่คำสั่งซื้อ</div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="content-middle">
                                                        <p>ST000402</p>
                                                    </div>
                                                </div>
                                                <div class="col-6 d-block d-sm-none">คะแนน</div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="content-middle">
                                                        <p>+54</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bodyTB-sub">
                                            <div class="row">
                                                <div class="col-6 d-block d-sm-none">วันที่ได้รับ</div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="content-middle">
                                                        <ul>
                                                            <li>17/11/2021</li>
                                                            <li>15:30</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-6 d-block d-sm-none">เลขที่คำสั่งซื้อ</div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="content-middle">
                                                        <p>ST000387</p>
                                                    </div>
                                                </div>
                                                <div class="col-6 d-block d-sm-none">คะแนน</div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="content-middle">
                                                        <p>-50</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bodyTB-sub">
                                            <div class="row">
                                                <div class="col-6 d-block d-sm-none">วันที่ได้รับ</div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="content-middle">
                                                        <ul>
                                                            <li>23/09/2021</li>
                                                            <li>15:30</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-6 d-block d-sm-none">เลขที่คำสั่งซื้อ</div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="content-middle">
                                                        <p>ST000355</p>
                                                    </div>
                                                </div>
                                                <div class="col-6 d-block d-sm-none">คะแนน</div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="content-middle">
                                                        <p>+125</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bodyTB-sub">
                                            <div class="row">
                                                <div class="col-6 d-block d-sm-none">วันที่ได้รับ</div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="content-middle">
                                                        <ul>
                                                            <li>05/08/2021</li>
                                                            <li>15:30</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-6 d-block d-sm-none">เลขที่คำสั่งซื้อ</div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="content-middle">
                                                        <p>ST000288</p>
                                                    </div>
                                                </div>
                                                <div class="col-6 d-block d-sm-none">คะแนน</div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="content-middle">
                                                        <p>+70</p>
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
        </div>
    </div>
    
    <?php require('inc_footer.php'); ?>

</body>
</html>