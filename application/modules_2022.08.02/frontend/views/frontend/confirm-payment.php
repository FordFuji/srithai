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
                        <h2>แจ้งโอนเงิน</h2>
                    </div>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-11 col-md-12 col-12">
                        <div class="double-borderBox">
                            <div class="input-form">
                                <div class="row">
                                    <div class="col">
                                        <p>เลขที่คำสั่งซื้อ</p>
                                        <input type="text" name="order_no" class="form-control" value="<?php if(!empty($row)) echo $row->order_no;?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <p>บัญชีที่โอนเงิน</p>
                                        <select class="form-select" name="payment_account" required>
                                            <option selected>เลือก</option>
                                            <option value="ธนาคารกรุงเทพ 102-3-060971" <?php if(!empty($row)) echo 'selected';?>>ธนาคารกรุงเทพ 102-3-060971</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <p>จำนวนเงิน</p>
                                        <input type="number" name="payment_amount" class="form-control" value="<?php if(!empty($row)) echo $row->order_total;?>" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <p>วันที่ชำระเงิน</p>
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="payment_date" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <p>เวลาที่โอนเงิน</p>
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