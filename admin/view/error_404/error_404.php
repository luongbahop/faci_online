<style>
.error-template {padding: 20px 15px;text-align: center;}
.error-actions {margin-top:15px;margin-bottom:15px;}
.error-actions .btn { margin-right:10px; }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>404 NOT FOUND !</h1>
                <div class="error-details">
                    Xin lỗi , trang bạn yêu cầu không tìm thấy .
                </div>
                <div class="error-actions">
                    <a href="<?php echo $url; ?>" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Trang chủ </a>
                </div>
            </div>
        </div>
    </div>
</div>
