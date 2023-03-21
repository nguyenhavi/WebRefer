<?php
while($single_comment = $all_comments2->fetch_assoc()){
	if(isset($_POST[$single_comment['id']])){
		$conn = DB::getInstance();

		$sql = "DELETE FROM comments WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i", $single_comment['id']);
		$stmt->execute();

		header("Location: /posts/single/" . $_GET['id']);
		exit();
	}
}
?>


<?php
if(isset($_POST['submit'])){
$message;
$user_id;
$comments = $_POST['comments'];
$datetime = date("Y-m-d") . " " . date("h:i:sa");
$datetime = substr($datetime, 0, -2);

	$conn = DB::getInstance();

	$sql = "INSERT INTO comments (post_id, user_id, content, createDate, author, email) VALUES(?,?,?,?,?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("iissss", $_GET['id'], $_SESSION['user']['id'], $comments, $datetime, $_SESSION['user']['fullname'], $_SESSION['user']['email']);
	$stmt->execute();

	header("Location: /posts/single/" . $_GET['id']);
	exit();

}
// }

?>

<?php include_once USER_PATH."views/shared/blog_header.php"?>


<a href="/posts/single/<?= $pre_blog_id."-".Post::findByID($pre_blog_id)["slug"];  ?>" class="fh5co-post-prev"><span><i class="icon-chevron-left"></i> Prev</span></a>
<a href="/posts/single/<?= $next_blog_id."-".Post::findByID($pre_blog_id)["slug"];  ?>" class="fh5co-post-next"><span>Next <i class="icon-chevron-right"></i></span></a>



<!-- END #fh5co-header -->
<div class="container-fluid">
	<?php
	$id = $_GET['id'];
	while ($one_post = $post->fetch_assoc()) {
	?>
		<div class="row fh5co-post-entry single-entry">
			<article class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
				<figure class="animate-box" >
					<img src="<?= PATH_URL_IMG_BLOG . $one_post['main_pic']; ?>" alt="Image" class="img-responsive auto-height">
				</figure>

				<span class="fh5co-meta animate-box"><?= $one_post['type_name']; ?></span>
				<h2 class="fh5co-article-title animate-box"><?= $one_post['title']; ?></h2>
				<span class="fh5co-meta fh5co-date animate-box"><?= $one_post['date']; ?></span>

				<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">

					<div class="row rp-b">
						<div class="col-lg-6 col-lg-push-6 col-md-12 col-md-push-0 animate-box">
							<figure>
								<img src="<?=  PATH_URL_IMG_BLOG . $one_post['sub_pic']; ?>" alt="Image" class="img-responsive">
								<figcaption class="sub-pic-quote"><?=  $one_post['sub_pic_quote']; ?></figcaption>
							</figure>
						</div>
						<div class="col-lg-6 col-lg-pull-6 col-md-12 col-md-pull-0 cp-r animate-box para1">
							<p><?= $one_post['para1']; ?></p>
						</div>
					</div>

					<div class="row">

						<div class="col-md-12 animate-box">
							<!-- <h2>Pointing has no control about the blind texts</h2> -->
							<p class="para2"><?= $one_post['para2']; ?></p>
						</div>
					</div>


				</div>
			</article>
		<?php
	}

		?>
		</div>
</div>


<!-- Comment section -->

<div class="container">
	<div class="be-comment-block">
		<?php $comment_in_blog = $comment_num->fetch_assoc() ?>
		<h1 class="comments-title">Comments (<?= $comment_in_blog['blog_num'] ?>)</h1>
		<?php
			while($one_comment = $all_comments->fetch_assoc()){
		?>
		<div class="be-comment">
			<div class="be-img-comment">
				<a href="#">
					<img src="<?= PATH_URL_IMG . $one_comment['avatar'] ?>" alt="" class="be-ava-comment">
				</a>
			</div>
			<div class="be-comment-content">

				<span class="be-comment-name">
					<a href="#"><?= $one_comment['username'] ?></a>
				</span>
				<span class="be-comment-time">
					<i class="fa fa-clock-o"></i>
					<?= $one_comment['createDate'] ?>
				</span>

				<p class="be-comment-text">
					<?= $one_comment['content'] ?>
				</p>
			</div>

			<?php
			if(isset($_SESSION['user'])){
				if($_SESSION['user']['id'] == $one_comment['user_id'] || $_SESSION['user']['role'] == 1){
			?>
            <div class="change-position">
		<form class="form-blockk" method="POST" id="formRemove">
		<span class="be-comment-rm">
			<button id="btnRemove" name="<?= $one_comment['id'] ?>" type="submit" class="btn btn-warning">X</button>
		</span>
		</form>
		</div>
		
			<?php 
			}
		}
			?>
		</div>

		<?php
			}
		?>

<?php if (isset($_SESSION['user'])){ ?>
		<form class="form-block" method="POST" id="formBlock">
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<textarea class="form-input" required="" name="comments" placeholder="Your text"></textarea>
					</div>
				</div>
				<!-- onclick="alert('<?php $message ?>') ? '' : location.reload(); " -->
				<button id="btnSubmit" name="submit" type="submit" class="btn btn-primary pull-right">Submit</button>
			</div>
		</form>
<?php }?>
	</div>
</div>

