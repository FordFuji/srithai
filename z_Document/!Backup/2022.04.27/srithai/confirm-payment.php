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

                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-11 col-md-12 col-12">
                        <div class="double-borderBox">
                            <div class="input-form">
                                <div class="row">
                                    <div class="col">
                                        <p>เลขที่คำสั่งซื้อ</p>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <p>บัญชีที่โอนเงิน</p>
                                        <select class="form-select">
                                            <option selected>เลือก</option>
                                            <option value="1">option 1</option>
                                            <option value="2">option 2</option>
                                            <option value="3">option 3</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <p>จำนวนเงิน</p>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <p>วันที่ชำระเงิน</p>
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <p>เวลาที่โอนเงิน</p>
                                        <input type="time" class="form-control" placeholder="hh:mm">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="attach-button">
                                        <input type="file" id="actual-btn" hidden/>
                                        <label for="actual-btn">Browse file</label>
                                        <span id="file-chosen">No file chosen</span>  
                                    </div>   
                                    <p class="f-13">Please click to upload receipt (At least 1)</p>                      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="content-center mt-4">
                                        <button class="buttonR">ยืนยัน</button>
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