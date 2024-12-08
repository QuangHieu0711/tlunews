<?php
require_once 'C:\laragon\www\CngheWEB\tlunews1\models\News.php';

class HomeController {
    public function index() {
        $news = News::getAll();
        include 'C:\laragon\www\CngheWEB\tlunews1\views\home\index.php';
    }

    public function detail() {
        $id = $_GET['id'] ?? 0;
        $news = News::getById($id);
        include 'C:\laragon\www\CngheWEB\tlunews1\views\news\detail.php';
    }
}
