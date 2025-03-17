<?php

require_once('class/Donnee.php');

class Serpent extends Donnee{
    // déclaration des variables
    protected $id;
    protected $nom;
    protected $poids;
    protected $dureeDeVie;
    protected $dateHeureNaissance;
    protected $race;
    protected $genre;

    /**
     * @param [$nom, $poids, $dureeDeVie, $dateHeureNaissance, $race, $genre] 
     */
     function __construct($resultat){
        Parent::__construct();
        $compteur = 0;

        foreach(array_keys(get_class_vars(get_class($this))) as $var){
            if($var != "id"){
                $this->$var = $resultat[$compteur];
                $compteur++;
            } 
        }
     }

    // getters
    public function getId() {return $this->id;}
    public function getNom() {return $this->nom;}
    public function getPoids() {return $this->poids;}
    public function getDureeDeVie() {return $this->dureeDeVie;}
    public function getDateHeureNaissance() {return $this->dateHeureNaissance;}
    public function getRace() {return $this->race;}
    public function getGenre() {return $this->genre;}

    // setters
    public function setId($id){$this->id = $id;}
    public function setNom($nom){$this->nom = $nom;}
    public function setPoids($poids){$this->poids = $poids;}
    public function setDureeDeVie($dureeDeVie){$this->dureeDeVie = $dureeDeVie;}
    public function setDateHeureNaissance($dateHeureNaissance){$this->dateHeureNaissance = $dateHeureNaissance;}
    public function setRace($race){$this->race = $race;}
    public function setGenre($genre){$this->genre = $genre;}

    // public function add1(){

    //     $sql = "INSERT INTO serpent (
    //         nom, 
    //         poids, 
    //         dureeDeVie, 
    //         dateHeureNaissance,
    //         race, 
    //         genre
    //         )
    //     VALUES (
    //         :nom, 
    //         :poids, 
    //         :dureeDeVie, 
    //         :dateHeureNaissance,
    //         :race, 
    //         :genre 
    //     )";

    //     $user = "root";
    //     $pass = "";
    //     $dbh = new PDO('mysql:host=localhost;dbname=vivarium', $user, $pass);
        
    //     $sth = $dbh->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    //     $sth->execute([
    //         'nom' => $this->nom,
    //         'poids' => $this->poids,
    //         'dureeDeVie' => $this->dureeDeVie,
    //         'dateHeureNaissance' => $this->dateHeureNaissance,
    //         'race' => $this->race,
    //         'genre' => $this->genre
    //     ]);
    //     $this->setId($dbh->lastInsertId());
    //     $red = $sth->fetchAll();

    // }

    // public function update1(){

    //     $sql = "UPDATE serpent SET
    //         nom = :nom,
    //         poids = :poids,
    //         dureeDeVie = :dureeDeVie,
    //         dateHeureNaissance = :dateHeureNaissance,
    //         race = :race,
    //         genre = :genre
    //         WHERE id = :id";

    //     $user = "root";
    //     $pass = "";
    //     $dbh = new PDO('mysql:host=localhost;dbname=vivarium', $user, $pass);
        
    //     $sth = $dbh->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    //     $sth->execute([
    //         'nom' => $this->nom,
    //         'poids' => $this->poids,
    //         'dureeDeVie' => $this->dureeDeVie,
    //         'dateHeureNaissance' => $this->dateHeureNaissance,
    //         'race' => $this->race,
    //         'genre' => $this->genre,
    //         'id'=> $this->id
    //     ]);

    //     $red = $sth->fetchAll();  
    // }

    // public static function read1(int $id){
    //     $sql = "SELECT * FROM serpent
    //     WHERE id = :id";

        

    //     $sth = PdoFactory::getDbh()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    //     $sth->execute([
    //         'id' => $id
    //     ]);
    //     $red = $sth->fetchAll();
    //     var_dump($red);

    //     $serpent = new Serpent($red[0]['nom'], $red[0]['poids'], $red[0]['dureeDeVie'], $red[0]['dateHeureNaissance'], $red[0]['race'], $red[0]['genre']);
    //     $serpent->setId($red[0]['id']);

    //     return $serpent;
        
    // }

    // public function delete1(){
    //     $sql = "DELETE FROM serpent
    //     WHERE id = :id";

    //     $user = "root";
    //     $pass = "";
    //     $dbh = new PDO('mysql:host=localhost;dbname=vivarium', $user, $pass);

    //     $sth = $dbh->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    //     $sth->execute([
    //         'id' => $this->id
    //     ]);
    //     $red = $sth->fetchAll();

    // }

    // public function liste($tri, )
}
?>