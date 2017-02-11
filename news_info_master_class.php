<?php

class News {

    protected $connection;

    public function __construct() {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'db_tt_student_info';
        $this->connection = mysqli_connect($host_name, $user_name, $password, $db_name);
        if (!$this->connection) {
            die('Connection Fail' . mysqli_error($this->connection));
        }
    }

    public function save_news_info($data) {
//        echo '<pre>';
//        var_dump($data);
        if ($data['news_status'] == "1") {
            $sql = "INSERT INTO tbl_news (news_title, author_name, news_short_des, news_long_des ,news_status) "
                    . "VALUES ('$data[news_title]', '$data[author_name]', '$data[news_short_des]', "
                    . "'$data[news_long_des]','$data[news_status]')";
            if (mysqli_query($this->connection, $sql)) {
                $message = "News Successfully Publish";
                return $message;
            } else {
                die('Query problem' . mysqli_error($this->connection));
            }
        } elseif ($data['news_status'] == "0") {
            $sql = "INSERT INTO tbl_news (news_title, author_name, news_short_des, news_long_des ,news_status) "
                    . "VALUES ('$data[news_title]', '$data[author_name]', '$data[news_short_des]', "
                    . "'$data[news_long_des]','$data[news_status]')";
            if (mysqli_query($this->connection, $sql)) {
                $message = "News Successfully UnPublish";
                return $message;
            } else {
                die('Query problem' . mysqli_error($this->connection));
            }
        } else {
            return 'Please Select Any Status Option';
        }
    }

    public function select_all_unpublish_news_info() {
        $sql = "SELECT * FROM tbl_news WHERE news_status='0' ORDER BY news_id DESC";
        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }

    public function select_all_news_info() {
        $sql = "SELECT * FROM tbl_news WHERE news_status='1' ORDER BY news_id DESC";
        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }

    public function select_news_info_by_id($news_id) {
        $sql = "SELECT * FROM tbl_news WHERE news_id = '$news_id' ";
        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }

    public function update_news_info($data) {

        if ($data['news_status'] == "1") {
            $sql = "UPDATE tbl_news SET news_title = '$data[news_title]', author_name = "
                    . "'$data[author_name]', news_short_des = '$data[news_short_des]', "
                    . "news_long_des= '$data[news_long_des]',news_status='$data[news_status]' "
                    . "WHERE news_id= '$data[news_id]' ";

            if (mysqli_query($this->connection, $sql)) {
                session_start();
                $_SESSION['message'] = 'Update Publish News Info Successfully   ';
                header('Location: view_news.php');
            } else {
                die('Query problem' . mysqli_error($this->connection));
            }
        } elseif ($data['news_status'] == "0") {
            $sql = "UPDATE tbl_news SET news_title = '$data[news_title]', author_name = "
                    . "'$data[author_name]', news_short_des = '$data[news_short_des]', "
                    . "news_long_des= '$data[news_long_des]',news_status='$data[news_status]' "
                    . "WHERE news_id= '$data[news_id]' ";

            if (mysqli_query($this->connection, $sql)) {
                session_start();
                $_SESSION['message'] = 'Update UnPublish News Info Successfully  ';
                header('Location: view_unpublish_news.php');
            } else {
                die('Query problem' . mysqli_error($this->connection));
            }
        } else {
            return 'Please Select Any Status Option';
        }
    }

    public function delete_news_info($id) {
        $sql = "DELETE FROM tbl_news WHERE news_id = '$id' ";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'News info Delete successfully';
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }

}
