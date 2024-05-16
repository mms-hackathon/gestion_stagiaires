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
    <link rel="stylesheet" href="./../css/dashboard.css" />
    <title>Dashboard</title>
  </head>
    
  <?php
    require_once 'db.php';

    $email = $_SESSION['email'];
    $userType = $_SESSION['userType'];

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

    class Organisation {
      public $id;
      public $nom;
      public $adresse;
      public $fixe;
      public $email;
      public function __construct($id,$nom,$adresse,$fixe,$email)
      {
        $this-> id = $id;
        $this-> nom = $nom;
        $this-> adresse = $adresse;
        $this-> fixe = $fixe;
        $this-> email = $email;
      }
    }

    if($userType == "Stagiaire"){
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
      } elseif ($userType == "Entreprise") {
        $query = "SELECT * FROM Entreprise WHERE email = :email";

        $statement = $pdo->prepare($query);
  
        $statement->execute([
            ':email' => $email,
        ]);
  
        $companyInfo = $statement->fetch(PDO::FETCH_ASSOC);

        if ($companyInfo !== false) {
          $company = new Organisation($companyInfo['id_entreprise'],$companyInfo['nom'],$companyInfo['adresse'],$companyInfo['fixe'],$companyInfo['email']);
        }
      }else{
        $query = "SELECT * FROM Etablissement WHERE email = :email";

        $statement = $pdo->prepare($query);
  
        $statement->execute([
            ':email' => $email,
        ]);
  
        $etablissementInfo = $statement->fetch(PDO::FETCH_ASSOC);

        if ($etablissementInfo !== false) {
          $etablissement = new Organisation($etablissementInfo['id_etablissement'],$etablissementInfo['nom'],$etablissementInfo['adresse'],$etablissementInfo['fixe'],$etablissementInfo['email']);
        
        }
      }
    ?>

  <body class="h-screen w-screen p-4 flex gap-3">
  <aside class="w-[20%] h-full flex flex-col gap-3">
  <div class="logo h-[20%] w-full rounded-lg bg-gray-100 flex justify-start items-center px-6 shadow-xl">
    <img src="./../assest/logo-black.png" class="w-1/2" alt="">
  </div>
  <nav class="w-full h-[80%] bg-gray-100 rounded-lg shadow-xl">
    <div class="w-full flex flex-col items-center">
      <br><br>
      <div class=""><a href="#" class=" text-[#205A5A] text-2xl bg-[#D8EDED] px-12 py-4 rounded-lg hover:bg-[#A5D4D4]"><i class="fa-solid fa-house"></i> Profile</a></div>
      <br>
      <br>
      <div class=""><a href="<?php
        if($userType == 'Stagiaire'){
          echo 'dashboards.php';
        }else if($userType == 'Entreprise'){
          echo 'dashboardc.php';
        }else{
          echo 'dashboardt.php';
        }
       ?>" class=" text-[#747474] text-2xl bg-gray-200 px-12 py-4 rounded-lg hover:bg-gray-300"><i class="fa-solid fa-suitcase"></i><?php echo ($userType === 'Stagiaire' || $userType === 'Entreprise') ? ' Offres' : ' Interns'; ?></a></div>
    </div>
  </nav>
</aside>
<main class="w-[80%] flex flex-col gap-3">
  <header class="w-full bg-gray-100 h-[10%] rounded-lg flex justify-between items-center px-10 shadow-xl">
    <span class="text-2xl font-bold flex text-[#17305E] items-center gap-4"><i class="fa-solid fa-circle text-[#205A5A]"></i> <?php echo ($userType == 'Entreprise') ? $company -> nom : (($userType == 'Etablissement') ? $etablissement -> nom : $stagiaire -> status); ?></span>
    <span></span>
  </header>
  <article class="w-full h-[90%] px-48">
    <div class="bg-gray-100 w-full h-full rounded-lg shadow-xl flex flex-col gap-1 items-center justify-center">
      <div class="h-[30%] w-[95%] border-b-2 flex flex-col items-center justify-center gap-5">
        <div class="bg-gray-200 p-7 rounded-tr-xl border-2 border-[#17305E]">
          <i class="fa-solid text-7xl fa-<?= $userType == "Stagiaire" ? "user":"building" ;?> text-[#17305E]"></i>
        </div>
        <h1 class="text-5xl font-extrabold text-[#17305E]"><?= $company -> nom ?? $etablissement -> nom ?? $stagiaire -> nom . " " . $stagiaire -> prenom ?></h1>
      </div>
      <div class="h-[30%] w-[95%] border-b-2 p-2 flex justify-center">
      <div class="h-full w-[50%] flex justify-center flex-col">
        <pre class="text-3xl text-[#17305E] font-bold">Maya ID : <span class="text-xl font-normal"><?= $company -> id ?? $etablissement -> id ?? $stagiaire -> id ?></span></pre>
        <pre class="text-3xl text-[#17305E] font-bold">E-mail  : <span class="text-xl font-normal"><?= $company -> email ?? $etablissement -> email ?? $stagiaire -> email ?></span></pre>
        <pre class="text-3xl text-[#17305E] font-bold">Adress  : <span class="text-xl font-normal"><?= $company -> adresse ?? $etablissement -> adresse ?? $stagiaire -> adresse ?></span></pre>
        <pre class="text-3xl text-[#17305E] font-bold"><?php echo ($userType == 'Entreprise' || $userType == 'Etablissement')?'Fixe ':'Phone' ?>   : <span class="text-xl font-normal"><?= $company -> fixe ?? $etablissement -> fixe ?? $stagiaire -> tel ?></span></pre>
      </div>
      <?php if($userType == "Stagiaire") : ?>
      <div class="h-full w-[50%] flex justify-center flex-col">
        <pre class="text-3xl text-[#17305E] font-bold">Branch     : <span class="text-xl font-normal"><?= $stagiaire -> branche ?></span></pre>
        <pre class="text-3xl text-[#17305E] font-bold">Portfolio  : <span class="text-xl font-normal"><?= $stagiaire -> portfolio ?></span></pre>
        <pre class="text-3xl text-[#17305E] font-bold">Year       : <span class="text-xl font-normal"><?= ($stagiaire -> annee) == 1?'First Year':'Second Year' ?></span></pre>
      </div>
      </div>
      <div class="h-[30%] w-[95%] p-2 flex justify-center flex-col items-center text-[#17305E] gap-4">
          
          <h1 class="text-3xl text-start font-extrabold w-full">Current Intership</h1>
          <?php if($stagiaire -> currentOffre !== 0) :?>
            <div class="h-[90%] border-4 p-2 border-[#17305E] w-full flex flex-col justify-center items-start overflow-auto rounded-md">
                <?php
                  foreach($stagiaire -> offres as $value){
                    if ($value['id_offre'] == $stagiaire -> currentOffre) {
                      echo "<h1 class='text-3xl px-10 font-extrabold'> {$value['title']}</h1>";
                      echo "<pre>    <span class=' text-xl'>{$value['nom']}</span></pre> <br/>";
                      echo "<pre>    <i class='fa-regular fa-clock'>   </i><span class='font-light'></span>{$value['date_debut']} | <span class='font-light'>{$value['date_fin']}</pre>";
                    }
                  };
                ?>
              <?php else : ?>
              <h1 class="text-3xl text-orange-400">No Intership Right Now</h1>
              <?php endif ?>
            </div>
            <?php elseif ($userType == 'Etablissement') : ?>
              </div>
              <div class="h-[30%] w-[95%] p-2 flex justify-center items-center gap-5">
                <?php
                  $queryCount = "SELECT COUNT(id_stagiaire) as count FROM Application where status = 'accepted'";
                  $statementC = $pdo->prepare($queryCount);
                  $statementC -> execute();
                  $resultC = $statementC->fetch(PDO::FETCH_ASSOC);
                  $countAcc = $resultC['count'];
                  $str = <<< EOT
                              <div class="border-4 border-[#205A5A] rounded-lg h-[90%] w-[50%] flex flex-col justify-center items-center gap-4 bg-[#D8EDED]">
                                  <i class="fa-solid fa-square-check text-[#205A5A] text-7xl"></i>
                                  <span class="text-3xl text-[#205A5A]">$countAcc Users in interships</span>
                              </div>
                          EOT;
                  echo $str;
                  $querySt = "SELECT count(id_stagiaire) as count FROM Stagiaire";
                  $statementSt = $pdo->prepare($querySt);
                  $statementSt->execute();
                  $resultSt = $statementSt->fetch(PDO::FETCH_ASSOC);
                  $countSt = $resultSt['count'];
                  $str = <<< EOT
                              <div class="border-4 border-[#17305E] rounded-lg h-[90%] w-[50%] flex flex-col justify-center items-center gap-4">
                                  <i class="fa-solid fa-user-check text-[#17305E] text-7xl"></i>
                                  <span class="text-3xl text-[#17305E]">$countSt Total Interns</span>
                              </div>
                          EOT;
                  echo $str;
                ?>
                </div>
              <?php else : ?>
              </div>
                <div class="h-[30%] w-[95%] p-2 flex justify-center items-center gap-5">
                <?php
                  $queryt = "SELECT COUNT(*) as count FROM Offre where id_entreprise = :id";
                  $statementt = $pdo->prepare($queryt);
                  $statementt->execute([
                    ':id' => $company -> id
                  ]);
                  $resultt = $statementt->fetch(PDO::FETCH_ASSOC);
                  $countt = $resultt['count'];
                  $str = <<< EOT
                              <div class="border-4 border-[#205A5A] rounded-lg h-[90%] w-[50%] flex flex-col justify-center items-center gap-4 bg-[#D8EDED]">
                                  <i class="fa-solid fa-square-check text-[#205A5A] text-7xl"></i>
                                  <span class="text-3xl text-[#205A5A]">$countt Total Offers</span>
                              </div>
                          EOT;
                  echo $str;
                  $queryr = "SELECT count(id_stagiaire) as count FROM Application NATURAL JOIN Offre where status = 'accepted' AND id_entreprise = :idd";
                  $statementr = $pdo->prepare($queryr);
                  $statementr->execute([
                    ':idd' => $company -> id,
                  ]);
                  $resultr = $statementr->fetch(PDO::FETCH_ASSOC);
                  $countr = $resultr['count'];
                  $str = <<< EOT
                              <div class="border-4 border-[#17305E] rounded-lg h-[90%] w-[50%] flex flex-col justify-center items-center gap-4">
                                  <i class="fa-solid fa-user-check text-[#17305E] text-7xl"></i>
                                  <span class="text-3xl text-[#17305E]">$countr Total Interns</span>
                              </div>
                          EOT;
                  echo $str;
                ?>
              <?php endif ?>
            </div>
      </div>
      </div>
    </article>
  </article>
  </main>
  </body>
</html>


<?php else : ?>
    <?php header('location:loginPage.php') ?>
<?php endif; ?>