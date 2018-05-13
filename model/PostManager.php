<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 10/05/2018
 * Time: 15:49
 */

class PostManager extends Manager
{

    private $_nb_post_page = 5;

    public function getPosts($start) {

        $bdd = $this->dbConnect();
        $requete = $bdd->query('SELECT id, titre, contenu, 
DATE_FORMAT(date_creation, "%d/%c/%Y à %Hh%imin%Ss") as date_fr, 
DATE_FORMAT(date_creation, "%c/%d/%Y at %Hh%imin%Ss") as date_en 
FROM billets ORDER BY date_creation DESC LIMIT '.$start.','.$this->_nb_post_page);
        return $requete;
    }


    public function getPostsCount() {
        $bdd = $this->dbConnect();
        $requete = $bdd->query('SELECT count(*) FROM billets');
        $result = $requete->fetch();
        return $result[0];
    }


    public function getPost($postId) {

        $bdd = $this->dbConnect();
        $requete = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%c/%Y à %Hh%imin%Ss") as date_fr, DATE_FORMAT(date_creation, "%c/%d/%Y at %Hh%imin%Ss") as date_en FROM billets WHERE id = ?');
        $requete->execute(array($postId));
        $donnee = $requete->fetch();
        return $donnee;

    }


}