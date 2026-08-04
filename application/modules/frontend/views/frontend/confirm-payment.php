<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); $pageName="confirm"; ?> 
</head>
<body>
    <?php require('inc_topmenu.php'); ?>

    <!---------- CONFIRM - PAYMENT ---------->
    <div class="content-padding foot-pad">
        <div class="container-fluid">
            <div class="wrap-pad">
                <div class="row">
                    <div class="col">
                        <h2><?php echo get2Lang($this->session->userdata('lang'), 'แจ้งโอนเงิน', 'Bank Transfer');?></h2>
                    </div>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-11 col-md-12 col-12">
                        <div class="double-borderBox">
                            <div class="input-form">
                                <div class="row">
                                    <div class="col">
                                        <p><?php echo get2Lang($this->session->userdata('lang'), 'เลขที่คำสั่งซื้อ', 'Order No');?></p>
                                        <input type="text" name="order_no" class="form-control" value="<?php if(!empty($row)) echo $row->order_no;?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <p><?php echo get2Lang($this->session->userdata('lang'), 'บัญชีที่โอนเงิน', 'Transfer Account');?></p>
                                        <select class="form-select" name="payment_account" required>
                                            <option selected>เลือก</option>
<?php
if(!empty($bank)) {
    foreach($bank as $r) {
?>
                                            <option value="<?php echo get2Lang($this->session->userdata('lang'), $r->bank_name_th, $r->bank_name_en).' '.$r->bank_account_no;?>" <?php if(!empty($row)) echo 'selected';?>><?php echo get2Lang($this->session->userdata('lang'), $r->bank_name_th, $r->bank_name_en);?> <?php echo $r->bank_account_no;?></option>
<?php
    }
}
?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <p><?php echo get2Lang($this->session->userdata('lang'), 'จำนวนเงิน', 'Amount');?></p>
                                        <input type="number" name="payment_amount" class="form-control" value="<?php if(!empty($row)) echo $row->order_total;?>" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <p><?php echo get2Lang($this->session->userdata('lang'), 'วันที่ชำระเงิน', 'Payment Date');?></p>
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="payment_date" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <p><?php echo get2Lang($this->session->userdata('lang'), 'เวลาที่โอนเงิน', 'Payment Time');?></p>
                                        <input type="time" class="form-control" placeholder="hh:mm" name="payment_time" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="attach-button">
                                        <input type="file" id="actual-btn" name="payment_slip" required hidden/>
                                        <label for="actual-btn">Browse file</label>
                                        <span id="file-chosen">No file chosen</span>  
                                    </div>   
                                    <p class="f-13">Please click to upload receipt (At least 1)</p>                      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="content-center mt-4">
                                        <input type="submit" class="buttonR" name="submit" type="submit" value="ยืนยัน">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    
    <?php require('inc_footer.php'); ?>

    <script>
        // ATTACH FILE //
        const actualBtn = document.getElementById('actual-btn');

        const fileChosen = document.getElementById('file-chosen');

        actualBtn.addEventListener('change', function(){
        fileChosen.textContent = this.files[0].name
        })
    </script>


</body>
</html>