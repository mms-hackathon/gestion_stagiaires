<?php 
    session_start(); ?>
    <?php if(!empty($_SESSION['email'])) : ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="./../css/dashboards.css"/>
    <title>Dashboard</title>
  </head>
  <body class="h-screen w-screen p-4 flex gap-3">
    <aside class="w-[20%] h-full flex flex-col gap-3">
      <div
        class="logo h-[20%] w-full rounded-lg bg-gray-100 flex justify-start items-center px-6 shadow-xl"
      >
        <img src="./../assest/logo-black.png" class="w-1/2" alt="" />
      </div>
      <nav class="w-full h-[80%] bg-gray-100 rounded-lg shadow-xl">
        <div class="w-full flex flex-col items-center">
          <br /><br />
          <div class="">
            <a
              href="#"
              class="text-[#747474] text-2xl bg-gray-200 px-12 py-4 rounded-lg hover:bg-gray-300"
              ><i class="fa-solid fa-house"></i> Profile</a
            >
          </div>
          <br />
          <br />
          <div class="">
            <a
              href="#"
              class="text-[#205A5A] text-2xl bg-[#D8EDED] px-12 py-4 rounded-lg hover:bg-[#A5D4D4]"
              ><i class="fa-solid fa-suitcase"></i
              > Offers</a
            >
          </div>
        </div>
      </nav>
    </aside>
    <main class="w-[80%] flex flex-col gap-3">
      <header
        class="w-full bg-gray-100 h-[10%] rounded-lg flex justify-between items-center px-10 shadow-xl"
      ></header>
      <article class="w-full h-[90%] px-48">
        <div
          class="bg-gray-100 w-full h-full rounded-lg shadow-xl flex flex-col gap-1 items-center justify-center">
          <!-- table offre -->
<div class="relative overflow-x-auto h-full w-full shadow-md sm:rounded-lg">
  <table class="w-full text-xl text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-l text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  title
              </th>
              <th scope="col" class="px-6 py-3">
                  date_creation
              </th>
              <th scope="col" class="px-6 py-3">
                  deadline
              </th>
              <th scope="col" class="px-6 py-3">
                  discription
              </th>
              <th scope="col" class="px-6 py-3">
                  Action
              </th>
          </tr>
      </thead>
      <tbody>
      <?php 
        require_once "db.php";
        
        class Stagiaire {
          public $id;
          public $nom;
          public $prenom;
          public $gender;
          public $branche;
          public $annee;
          public $adresse;
          public $tel;
          public $email;
          public $portfolio;
          public $status;
          public $currentOffre;
          public $offres;
    
          public function __construct($id, $nom,$prenom, $gender, $branche, $annee, $adresse, $tel, $email,$portfolio = '',$status = '', $currentOffre = 0, $offres = []) {
              $this->id = $id;
              $this->nom = $nom;
              $this->prenom = $prenom;
              $this->gender = $gender;
              $this->branche = $branche;
              $this->annee = $annee;
              $this->adresse = $adresse;
              $this->tel = $tel;
              $this -> email = $email;
              $this -> portfolio = $portfolio;
              $this -> status = $status;
              $this-> currentOffre = $currentOffre;
              $this -> offres = $offres;
          }
        }

        $email = $_SESSION['email'];
        $query = "SELECT * FROM Stagiaire WHERE email = :email";
      $statement = $pdo->prepare($query);
      $statement->execute([
          ':email' => $email,
      ]);
      $stagiaireInfo = $statement->fetch(PDO::FETCH_ASSOC);

      if ($stagiaireInfo !== false) {
        $stagiaire = new Stagiaire($stagiaireInfo['id_stagiaire'],$stagiaireInfo['nom'],$stagiaireInfo['prenom'],$stagiaireInfo['gender'],$stagiaireInfo['branche'],$stagiaireInfo['annee'],$stagiaireInfo['adresse'],$stagiaireInfo['tel'],$stagiaireInfo['email'],$stagiaireInfo['portfolio']);
        $stOffres = "SELECT * FROM Application NATURAL JOIN Offre NATURAL JOIN Entreprise WHERE id_stagiaire = :id";
        $statementStOffres = $pdo -> prepare($stOffres);
        $statementStOffres -> execute([
          ':id' => $stagiaire -> id
        ]);
        $OffreIntern = $statementStOffres -> fetchAll(PDO::FETCH_ASSOC);
        if (count($OffreIntern) > 0){
          $stagiaire -> offres = $OffreIntern;
          foreach ($OffreIntern as $index => $offre) {
            if ($offre['status'] === "accepted"){
              $stagiaire -> currentOffre = $offre['id_offre'];
              $stagiaire -> status = 'Interning';
            }else{
              $stagiaire -> status = 'Searshing';
            }
          }
        }else{
          $stagiaire -> status = 'Searshing';
        }}

        $queryAp = "SELECT * FROM Offre where id_offre not in (select id_offre from Application where id_stagiaire = :id )";
        $statementAp= $pdo->prepare($queryAp);
        $statementAp -> execute([
          ':id' => $stagiaire -> id
        ]);

        $resultAp = $statementAp->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultAp as $row) {
            echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>";
            echo "<th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>{$row["title"]}</th>";
            echo "<td class='px-6 py-4'>{$row["date_creation"]}</td>";
            echo "<td class='px-6 py-4'>{$row["application_deadline"]}</td>";
            echo "<td class='px-6 py-4'>{$row["description"]}</td>";
            echo "<td class='px-6 py-4'><a href='#' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>Applique</a></td></tr>";
        }
              
        ?>

      </tbody>
     </table>
  
      </div>       
      </div>
      </article>
    </main>
  </body>
</html>



<?php else : ?>
    <?php header('location:loginPage.php') ?>
<?php endif; ?>