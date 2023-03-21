<?php
require_once(USER_PATH . 'controllers/base_controller.php');
require_once(USER_PATH . 'models/Post.php');

class PostsController extends BaseController
{
  function __construct()
  {
    $this->folder = 'posts';
  }

  public function home()
  {
    $posts = Post::all();
    $blog_categories = Post::filter_blog_categories();
    
    $data = ['posts'=>$posts, 'blog_categories'=>$blog_categories];
    $this->render('blogs', $data, 'blog');
  }

  public function single()
  {
    $posts = Post::all();
    $blog_categories = Post::filter_blog_categories();
    $post = Post::filter_by_id($_GET['id']);
    $next_blog_id = Post::get_next_post($_GET['id']);
    $pre_blog_id = Post::get_previous_post($_GET['id']);
    $comment_num = Post::count_blog_comment($_GET['id']);
    $all_comments = Post::all_comments($_GET['id']);
    $all_comments2 = Post::all_comments2($_GET['id']);
    $all_users = Post::all_users();

    $data = ['posts'=>$posts, 'blog_categories'=>$blog_categories, 'post'=>$post, 'next_blog_id'=>$next_blog_id, 'pre_blog_id'=>$pre_blog_id, 'comment_num'=>$comment_num, 'all_comments'=>$all_comments, 'all_comments2'=>$all_comments2 ,'all_users'=>$all_users];
    $this->render('single', $data, 'blog');
  }
}
