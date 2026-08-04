<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); $memberName="payment"; ?>
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

                        <!---------- MEMBER :: PAYMENT ---------->
                        <div class="col-lg-9 col-md-12 col-12">
                            <div class="row">
                                <div class="col-lg-7 col-md-6 col-8">
                                    <h4><?php echo get2Lang($this->session->userdata('lang'), 'การชำระเงิน', 'Payment');?></h4>
                                </div>
                                <div class="col-lg-5 col-md-6 col-4">
                                    <!---------- ADD NEW PAYMENT ---------->
                                    <button type="button" class="button-add" data-toggle="modal" data-target="#addNew"><i class="fas fa-plus-circle"></i>เพิ่มบัตรใหม่</button>

                                    <!-- Modal -->
                                    <div class="modal fade form-modal" id="addNew" data-backdrop="static" data-keyboard="false" aria-labelledby="add-newPayment" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6>เพิ่มบัตรใหม่</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="input-form">
                                                        <div class="row">
                                                            <div class="col">
                                                                <p>ประเภทบัตรเครดิต</p>
                                                                <select class="form-select">
                                                                    <option selected>เลือก</option>
                                                                    <option value="1">option 1</option>
                                                                    <option value="2">option 2</option>
                                                                    <option value="3">option 3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <p>ชื่อผู้ถือบัตร</p>
                                                                <input type="text" class="form-control shadow-none">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col">
                                                                <p>หมายเลขบัตรเครดิต</p>
                                                                <input type="text" class="form-control shadow-none">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <p>วันหมดอายุ</p>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <input type="text" class="form-control shadow-none" placeholder="MM">
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="text" class="form-control shadow-none" placeholder="YY">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <p>CCV</p>
                                                                <input type="text" class="form-control shadow-none">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="buttonBK">ยืนยัน</button>
                                                    <button type="button" class="buttonBD" data-dismiss="modal">ยกเลิก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="infoBox">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <h6>การชำระเงิน 1</h6>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <div class="default-tag">บัตรหลัก</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <ul class="summary-info">
                                            <li><strong>ช็อปสินค้า ศรีไทย</strong></li>
                                            <li><strong>บัตร VISA </strong>:  8888 88** **** 8888</li>
                                            <li>วันหมดอายุ :  08/2025</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <ul class="edit-option">
                                            <li>
                                                <!-- Button trigger modal :: CHANGE PAYMENT 1 -->
                                                <button type="button" data-toggle="modal" data-target="#changePayment1"><i class="fas fa-pen"></i>แก้ไข</button>
                                            </li>
                                            <li>
                                                <button class="remove"><i class="fas fa-trash-alt"></i>ลบ</button>
                                            </li>
                                        </ul>
                                        <!-- Modal -->
                                        <div class="modal fade form-modal" id="changePayment1" data-backdrop="static" data-keyboard="false" aria-labelledby="changePayment" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6>แก้ไขการชำระเงิน 1</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="input-form">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>ประเภทบัตรเครดิต</p>
                                                                    <select class="form-select">
                                                                        <option selected>เลือก</option>
                                                                        <option value="1">option 1</option>
                                                                        <option value="2">option 2</option>
                                                                        <option value="3">option 3</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>ชื่อผู้ถือบัตร</p>
                                                                    <input type="text" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>หมายเลขบัตรเครดิต</p>
                                                                    <input type="text" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>วันหมดอายุ</p>
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <input type="text" class="form-control shadow-none" placeholder="MM">
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <input type="text" class="form-control shadow-none" placeholder="YY">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>CCV</p>
                                                                    <input type="text" class="form-control shadow-none">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="buttonBK">ยืนยัน</button>
                                                        <button type="button" class="buttonBD" data-dismiss="modal">ยกเลิก</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="infoBox">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <h6>การชำระเงิน 2</h6>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <button class="default-tag">ตั้งเป็นบัตรหลัก</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <ul class="summary-info">
                                            <li><strong>ช็อปสินค้า ศรีไทย</strong></li>
                                            <li><strong>บัตร VISA</strong> :  8888 88** **** 8888</li>
                                            <li>วันหมดอายุ :  08/2025</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                    <ul class="edit-option">
                                            <li>
                                                <!-- Button trigger modal :: CHANGE PAYMENT 1 -->
                                                <button type="button" data-toggle="modal" data-target="#changePayment2"><i class="fas fa-pen"></i>แก้ไข</button>
                                            </li>
                                            <li>
                                                <button class="remove"><i class="fas fa-trash-alt"></i>ลบ</button>
                                            </li>
                                        </ul>
                                        <!-- Modal -->
                                        <div class="modal fade form-modal" id="changePayment2" data-backdrop="static" data-keyboard="false" aria-labelledby="changePayment" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6>แก้ไขการชำระเงิน 2</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="input-form">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>ประเภทบัตรเครดิต</p>
                                                                    <select class="form-select">
                                                                        <option selected>เลือก</option>
                                                                        <option value="1">option 1</option>
                                                                        <option value="2">option 2</option>
                                                                        <option value="3">option 3</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>ชื่อผู้ถือบัตร</p>
                                                                    <input type="text" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>หมายเลขบัตรเครดิต</p>
                                                                    <input type="text" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>วันหมดอายุ</p>
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <input type="text" class="form-control shadow-none" placeholder="MM">
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <input type="text" class="form-control shadow-none" placeholder="YY">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>CCV</p>
                                                                    <input type="text" class="form-control shadow-none">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="buttonBK">ยืนยัน</button>
                                                        <button type="button" class="buttonBD" data-dismiss="modal">ยกเลิก</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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