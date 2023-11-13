<?php
namespace Controllers ;

use PDO;
use User;

class UserController extends Controller

{
    public function edit($params) {
        
        $id=($params['get']['id']);
        $em=$params['em'];
        $user=$em->find('User',$id);
        echo $this->twig->render('edit.html' , ['user' => $user]);

    }

    public function update($params) {

        $em = $params['em'];
        $id =($params['post']['id']);
    
        $user = $em->find('User', $id);
    
        $user->setNom($params['post']['nom']);
        $user->setPrenom($params['post']['prenom']);
    
        
            $em->flush();
        
            header('Location: start.php?c=user&t=display');
            exit();
       
    }

    public function delete($params) {
        
        $id=($params['get']['id']);
        $em=$params['em'];
        $user=$em->find('User',$id);

        $em->remove($user);
        $em->flush();

        header('Location: start.php?c=user&t=display');
    }
    
    
    

    public function display($params) {
        $username = 'sofyan';
        $password = 'plop';
        $dbname = 'BTS_Sofyan';
        $dsn = 'mysql:host=localhost;dbname=BTS_Sofyan;charset=utf8';
    
        $sql = 'SELECT * FROM users';
        try {
            $pdo = new \PDO($dsn, $username, $password);
            $stmt = $pdo->query($sql);
    
            if ($stmt === false) {
                die('Erreur');
            }
    
            $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            echo $this->twig->render('index.html', ['users' => $users , "params" => $params]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    public function one($params)
    {
        $entityManager=$params["em"];
        $connectUser="Un seul";

        $user = new User();

        $user->setNom("TEST");
        $user->setPrenom("TEST");
        $entityManager->persist($user);
        $entityManager->flush();

        echo $this->twig->render('index.html' , ['connectUser'=> $connectUser,"params"=>$params]);
    }
    

    public function index()
    {   
        $prenomUser="Sofyan";
        $userAge="19";
        $userVille="Nogent-sur-Oise";
        echo $this->twig->render('userinfo.html',['prenomUser'=>$prenomUser , 'userAge'=>$userAge , 'userVille'=>$userVille]);
    }

    public function liste($url) {
        var_dump($url);
        $data="tous";
        echo $this->twig->render('userinfo.html',['data'=>$data]);
    }

    public function create() 
    {
        echo $this->twig->render('create.html');
    }

    
    public function insert($params) {

        $em = $params['em'];

        $nom =($_POST['nom']);
        $prenom =($_POST['prenom']);

        $newUser = new User();
        $newUser->setNom($nom);
        $newUser->setPrenom($prenom);

        $em->persist($newUser);
        $em->flush();

        header('Location: start.php?c=user&t=display');
    }
  
}

?>