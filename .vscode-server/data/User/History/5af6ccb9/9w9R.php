<?php

namespace Controllers ;

class IndexController extends Controller
{
    public function index()
    {
    $connectUser="Sofyan";
    echo $this->twig->render('index.html',['connectUser'=>$connectUser]);
    }

    public function liste($url) {
        var_dump($url);
        $data="Test";
        echo $this->twig->render('userinfo.html',['data'=>$data]);
    }

}
?>