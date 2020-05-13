<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
$getNewsQuery = "select * from news ";
$News = queryExecute($getNewsQuery, true);

?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once '../_share/style.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <?php include_once '../_share/header.php'; ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include_once '../_share/sidebar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Thêm Mới Websetting</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <form id="add-websetting-form" action="<?= ADMIN_URL . 'web_setting/save-add.php'?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tên <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">Số Điện Thoại <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="phone_number">
                            </div>
                            <div class="form-group">
                                <label for="">Địa Chỉ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="address">
                            </div>
                            <div class="form-group">
                                <label for="">Đường dẫn Map <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="map_url">
                            </div>
                            <div class="form-group">
                                <label for="">Đường Dẫn FB <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="fb_url">
                            </div>
                            <div class="form-group">
                                <label for="">Đường Dẫn Youtube <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="youtube_url">
                            </div>
                            <div class="form-group">
                                <label for="">Đường dẫn Twitter <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="twitter_url">
                            </div>
                            <div class="form-group">
                                <label for="">Giới Thiệu <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="introduce_content">
                            </div>
                            <div class="form-group">
                                <label for="">Giới Thiệu CEO <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="ceo_introduce">
                            </div>
                            <div class="form-group">
                                <label for="">Email<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Mã Bảng tin</label>
                                <select name="blog_news_id" class="form-control">
                                    <?php foreach ($News as $ro):?>
                                        <option value="<?= $ro['id'] ?>"><?= $ro['id'] ?></option>
                                    <?php endforeach?>
                                </select>
                            </div> -->
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <img src="<?= DEFAULT_IMAGE ?>" id="preview-img" class="img-fluid">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Logo<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="logo" onchange="encodeImageFileAsURL(this)">
                            </div>        
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                            <a href="<?= ADMIN_URL . 'web_setting'?>" class="btn btn-danger">Hủy</a>
                        </div>
                    </div>
                </form>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include_once '../_share/footer.php'; ?>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include_once '../_share/script.php'; ?>
<script>
    function encodeImageFileAsURL(element) {
        var file = element.files[0];
        if(file === undefined){
            $('#preview-img').attr('src', "<?= DEFAULT_IMAGE ?>");
            return false;
        }
        var reader = new FileReader();
        reader.onloadend = function() {
            $('#preview-img').attr('src', reader.result)
        }
        reader.readAsDataURL(file);
    }
    $('#add-websetting-form').validate({
        rules:{
            name: {
                required: true,
                maxlength: 191
            },
            email: {
                required: true,
                maxlength: 191,
                email: true,
                remote: {
                    url: "<?= ADMIN_URL . 'web_setting/verify-email-existed.php'?>",
                    type: "post",
                    data: {
                        email: function() {
                            return $( "input[name='email']" ).val();
                        }
                    }
                }
            },
            phone_number: {
                required: true,
                number: true
            },
            address:{
                required: true,
                maxlength: 191
            },
            map_url:{
                required: true,
                maxlength: 191
            },
            fb_url:{
                required: true,
                maxlength: 191
            },
            youtube_url:{
                required: true,
                maxlength: 191
            },
            twitter_url:{
                required: true,
                maxlength: 191
            },
            introduce_content:{
                required: true,
                maxlength: 191,
                minlength: 10
            },
            ceo_introduce:{
                required: true,
                maxlength: 191,
                minlength: 10
            },
            logo: {
                required: true,
                extension: "png|jpg|jpeg|gif"
            }
        },
        messages: {
            name: {
                required: "Hãy nhập tên người dùng",
                maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
            },
            email: {
                required: "Hãy nhập email",
                maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                email: "Không đúng định dạng email",
                remote: "Email đã tồn tại, vui lòng sử dụng email khác"
            },
            address:{
                required: "Hãy nhập địa chỉ",
                maxlength: "Số lượng ký tự tối đa bằng 191 ký tự"
            },
            map_url: {
                required: "Hãy nhập địa chỉ đường dẫn map",
                maxlength: "Số lượng kí tự tối đa là 191 ký tự"
            },
            fb_url: {
                required: "Hãy nhập địa chỉ đường dẫn fb",
                maxlength: "Số lượng kí tự tối đa là 191 ký tự"
            },
            youtube_url: {
                required: "Hãy nhập địa chỉ đường dẫn youtube",
                maxlength: "Số lượng kí tự tối đa là 191 ký tự"
            },
            twitter_url: {
                required: "Hãy nhập địa chỉ đường dẫn twitter",
                maxlength: "Số lượng kí tự tối đa là 191 ký tự"
            },
            introduce_content: {
                required: "Hãy nhập nội dung giới thiệu",
                maxlength: "Số lượng kí tự tối đa là 191 ký tự",
                minlength:"Nội dung nhập phải > 10 kí tự"
            },
            ceo_introduce: {
                required: "Hãy nhập nội dung giới thiệu ceo",
                maxlength: "Số lượng kí tự tối đa là 191 ký tự",
                minlength:"Nội dung nhập phải > 10 kí tự"
            },
            phone_number: {
                min: "Bắt buộc là số có 10 chữ số",
                max: "Bắt buộc là số có 10 chữ số",
                number: "Nhập định dạng số"
            },
            logo: {
                required: "Hãy nhập ảnh đại diện",
                extension: "Hãy nhập đúng định dạng ảnh (jpg | jpeg | png | gif)"
            }
        }
    });
</script>
</body>
</html>