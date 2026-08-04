<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); $memberName="address"; ?>
    <!-- SELECT2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
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

                        <!---------- MEMBER :: ADDRESS ---------->
                        <div class="col-lg-9 col-md-12 col-12">
                            <div class="row">
                                <div class="col-lg-7 col-md-6 col-8">
                                    <h4>ที่อยู่การจัดส่ง</h4>
                                </div>
                                <div class="col-lg-5 col-md-6 col-4">
                                    <!---------- ADD NEW ADDRESS ---------->
                                    <button type="button" class="button-add" data-toggle="modal" data-target="#addNew"><i class="fas fa-plus-circle"></i>เพิ่มที่อยู่ใหม่</button>

                                    <!-- Modal -->
                                    <div class="modal fade form-modal" id="addNew" data-backdrop="static" data-keyboard="false" aria-labelledby="add-newAdd" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6>เพิ่มที่อยู่ใหม่</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="input-form">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <p>ชื่อ</p>
                                                                <input type="text" class="form-control shadow-none">
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <p>นามสกุล</p>
                                                                <input type="text" class="form-control shadow-none">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <p>เบอร์โทรศัพท์</p>
                                                                <input type="tel" class="form-control shadow-none">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <p>ที่อยู่</p>
                                                                <input type="text" class="form-control shadow-none">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <p>จังหวัด</p> <!-- PROVINCE -->
                                                                <div class="select2-part">
                                                                    <select class="js-example-basic-single form-control" name="deliveryTo">
                                                                        <option>เลือก</option>
                                                                        <option>option 1</option>
                                                                        <option>option 2</option>
                                                                        <option>option 3</option>
                                                                        <option>option 4</option>
                                                                        <option>option 5</option>
                                                                    </select>
                                                                </div>  
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <p>รหัสไปรษณีย์</p> <!-- POSTAL CODE -->
                                                                <div class="select2-part">
                                                                    <select class="js-example-basic-single form-control" name="deliveryTo">
                                                                        <option>เลือก</option>
                                                                        <option>option 1</option>
                                                                        <option>option 2</option>
                                                                        <option>option 3</option>
                                                                        <option>option 4</option>
                                                                        <option>option 5</option>
                                                                    </select>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <p>เขต/อำเภอ</p> <!-- DISTRICT -->
                                                                <div class="select2-part">
                                                                    <select class="js-example-basic-single form-control" name="deliveryTo">
                                                                        <option>เลือก</option>
                                                                        <option>option 1</option>
                                                                        <option>option 2</option>
                                                                        <option>option 3</option>
                                                                        <option>option 4</option>
                                                                        <option>option 5</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <p>แขวง/ตำบล</p> <!-- SUB-DISTRICT -->
                                                                <div class="select2-part">
                                                                    <select class="js-example-basic-single form-control" name="deliveryTo">
                                                                        <option>เลือก</option>
                                                                        <option>option 1</option>
                                                                        <option>option 2</option>
                                                                        <option>option 3</option>
                                                                        <option>option 4</option>
                                                                        <option>option 5</option>
                                                                    </select>
                                                                </div>
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
                                        <h6>ที่อยู่ 1</h6>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <div class="default-tag">ที่อยู่หลัก</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <ul class="summary-info">
                                            <li><strong>ช็อปสินค้า ศรีไทย</strong></li>
                                            <li>37/2 ถนนสุทธิสารวินิจฉัย แขวงสามเสนนอก เขตห้วยขวาง กรุงเทพฯ 10320</li>
                                            <li>เบอร์โทรศัพท์ : 081-234-5678</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <ul class="edit-option">
                                            <li>
                                                <!-- Button trigger modal :: CHANGE SHIPPING ADDRESS 1 -->
                                                <button type="button" data-toggle="modal" data-target="#changeAdd1"><i class="fas fa-pen"></i>แก้ไข</button>
                                            </li>
                                            <li>
                                                <button class="remove"><i class="fas fa-trash-alt"></i>ลบ</button>
                                            </li>
                                        </ul>
                                        <!-- Modal -->
                                        <div class="modal fade form-modal" id="changeAdd1" data-backdrop="static" data-keyboard="false" aria-labelledby="changeName" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6>แก้ไขที่อยู่ 1</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="input-form">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>ชื่อ</p>
                                                                    <input type="text" class="form-control shadow-none">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>นามสกุล</p>
                                                                    <input type="text" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>เบอร์โทรศัพท์</p>
                                                                    <input type="tel" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>ที่อยู่</p>
                                                                    <input type="text" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>จังหวัด</p> <!-- PROVINCE -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control" name="deliveryTo">
                                                                            <option>เลือก</option>
                                                                            <option>option 1</option>
                                                                            <option>option 2</option>
                                                                            <option>option 3</option>
                                                                            <option>option 4</option>
                                                                            <option>option 5</option>
                                                                        </select>
                                                                    </div>  
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>รหัสไปรษณีย์</p> <!-- POSTAL CODE -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control" name="deliveryTo">
                                                                            <option>เลือก</option>
                                                                            <option>option 1</option>
                                                                            <option>option 2</option>
                                                                            <option>option 3</option>
                                                                            <option>option 4</option>
                                                                            <option>option 5</option>
                                                                        </select>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>เขต/อำเภอ</p> <!-- DISTRICT -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control" name="deliveryTo">
                                                                            <option>เลือก</option>
                                                                            <option>option 1</option>
                                                                            <option>option 2</option>
                                                                            <option>option 3</option>
                                                                            <option>option 4</option>
                                                                            <option>option 5</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>แขวง/ตำบล</p> <!-- SUB-DISTRICT -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control" name="deliveryTo">
                                                                            <option>เลือก</option>
                                                                            <option>option 1</option>
                                                                            <option>option 2</option>
                                                                            <option>option 3</option>
                                                                            <option>option 4</option>
                                                                            <option>option 5</option>
                                                                        </select>
                                                                    </div>
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
                                        <h6>ที่อยู่ 2</h6>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <button class="default-tag">ตั้งเป็นที่อยู่หลัก</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <ul class="summary-info">
                                            <li><strong>ช็อปสินค้า ศรีไทย</strong></li>
                                            <li>37/2 ถนนสุทธิสารวินิจฉัย แขวงสามเสนนอก เขตห้วยขวาง กรุงเทพฯ 10320</li>
                                            <li>เบอร์โทรศัพท์ : 081-234-5678</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <ul class="edit-option">
                                            <li>
                                                <!-- Button trigger modal :: CHANGE SHIPPING ADDRESS 1 -->
                                                <button type="button" data-toggle="modal" data-target="#changeAdd2"><i class="fas fa-pen"></i>แก้ไข</button>
                                            </li>
                                            <li>
                                                <button class="remove"><i class="fas fa-trash-alt"></i>ลบ</button>
                                            </li>
                                        </ul>
                                        <!-- Modal -->
                                        <div class="modal fade form-modal" id="changeAdd2" data-backdrop="static" data-keyboard="false" aria-labelledby="changeName" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6>แก้ไขที่อยู่ 2</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="input-form">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>ชื่อ</p>
                                                                    <input type="text" class="form-control shadow-none">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>นามสกุล</p>
                                                                    <input type="text" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>เบอร์โทรศัพท์</p>
                                                                    <input type="tel" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>ที่อยู่</p>
                                                                    <input type="text" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>จังหวัด</p> <!-- PROVINCE -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control" name="deliveryTo">
                                                                            <option>เลือก</option>
                                                                            <option>option 1</option>
                                                                            <option>option 2</option>
                                                                            <option>option 3</option>
                                                                            <option>option 4</option>
                                                                            <option>option 5</option>
                                                                        </select>
                                                                    </div>  
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>รหัสไปรษณีย์</p> <!-- POSTAL CODE -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control" name="deliveryTo">
                                                                            <option>เลือก</option>
                                                                            <option>option 1</option>
                                                                            <option>option 2</option>
                                                                            <option>option 3</option>
                                                                            <option>option 4</option>
                                                                            <option>option 5</option>
                                                                        </select>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>เขต/อำเภอ</p> <!-- DISTRICT -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control" name="deliveryTo">
                                                                            <option>เลือก</option>
                                                                            <option>option 1</option>
                                                                            <option>option 2</option>
                                                                            <option>option 3</option>
                                                                            <option>option 4</option>
                                                                            <option>option 5</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>แขวง/ตำบล</p> <!-- SUB-DISTRICT -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control" name="deliveryTo">
                                                                            <option>เลือก</option>
                                                                            <option>option 1</option>
                                                                            <option>option 2</option>
                                                                            <option>option 3</option>
                                                                            <option>option 4</option>
                                                                            <option>option 5</option>
                                                                        </select>
                                                                    </div>
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

    <!-- SELECT2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

</body>
</html>