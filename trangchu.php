<?php
	session_start();
  $conn = mysqli_connect('localhost','root','','viet_finance');
  // Check connection
 	 if ($conn->connect_error) {
      die("Connection failed: "
          . $conn->connect_error);}

 	// SAVE BOXCHAT FORM DATA TO DATABASE
	if(isset($_POST['qssubmit'])){
	$qsname = $_POST['qsname'];
	$qsemail = $_POST['qsemail'];
	$qsmessage = $_POST['qsmessage'];
	if($qsname !=''||$qsemail !=''){
	$insert = "INSERT INTO question(name, email, message) VALUES('$qsname','$qsemail','$qsmessage')";
    mysqli_query($conn, $insert);
	}}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="trangchu.css">
	<link rel="stylesheet" href="gioithieu.css">
    <link rel="stylesheet" href="Trang2.css">
	<link rel="stylesheet" href="trang03.css">
	<link rel="stylesheet" href="banggia.css">
	<link rel="stylesheet" href="trang4.css">
	<link rel="stylesheet" href="cauhoi.css">
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <!-- SCROLL VỀ ĐẦU -->
    <a class="scrollTop" href="#"><i class="fa fa-chevron-up"></i></a> 
    <!-- TRANG CHỦ -->
    <section class="trangchu" id="trangchu">
        <header>
            <a href="#" class="logo"><img class="logo" src="logo-vietfinance.png"></a>
            <ul>
                <li><a href="#trangchu"><button class="gachduoi">Trang chủ</button></a></li>
				<li><a href="#gioithieuus"><button class="gachduoi">Về vietfinance</button></a></li>
                <li><a href="#productinfo"><button class="gachduoi">Sản phẩm</button></a></li>
                <li><a href="#productprice"><button class="gachduoi">Bảng giá</button></a></li>
				<li><a href="#productquestion"><button class="gachduoi">Câu hỏi</button></a></li>
            </ul>
			<ul>
				<li class="buttondangky"><a href="user/dangky.php"><button>Đăng ký</button></a></li>
				<li class="buttondangnhap"><a href="user/dangnhap.php"><button>Đăng nhập</button></a></li>
			</ul>
        </header>
        <div class="content">
            <div class="textBox">
                <h2>Ứng dụng quản lý tài<br>chính cho tích lũy,<br>đầu tư vừa, nhỏ</h2>
                <p>Công ty tài chính VietFinance giấy phép số 50/UBCK-GPHĐKD</p>
				<div class="textBox_button">
                <a class="dungthu" href="user/dangky.php">Trải nghiệm miễn phí&nbsp;&nbsp;<i class="fa-solid fa-arrow-right"></i></a>
				<a class="dangkytuvan" href="#mainform">Đăng ký tư vấn</a>
				</div>
				<div class="taiapp">
				<!-- App Store button -->
					<a href="https://www.apple.com/app-store/" target="_blank" class="market-btn apple-btn" role="button">
						<span class="market-button-subtitle">Tải xuống trên</span>
						<span class="market-button-title">App Store</span>
					</a>
				<!-- Google Play button -->
					<a href="https://play.google.com/store/apps" target="_blank" class="market-btn google-btn" role="button">
						<span class="market-button-subtitle">Tải xuống trên</span>
						<span class="market-button-title">Google Play</span>
					</a>
				</div>
            </div>
        </div>
        <div class="imgBox">
            <img src="trangchuapp.png" class="flowerpot">
        </div>
    </section>
		<!-- CHATBOX -->
	<div class="chatwithme">
		<input type="checkbox" id="click">
		<label class="chatwithmelabel" for="click">
		<i class="fab fa-facebook-messenger"></i>
		<i class="fas fa-times"></i>
		</label>
		<div class="wrapper">
		   <div class="head-text">
			  Đặt câu hỏi
		   </div>
		   <div class="chat-box">
			  <div class="desc-text">
				Nếu bạn có bất kì câu hỏi nào cần giải đáp, hãy để lại thông tin chúng tôi sẽ liên hệ với bạn
			  </div>
			  <form action="" method="POST">
				 <div class="field">
					<input type="text" name="qsname"  placeholder="Họ và tên" required>
				 </div>
				 <div class="field">
					<input type="email" name="qsemail"  placeholder="Địa chỉ email" required>
				 </div>
				 <div class="field textarea">
					<textarea cols="30" rows="10" name="qsmessage" placeholder="Tin nhắn (không quá 255 ký tự)" required></textarea>
				 </div>
				 <div class="field">
					<button type="submit" name="qssubmit">Gửi tin nhắn</button>
				 </div>
			  </form>
		   </div>
		</div>
	</div>
	<section class="wrappergioithieu" id="gioithieuus">
		<div class="containergioithieu">
		  <div class="aboutus">Về chúng tôi</div>
		  <div class="row">
			<div class="left">
			  <div class="brand">
			  </div>
			  <h2>Công ty tài chính VietFinance</h2>
			  <p>
				Chúng tôi mong muốn xây dựng và phát triển VietFinance thành một tổ chức tài chính tin cậy
				cung cấp các sản phẩm đầu tư minh bạch và đáng tin cậy, được hỗ trợ bởi đội ngũ chính trực 
				và chuyên nghiệp cũng như nền tảng công nghệ đa tiện ích cho mọi đối tượng khách hàng.
				Với mục tiêu đó, VietFinance sẽ trở thành nơi kết nối trí tuệ của tập thể, khơi dậy dòng vốn 
				trong nhân dân và tạo cơ hội cho mọi người trở thành một phần không thể thiếu góp phần tạo nên 
				ước mơ về một Thị trường Việt Nam lớn mạnh.
			  </p>
			</div>
			<div class="right">
			  <img src="https://raw.githubusercontent.com/tthanhvu002/image/master/img/0D4ib7l.png" alt="" />
			</div>
		  </div>
		  <div class="why">
			  <h2>Vì sao chọn VietFinance?</h2>
			  <ul>
				  <li>
					  <h2>
						  13
					  </h2>
					  <p> <span>Năm kinh nghiệm</span> trong lĩnh vực CNTT </p>
				  </li>
				  <li>
					  <h2>
						  20
					  </h2>
					  <p> <span>quốc gia</span> có sự hiện diện của VietFinance </p>
				  </li>
				  <li>
					  <h2>
						  70.000+
					  </h2>
					  <p> <span>đơn vị hành chính sự nghiệp</span> tin dùng sản phẩm VietFinance </p>
				  </li>
				  <li>
					  <h2>
						  170.000+
					  </h2>
					  <p> <span>doanh nghiệp</span> tin dùng sản phẩm VietFinance </p>
				  </li>
				  <li>
					  <h2>
						  2.500.000+
					  </h2>
					  <p> <span>hộ cá thể và cá nhân</span> tin dùng sản phẩm VietFinance </p>
				  </li>
				  
  
			  </ul>
		  </div>
		</div>
	  </section>
    <!-- Trang 2-3 -->
    <section>
		<div class="decorCenter standard">
			<h1 class="title">VietFinance uy tín như thế nào?</h1>
			<div class="content">
				<div class="trang2__item full-width">
					<img src="VNSC.png" alt="" class="vnsc">
					<p>
						<b>VietFinance được bảo hộ bởi VNSC</b>
						<br>
						Giấy phép hoạt động kinh doanh số 50/UBCK-GPHĐKD do UBCK cấp ngày 29/12/2006
					</p>
				</div>
				<div class="trang2__item">
					<img src="thienviet.png" alt="" class="size64">
					<p>
						Tài sản của bạn được quản lý bởi 
						<b>Công ty Cổ phần Quản lý Quỹ Thiên Việt (TVAM) </b>
						giấy phép số 15/UBCK-GPHĐQLQ
					</p>
				</div>
				<div class="trang2__item">
					<img src="ey1.png" alt="" class="size64">
					<p>
						<b>Kiểm toán hàng năm</b> bởi <b>Emst & Young (EY)</b> 
						- 1 trong 4 công ty kiểm toán lớn nhất thế giới
					</p>
				</div>
				<div class="trang2__item">
					<img src="cmc1.png" alt="" class="size">
					<p>
						<b>Kiểm tra tính bảo mật hệ thống</b> bởi <b>CMC</b>
						- Tập đoàn công nghệ, thông tin, viễn thông lớn thứ 2 Việt Nam
					</p>
				</div>
				<div class="trang2__item">
					<img src="logo_bidv.png" alt="" class="size64">
					<p>
						BIDV là <b>ngân hàng giám sát dòng tiền trong việc đầu tư, tích lũy</b>
						của công ty khi thực hiện uỷ thác đầu tư đối với VietFinance và TVAM 
					</p>
				</div>
			</div>
		</div>
		<div class="decorCenter product" id="productinfo">
			<h1 class="title">Dịch vụ cung cấp</h1>
				<ul class="trang3__menu">
					<a href="#1">
						<li class="trang3__menuItem active">Đầu tư quỹ</li>
					</a>
					<a href="#2">
						<li class="trang3__menuItem">
							Chứng khoán
						</li>
					</a>
					<a href="#3">
						<li class="trang3__menuItem">
							Tích lũy
						</li>
					</a>
					<a href="#4">
						<li class="trang3__menuItem">
							Hũ vàng
						</li>
					</a>
					<a href="#5">
						<li class="trang3__menuItem">
							Ngân hàng
						</li>
					</a>
					<a href="#6">
						<li class="trang3__menuItem">
							Bảo vệ
						</li>
					</a>
					<a href="#7">
						<li class="trang3__menuItem">
							Hoàn tiền
						</li>
					</a>
				</ul>
			<div class="slide__trans">
				<div class="slide7">
					<div class="slide__inside" id="1">
						<div class="trang3__content">
							<p class="bold">Đầu tư uỷ thác, an tâm sinh lời. Chỉ cần từ 50.000đ để bắt đầu</p>
							<p><i class="fa-solid fa-check"></i>Tăng trưởng bền vững hàng năm (6% - 49.5%/năm)</p>
							<p><i class="fa-solid fa-check"></i>Chỉ cần vốn nhỏ để đầu tư</p>
							<p><i class="fa-solid fa-check"></i>An toàn và minh bạch, được kiểm toán</p>
							<a href="#mainform"><button class="button">
								Đăng ký tư vấn
							</button></a>
						</div>
						<img src="2331.jpg" alt="" class="picture">
					</div>
					<div class="slide__inside" id="2">
						<div class="trang3__content">
							<p class="bold">Đầu tư chứng khoán đơn giản, loại bỏ rào cản về vốn</p>
							<p><i class="fa-solid fa-check"></i>Đầu tư cổ phiếu chỉ từ 10.000đ</p>
							<p><i class="fa-solid fa-check"></i>Giao diện đơn giản, trải nghiệm dễ dàng</p>
							<p><i class="fa-solid fa-check"></i>Hướng dẫn cơ bản cho người mới đầu tư</p>
							<a href="user/dangky.php"><button class="button">
								Dùng thử miễn phí
							</button></a>
						</div>
						<img src="chungkhoan.png" alt="" class="picture">
					</div>
					<div class="slide__inside" id="3">
						<div>
							<div class="trang3__content">
								<p class="bold">Tích luỹ linh hoạt, lãi tăng hàng ngày</p>
								<p><i class="fa-solid fa-check"></i> Lợi nhuận hấp dẫn</p>
								<p><i class="fa-solid fa-check"></i>Miễn phí nạp, rút tiền</p>
								<p><i class="fa-solid fa-check"></i>Phát hành bởi các ngân hàng và định chế tài chính</p>
								<a href="#mainform"><button class="button">
								Đăng ký tư vấn
							</button></a>
							</div>
						</div>
						<img src="Frame-2191.png" alt=""  class="picture">
					</div>
					<div class="slide__inside" id="4">
						<div class="trang3__content">
							<p class="bold">Mua bán dễ dàng, gửi vàng miễn phí</p>
							<p><i class="fa-solid fa-check"></i>Mua bán vàng online chỉ trong 5 giây</p>
							<p><i class="fa-solid fa-check"></i>Giao dịch bất kỳ khi nào bạn muốn</p>
							<p><i class="fa-solid fa-check"></i>Gửi vàng miễn phí, quản lý vàng trên ứng dụng, nhận vàng khi có nhu cầu</p>
							<p style="color:gray; font-size: 15px; font-style: italic;">* Thông tin sản phẩm vàng: Nhẫn vàng 24K, sản xuất bởi CTCP Vàng bạc Đá quý Phú Nhuận (PNJ)</p>
							<a href="user/dangky.php"><button class="button">
								Dùng thử miễn phí
							</button></a>
						</div>
						<img src="Frame-2191.jpg" alt="" class="picture">
					</div>
					<div class="slide__inside" id="5">
						<div class="trang3__content">
							<p class="bold">Đầu tư - Tích lũy - Tiêu dùng
								Chỉ trong một ứng dụng</p>
							<p><i class="fa-solid fa-check"></i>Dễ dàng quản lý tài khoản ngân hàng số trên Finhay</p>
							<p><i class="fa-solid fa-check"></i>Miễn phí nạp tiền đầu tư, tích lũy từ CIMB tới Finhay</p>
							<p><i class="fa-solid fa-check"></i>Miễn phí rút tiền tích lũy từ Finhay về CIMB chỉ trong vòng 5 giây</p>
							<p><i class="fa-solid fa-check"></i>Thanh toán đơn giản, chi tiêu thuận tiện</p>
							<a href="#mainform"><button class="button">
								Đăng ký tư vấn
							</button></a>
						</div>
						<img src="Bank.jpg" alt="" class="picture">
					</div>
					<div class="slide__inside" id="6">
						<div class="trang3__content">
							<p class="bold">Bảo vệ tương lai bằng các sản phẩm bảo hiểm</p>
							<p><i class="fa-solid fa-check"></i>Nhận được giá trị bảo vệ lên tới 200.000.000đ</p>
							<p><i class="fa-solid fa-check"></i>Chi phí từ 300đ/ngày</p>
							<p><i class="fa-solid fa-check"></i>Quyền lợi bảo hiểm rõ ràng</p>
							<p><i class="fa-solid fa-check"></i>Thủ tục chi trả bồi thường đơn giản, nhanh chóng</p>
							<a href="user/dangky.php"><button class="button">
								Dùng thử miễn phí
							</button></a>
						</div>
						<img src="shield.jpg" alt="" class="picture">
					</div>
					<div class="slide__inside" id="7">
						<div class="trang3__content">
							<p class="bold">Mua sắm online - Vừa hoàn, vừa lãi</p>
							<p><i class="fa-solid fa-check"></i>Tỉ lệ hoàn tiền cao lên đến 14%</p>
							<p><i class="fa-solid fa-check"></i>Hoàn tiền thật không hoàn voucher</p>
							<p><i class="fa-solid fa-check"></i>Tiền hoàn được tái đầu tư sinh lời</p>
							<p><i class="fa-solid fa-check"></i>Tích lũy ngay cả lúc chi tiêu</p>
							<a href="#mainform"><button class="button">
								Đăng ký tư vấn
							</button></a>
						</div>
						<img src="Cart.jpg" alt="" class="picture">
					</div>
				</div>
			</div>
		</div>
		</section>
	    <!-- Tính năng -->
		<section class="khungbig1" id="khungbig1">
			<h1 class="title_tinhnang">TÍNH NĂNG</h1><br>
			<div class="khungsmall1">
				<div class="text_tinhnang">
					<div class="s1">
						<div class="s11"><h4 class="h4tinhnang">Đa dạng tính năng</h4><br>
							<p>Dễ dàng chuyển đổi giữa </p>
							<p>đầu tư quỹ, tích lũy,...</p>
						</div><br>
						<div class="s12"><img class="logotinhnang" src="IMAGE1.png" alt=""> </div><br>
					</div>
					<div class="s2">  
						<div class="s21"><h4 class="h4tinhnang">Trải nghiệm mượt mà</h4><br>
							<p>Tối ưu hóa cho trải nghiệm </p>
							<p>tuyệt vời trên mọi thiết bị</p>
						</div><br>
						<div class="s22"><img class="logotinhnang" src="IMAGE2.png" alt=""> </div>
					</div>
					<div class="s3">  
						<div class="s31"><h4 class="h4tinhnang">Hỗ trợ nhanh chóng</h4><br>
							<p>Nhân viên tư vấn có mặt tại</p>
							<p>văn phòng sẵn sàng hỗ trợ</p>
						</div><br>
						<div class="s32"><img class="logotinhnang" src="IMAGE3.png" width="10%"  alt=""> </div>
					</div>
				</div>
				<div class="smart"><img class="dienthoai" src="IphoneX.png" alt=""></div>
				<div class="khungsmall2">
					<div class="text2">
						<div class="s4">
							<div class="s41"><h4 class="h4tinhnang">Thiết lập dễ dàng</h4><br>
							<p>Chỉ với 2 bước thiết lập người</p> 
							<p>dùng đã có thể sử dụng</p></div>
							<div class="s42"><img class="logotinhnang" src="IMAGE.png" alt=""> </div>
						</div>
						<div class="s5">  
							<div class="s51"><h4 class="h4tinhnang">Giao diện thân thiện</h4><br>
							<p>Phong cách trẻ trung, hiện đại</p>
							<p>không gây lóa, mỏi mắt </p></div>
							<div class="s52"><img class="logotinhnang" src="IMAGEE.png"alt=""> </div>
						</div>
						<div class="s6">  
							<div class="s61"><h4 class="h4tinhnang">Dữ liệu bảo mật</h4><br>
							<p>Lưu trữ trên hệ thống server</p>
							<p>đạt tiêu chuẩn ATTT</p></div>
							<div class="s62"><img class="logotinhnang" src="IMAGEEE.png" alt=""> </div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Lợi ích khi sử dụng -->
		<section class="loiich">
			<h1>Lợi ích khi sử dụng VietFinance</h1>
			<div class="box">
				<div class="content1">
					<img class="loiichavatar" src="loinhuan.png" alt="">
					<h2> Lợi nhuận</h2><br>
					
						<p><i class="fa-solid fa-arrow-trend-up"></i>
							Tức thời nắm bắt hoạt động
							của doanh nghiệp để đưa ra
							các quyết định kịp thời
						</p>
						<p><i class="fa-solid fa-arrow-trend-up"></i>
							Giúp giảm chi phí vận hành,
							nâng cao sản xuất, gia tăng
							lợi nhuận
						</p>
				</div>
				<div class="content2">
					<img class="loiichavatar" src="tkchiphi.png" alt="">
					<h2> Tiết kiệm chi phí</h2><br>
					
						<p><i class="fa-solid fa-arrow-trend-up"></i>
							Kiểm soát chặt chẽ chi phí
							để cắt giảm các khoản không
							cần thiết
						</p>
						<p><i class="fa-solid fa-arrow-trend-up"></i>
							Tiết kiệm chi phí do 
							không đầu tư cơ sở hạ
							tầng, nhân sự quản trị hệ thống
						</p>
					
				</div>
				<div class="content3">
					<img class="loiichavatar" src="NSlamviec.png" alt="">
					<h2> Năng suất làm việc</h2><br>
					
						<p><i class="fa-solid fa-arrow-trend-up"></i>
							Giảm bớt thời gian làm việc thử công</p>
						<p><i class="fa-solid fa-arrow-trend-up"></i>
							Quy định được xây dựng rõ ràng,
							liên kết với các phòng ban khác
							chặt chẽ
						</p>
					
				</div>
			</div>
		</section>
    <!-- Thông tin của bạn sẽ luôn được bảo vệ -->
    <section class="baove" id="baove">
        <h2 class="title">Thông tin của bạn sẽ luôn được bảo vệ</h2>
        <div class="baoveblock">
            <div class="item">
                <div class="box">
                <div class="imgBx"><i class="fa-solid fa-shield-halved"></i></div>
                <p><b>256-bit Secure Sockets Layer</b></p>
                </div>
            </div>
            <div class="item">
                <div class="box">
                <div class="imgBx"><i class="fa-solid fa-rotate-right"></i></div>
                <p><b>Ngăn chặn thông tin thay đổi</b></p>
                </div>
            </div>
            <div class="item">
                <div class="box">
                <div class="imgBx"><i class="fa-solid fa-gear"></i></div>
                <p><b>Mã hóa dữ liệu</b></p>
                </div>
            </div>
            <div class="item">
                <div class="box">
                <div class="imgBx"><i class="fa-solid fa-key"></i></div>
                <p><b>Cấu trúc DMZ phòng tránh tấn công</b></p>
                </div>
            </div>
            <div class="item">
                <div class="box">
                <div class="imgBx"><i class="fa-solid fa-folder-open"></i></div>
                <p><b>Kiểm tra tính bảo mật của hệ thống bởi CMC</b></p>
                </div>
            </div>
            <div class="item">
                <div class="box">
                <div class="imgBx"><i class="fa-solid fa-user-lock"></i></div>
                <p><b>An toàn tuyệt đối cho tài khoản của bạn</b></p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
	<section class="banggia" id="productprice">
		<div class="background">
				<div class="container">
				<h2 class="pkgtitle">Bảng giá dịch vụ</h2>
				<div class="package">
					<?php
							$db = array(
								'server' => 'localhost',
								'username' => 'root',
								'password' => '',
								'dbname' => 'viet_finance'
							);
							// tạo kết nối
							$connect = mysqli_connect($db['server'], $db['username'], $db['password'], $db['dbname']);
							mysqli_set_charset($connect,'utf8');
							if(!$connect){
								die("Kết nối thất bại: " . mysqli_connect_error());
							}
							$sql = "SELECT * FROM goi";
							$result = mysqli_query($connect, $sql);
							foreach($result as $addPackage){
						?>
					<div class="pkgbox">
						<h2><?php echo $addPackage['tenGoi']; ?></h2>
						<div class="cost">
							<p><?php echo $addPackage['giaGoi']; ?></p>
							<span><i>(VNĐ/năm)</i></span>
						</div>
						<div class="pkglist">
							<ul class="pkgul">
							<li><p><?php echo $addPackage['tinhNang1']?></p></li>
							<li><p><?php echo $addPackage['tinhNang2']?></p></li>
							<li><p><?php echo $addPackage['tinhNang3']?></p></li>
							<li><p>Và những tính năng đã sở hữu..</p></li>
							</ul>
						</div>
						<div class="btnpkgdetail">
							<button class="paybtn"><a href="thanhtoan.php?maGoi=<?php echo $addPackage['maGoi']?>">Mua ngay</a></button>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<section class="giaidap">
	<div class="container">
		<section class="customer-logos slider">
		   <div class="slide"><img src="logo1.png"></div>
		   <div class="slide"><img src="logo2.png"></div>
		   <div class="slide"><img src="logo3.png"></div>
		   <div class="slide"><img src="logo4.png"></div>
		   <div class="slide"><img src="logo5.png"></div>
		   <div class="slide"><img src="logo6.png"></div>
		   <div class="slide"><img src="logo1.png"></div>
		   <div class="slide"><img src="logo2.png"></div>
		   <div class="slide"><img src="logo3.png"></div>
		   <div class="slide"><img src="logo4.png"></div>
		   <div class="slide"><img src="logo5.png"></div>
		   <div class="slide"><img src="logo6.png"></div>
		</section>
	 </div>
	<div class="containercauhoi" id="productquestion"> 
        <h2 class="title-section">Câu hỏi thường gặp</h2>
        <div class="groupcauhoi" id="faq"> 
            <div class="question q1"> 
                <div class="panel-heading" data-toggle="collapse" data-parent="#faq" data-target="#q1"> 
                    <p>Thời gian sử dụng phần mềm là bao lâu?</p>
					<i class="fa-solid fa-angle-down"></i>  </div>
                    
                <div id="q1" class="panel-collapse collapse"> 
                    <div class="panel-answer"> 
                        <p>Quý khách sẽ được dùng thử 15 ngày miễn phí hoàn toàn 20 phân hệ phần mềm VietFinance
                        Kế toán với sự hướng dẫn tận tình của nhân viên tư vấn.</p>
                    </div> 
                </div> 
            </div> 

            <div class="question q2"> 
                <div class="panel-heading" data-toggle="collapse" data-parent="#faq" data-target="#q2">   
                    <p>Phần mềm có thể sử dụng cho nhiều tài khoản không?</p>  
					<i class="fa-solid fa-angle-down"></i>  </div> 

                <div id="q2" class="panel-collapse collapse"> 
                    <div class="panel-answer"> 
                        <p>Phần mềm VietFinance cho phép dùng được nhiều dữ liệu nhưng khi in báo cáo 
                        chứng từ phần mềm sẽ chỉ xuất tên của công ty có GPSD.</p> 
                    </div> 
                </div> 
            </div> 

            <div class="question q3"> 
                <div class="panel-heading" data-toggle="collapse" data-parent="#faq" data-target="#q3">  
                    <p>Phần mềm có hỗ trợ xem trên điện thoại không?</p>
					<i class="fa-solid fa-angle-down"></i>   </div> 

                <div id="q3" class="panel-collapse collapse"> 
                    <div class="panel-answer">
                        <p>Phần mềm hiện đã có ứng dụng VietFinance cài đặt hoàn toàn miễn phí 
                        trên điện thoại. Với ứng dụng này, nhà quản trị có thể nắm bắt tình hình tài chính, 
                        kế toán ngay tức thì và điều hành, quản lý doanh nghiệp mọi lúc mọi nơi ngay trên Mobile.</p> 
                    </div> 
                </div> 
            </div> 

            <div class="question q4"> 
                <div class="panel-heading" data-toggle="collapse" data-parent="#faq" data-target="#q4"> 
                    <p>Tôi có được hỗ trợ trong quá trình sử dụng hay không? </p>
					<i class="fa-solid fa-angle-down"></i> </div> 

                <div id="q4" class="panel-collapse collapse"> 
                    <div class="panel-answer">
                        <p>Với tâm thế phụng sự khách hàng một cách hiệu quả nhất, VietFinance đã và đang thiết lập 
                        các kênh hỗ trợ kỹ thuật trên đa nền tảng nhằm phục vụ khách hàng nhanh chóng, kịp thời. 
                        Khi cần được hỗ trợ, anh chị có thể liên hệ: Tổng đài VietFinance, Cộng đồng hỗ trợ qua 
                        Facebook, Fanpage VietFinance. </p> 
                    </div> 
                </div> 
            </div>

            <div class="question q5"> 
                <div class="panel-heading" data-toggle="collapse" data-parent="#faq" data-target="#q5"> 
                    <p>Phần mềm có thể sử dụng trên các thiết bị và hệ điều hành nào?</p>
					<i class="fa-solid fa-angle-down"></i>  </div> 

                <div id="q5" class="panel-collapse collapse"> 
                    <div class="panel-answer">
                       <p>VietFinance có thể sử dụng trên cả hệ điều hành Windows và MacOS. </p> 
                    </div> 
                </div> 
            </div>

        </div> 
    </div>
	</section>
    <!-- Form -->
	<section class="mainform" id="mainform">
	<?php include 'dangkytuvan.php'?>
    <div class="content_mainform">
		<h3 class="heading">Đăng ký tư vấn trải nghiệm VietFinance</h3>
      <form action="" method="POST" class="form_dktv" id="form-1">
        <div class="form-body">

      
          <div class="spacer"></div>
      
          <div class="form-group">
            <label for="fullname" class="form-label">Tên đầy đủ</label>
            <input id="fullname" name="fullname" type="text" placeholder="VD: Nguyễn Văn A" class="form-control">
            <span class="form-message"></span>
          </div>
  
          <div class="form-group">
            <label for="fullname" class="form-label">Số CMND/CCCD</label>
            <input id="citizenId" name="citizenId" type="text" placeholder="Điền số CMND của bạn" class="form-control">
            <span class="form-message"></span>
          </div>
      
          <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="text" placeholder="VD: email@gmail.com" class="form-control">
            <span class="form-message"></span>
          </div>
  
          <div class="form-group">
            <label for="email" class="form-label">Số điện thoại</label>
            <input id="number" name="number" type="text" placeholder="VD: 0988888888" class="form-control">
            <span class="form-message"></span>
          </div>
  
          <button class="form-submit"><span>Đăng ký tư vấn</span></button>
        </div>
  
        <div class="form-image">
          <img src="illustration03.png" alt="" class="image">
        </div>
      </form>
    </div>
	<script src="main.js"></script>
	<script>
 // Mong muốn của chúng ta
  	Validator({
	form: '#form-1',
	formGroupSelector: '.form-group',
	errorSelector: '.form-message',
	rules: [ 
	  Validator.isRequired('#fullname'),
	  Validator.isRequired('#citizenId'),
	  Validator.isEmail('#email'),
	  Validator.isNum('#number'),
	],
  });
</script>

  </section>
    <footer>
        <div class="foot">
            <div class="trapgirl">
                    <div class="foot_content">
                        <p id="foot1">024 7304 8833</p>
                        <p class="doan">Tầng 10, tòa nhà Lucky Building, 81 Trần Thái Tông, Dịch Vọng, Cầu Giấy, Hà Nội</p>
                        <p class="doan">Phòng Đăng ký kinh doanh - Sở Kế hoạch và Đầu tư TP.Hà Nội</p>
                        <p class="doan">Giấy CNĐKKD: 0108154682 - Ngày cấp: 03/02/2018, được sửa đổi lần thứ 07<br> ngày 16/07/2021</p>
                    </div>
                    <div class="footer-image">
                        <img src="logo-vietfinance.png" alt="footer image">
                    </div>
            </div>
        </div>
    </footer>
    <script>
        /*HOVER THANH NAVIGATION*/
        var navbar = document.querySelector('header')
        window.onscroll = function() {
        if (window.pageYOffset > 0) {
            navbar.classList.add('scrolled')
        } else {
          navbar.classList.remove('scrolled')
         }}
        /*SCROLL VỀ TRANG ĐẦU*/
        const scrollTop = document.querySelector(".scrollTop"); 
	       
	       window.addEventListener("scroll", () => {
	           if (window.pageYOffset > 100){
	               scrollTop.classList.add("active");
	           } else{
	               scrollTop.classList.remove("active");  
	           }
	       })
            /*LOGO SLIDER JQUERY*/
           $(document).ready(function(){
             $('.customer-logos').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4
                    }
                     }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 3
                            }
                        }]
                    });
                });
			  /*CONTENT SLIDER*/
				let menu_item = document.querySelectorAll('.trang3__menuItem');
    for (let i = 0; i < menu_item.length; i++) {
        menu_item[i].onclick = function() {
            let j = 0;
            while (j < menu_item.length) {
                menu_item[j++].className = 'trang3__menuItem';
            }
            menu_item[i].className = 'trang3__menuItem active';
    }
};
    </script>
</body>
</html>