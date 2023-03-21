<div id="fh5co-offcanvas">
	<a href="#" class="fh5co-close-offcanvas js-fh5co-close-offcanvas"><span><i class="icon-cross3"></i> <span>Close</span></span></a>
	<div class="fh5co-bio">

		<a class="navbar-brand text-success logo h1 align-self-center" href="/">
				<h2>
				Fashion
				</h2>
		</a>
		<br>
		<h3 class="heading">Về chúng tôi</h3>
		<br>
		<p>Được biết đến như là một trong những thương hiệu thời trang với phong cách trẻ trung, hiện đại và thanh lịch. Ra mắt Khách hàng từ năm 2022, Fashionn nhanh chóng được đón nhận và yêu thích bởi những thiết kế đẹp, chất, luôn bắt kịp dòng chảy thời trang hiện đại và cho ra đời những thiết kế độc đáo, tinh tế, góp làn gió mới vào thị trường thời trang.</p>

		<ul class="fh5co-social">
			<li><a href="#"><i class="icon-twitter"></i></a></li>
			<li><a href="#"><i class="icon-facebook"></i></a></li>
			<li><a href="#"><i class="icon-instagram"></i></a></li>
		</ul>
	</div>

	<div class="fh5co-menu">
		<div class="fh5co-box">
			<h3 class="heading">Các loại sản phẩm</h3>
			<ul>
				<?php
				while ($blog_category = $blog_categories->fetch_assoc()) {
				?>
					<li><a href="/posts/cate/<?= $blog_category['slug']; ?>"><?= $blog_category['type_name']; ?></a></li>
				<?php
				}
				?>
			</ul>
		</div>
		<div class="fh5co-box">
			<h3 class="heading">Search</h3>
			<form action="#">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Type a keyword">
				</div>
			</form>
		</div>
	</div>
</div>

<header id="fh5co-header">

	<div class="container-fluid">

		<div class="row">
			<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
			<ul class="fh5co-social">
				<li><a href="#"><i class="icon-twitter"></i></a></li>
				<li><a href="#"><i class="icon-facebook"></i></a></li>
				<li><a href="#"><i class="icon-instagram"></i></a></li>
			</ul>
			<div class="col-lg-12 col-md-12 text-center">
				<h1 id="fh5co-logo"><a href="/posts">Fashion<sup>Blog</sup></a></h1>
			</div>

		</div>

	</div>

</header>
