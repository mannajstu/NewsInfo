<?php
session_start();
$message = '';

require_once './blog.php';
$blog = new blog();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $message = $news->delete_news_info($id);
}

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

$query_result = $news->select_all_blog_info();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>View News</title>
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
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center text-success"><?php echo $message; ?></h3>
                    <hr/>
                    <div class="well">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>News SL NO</th>
                                <th>News Title</th>
                                <th>Author Name</th>
                                <th>News Short Des.</th>
                                <th>News Long Des.</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $i = 1;
                            while ($news_info = mysqli_fetch_assoc($query_result)) {
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td ><?php echo $news_info['news_title']; ?></td>
                                    <td><?php echo $news_info['author_name']; ?></td>
                                    <td><?php echo $news_info['news_short_des']; ?></td>
                                    <td><?php echo $news_info['news_long_des']; ?></td>

                                    <td>
                                        <a href="edit_news.php?id=<?php echo $news_info['news_id']; ?>" class="btn btn-success" title="Edit">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="?delete=<?php echo $news_info['news_id']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure to delete this News !');">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>