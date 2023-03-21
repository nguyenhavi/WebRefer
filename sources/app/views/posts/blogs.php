<?php include_once USER_PATH."views/shared/blog_header.php"?>

<div class="container-fluid">
	<div class="row fh5co-post-entry">

		<?php

		if (!isset($_GET['category'])) {
			while ($post = $posts->fetch_assoc()) {
				if ($post['status'] == 1) {
		?>
						<!-- "col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box" -->
					<article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box fixed_height">
						<figure>
							<a href="/posts/single/<?= $post['id']."-".$post['pslug']; ?>"><img src="<?= PATH_URL_IMG_BLOG. $post['main_pic']; ?>" alt="Image" class="img-responsive"></a>

						</figure>
						<span class="fh5co-meta"><a href="/posts/single/<?= $post['id']."-".$post['pslug'];  ?>"><?= $post['type_name']; ?></a></span>
						<h2 class="fh5co-article-title"><a href="/posts/single/<?= $post['id']."-".$post['pslug']; ?>"><?= $post['title']; ?></a></h2>
						<span class="fh5co-meta fh5co-date"><?= $post['date']; ?></span>
					</article>
			<?php
				}
			}
		} else {
			?>

			<?php
			$blog_choosen_category = $_GET['category'];
			while ($post = $posts->fetch_assoc()) {
				if ($post['slug'] == $blog_choosen_category) {
			?>
					<article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box fixed_height">
						<figure>
							<a href="/posts/single/<?= $post['id']; ?>"><img src="<?= PATH_URL_IMG_BLOG.$post['main_pic']; ?>" alt="Image" class="img-responsive"></a>
						</figure>
						<span class="fh5co-meta"><a href="/posts/single/<?= $post['id']; ?>"><?= $post['type_name']; ?></a></span>
						<h2 class="fh5co-article-title"><a href="/posts/single/<?= $post['id']; ?>"><?= $post['title']; ?></a></h2>
						<span class="fh5co-meta fh5co-date"><?= $post['date']; ?></span>
					</article>
		<?php
				}
			}
		}
		?>
	</div>
</div>


<!-- Pagination -->
<!-- <div class="soft-pagination">
	<ul class="soft-pagination-items">
		<li> <i class="fa fa-chevron-circle-left" style="font-size:20px;color:white"></i></li>
		<li class="active">1</li>
		<li>2</li>
		<li>3</li>
		<li>4</li>
		<li>5</li>
		<li> <i class="fa fa-chevron-circle-right" style="font-size:20px;color:white;"></i></li>
	</ul>
</div> -->
<!---->