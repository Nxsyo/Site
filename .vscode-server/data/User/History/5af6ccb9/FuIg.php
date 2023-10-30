<?php

namespace Controllers ;

class IndexController extends Controller
{
    public function index()
    {
        //savoir si un utilisateur existe deja 
    $connectUser="Sofyan";
    $UserAge="19";
    $UserVille="Nogent-sur-Oise";
    echo $this->twig->render('index.html', ['connectUser'=>$connectUser]);
    }

}
?>