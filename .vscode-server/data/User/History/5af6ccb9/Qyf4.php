<?php

namespace Controllers ;

class IndexController extends Controller
{
    public function index()
    {
    $connectUser="Sofyan";
    echo $this->twig->render('index.html',['connectUser'=>$connectUser]);
    }

}
?>