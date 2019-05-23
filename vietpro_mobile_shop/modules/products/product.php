<?php 
    $prd_id = $_GET['prd_id'];
    $sql = "SELECT * FROM product WHERE prd_id = $prd_id";
    $query = mysqli_query($conn , $sql);
    $num = mysqli_num_rows($query);
    $row =  mysqli_fetch_array($query);
?>
<!--	List Product	-->
<div id="product">
    <div id="product-head" class="row">
        <div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
            <img src="admin/img/<?php echo $row['prd_image']; ?>">
        </div>
        <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
            <h1><?php echo $row['prd_name']; ?></h1>
            <ul>
                <li><span>Bảo hành:</span><?php echo $row['prd_warranty']; ?></li>
                <li><span>Đi kèm:</span><?php echo $row['prd_accessories']; ?></li>
                <li><span>Tình trạng:</span><?php echo $row['prd_new']; ?></li>
                <li><span>Khuyến Mại:</span><?php echo $row['prd_promotion']; ?></li>
                <li id="price">Giá Bán (chưa bao gồm VAT)</li>
                <li id="price-number"><?php echo number_format( $row['prd_price'], 0 , '' , '.'); ?></li>
                <li id="status" class="<?php if($row['prd_status'] == 0){echo 'text-danger';}?>">
                    <?php if($row['prd_status'] == 1){echo 'Còn Hàng';}else{echo 'Hết Hàng';} ?></li>
            </ul>
            <div id="add-cart"><a href="modules/cart/add_cart.php?prd_id=<?php echo $row['prd_id']; ?>">Mua ngay</a></div>
        </div>
    </div>
    <div id="product-body" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Đánh giá về <?php echo $row['prd_name']; ?></h3>
            <p>
                <?php echo $row['prd_details']; ?>
            </p>
        </div>
    </div>

    <!--	Comment	-->
    <?php
    //cấu hình thông tin do google cung cấp
    $api_url     = 'https://www.google.com/recaptcha/api/siteverify';
    $site_key    = '6LfYoaIUAAAAAFfcqSE48NIh-v-Z-D5-S928R9CT';
    $secret_key  = '6LfYoaIUAAAAAMeCte3Re1ajRVlkkWQavjIYrDDZ';
      
    //kiem tra submit form
    if(isset($_POST['sbm']))
    {
        //lấy dữ liệu được post lên
        $site_key_post    = $_POST['g-recaptcha-response'];
          
        //lấy IP của khach
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $remoteip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $remoteip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $remoteip = $_SERVER['REMOTE_ADDR'];
        }
         
        //tạo link kết nối
        $api_url = $api_url.'?secret='.$secret_key.'&response='.$site_key_post.'&remoteip='.$remoteip;
        //lấy kết quả trả về từ google
        $response = file_get_contents($api_url);
        //dữ liệu trả về dạng json
        $response = json_decode($response);
        if(!isset($response->success))
        {
            echo 'Captcha khong dung';
        }
        if($response->success == true)
        {
                $comm_name = $_POST['comm_name'];
                $comm_mail = $_POST['comm_mail'];
                $comm_details = $_POST['comm_details'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $comm_date = date('Y-m-d H:i:s');
    
                $sql = "INSERT INTO comment(comm_name , comm_mail , comm_details, comm_date , prd_id  ) VALUES( '$comm_name' , '$comm_mail' , '$comm_details' , '$comm_date' , '$prd_id') ";
                mysqli_query($conn, $sql);
        }else{
            echo 'Captcha khong dung';
        }
    }

    ?>
    <div id="comment" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Bình luận sản phẩm</h3>
            <form method="post">
                <div class="form-group">
                    <label>Tên:</label>
                    <input name="comm_name" required type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input name="comm_mail" required type="email" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label>Nội dung:</label>
                    <textarea name="comm_details" required rows="8" class="form-control"></textarea>
                </div>
                <div class="g-recaptcha" data-sitekey="6LfYoaIUAAAAAFfcqSE48NIh-v-Z-D5-S928R9CT"></div>
                <button type="submit" name="sbm" class="btn btn-primary">Gửi</button>
            </form>
        </div>
    </div>
    <!--	End Comment	-->

    <!--	Comments List	-->

    <?php
                        $sql = "SELECT * FROM comment WHERE prd_id = $prd_id ORDER BY prd_id DESC";
                        $query = mysqli_query($conn , $sql);
                    
                    ?>
    <div id="comments-list" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?php while($row = mysqli_fetch_array($query)){ ?>
            <div class="comment-item">
                <ul>
                    <li><b><?php echo $row['comm_name']; ?></b></li>
                    <li><?php echo $row['comm_date']; ?></li>
                    <li>
                        <p><?php echo $row['comm_details']; ?></p>
                    </li>
                </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    <!--	End Comments List	-->
</div>
<!--	End Product	-->
<div id="pagination">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
    </ul>
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>