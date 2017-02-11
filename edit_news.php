<?php
session_start();
$news_id = $_GET['id'];
//echo $student_id;
require_once './news_info_master_class.php';
$news = new News();
$query_result = $news->select_news_info_by_id($news_id);
$news_info = mysqli_fetch_assoc($query_result);

if (isset($_POST['btn'])) {
    
    $message = $news->update_news_info($_POST);
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HOME</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Brand</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="add_news.php">Add News</a></li>
                        <li><a href="view_news.php">View Published News</a></li>
                        <li><a href="view_unpublish_news.php">View UnPublished News</a></li>
                    </ul>
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>
                    </form>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <hr/>
                    <div class="well">
                        <form class="form-horizontal" action="" method="post">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">News Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="news_title" value="<?php echo $news_info['news_title']; ?>" class="form-control">
                                    <input type="hidden" name="news_id" value="<?php echo $news_info['news_id']; ?>" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Author Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="author_name" value="<?php echo $news_info['author_name']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">News Short Des.</label>
                                <div class="col-sm-10">
                                    <input type="text" name="news_short_des" value="<?php echo $news_info['news_short_des']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">News Long Des.</label>
                                <div class="col-sm-10">
                                    <input type="text" name="news_long_des" value="<?php echo $news_info['news_long_des']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="news_status"  class="form-control">
                                        <option value="2">---------------</option>
                                        <option value="1" >Publish</option>
                                        <option value="0">Unpublish</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="btn" class="btn btn-success btn-block">Update News Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>










        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>