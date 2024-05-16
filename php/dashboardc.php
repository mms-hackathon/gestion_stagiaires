<?php 
  session_start();?>
  <?php  if(!empty($_SESSION['email'])):?>
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
    <link rel="stylesheet" href="./../css/dashboardc.css" />
    <title>Dashboard</title>
  </head>
  <?php
    require_once 'db.php';

    $email = $_SESSION['email'];
    $userType = $_SESSION['userType'];
    
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

    $query = "SELECT * FROM Entreprise WHERE email = :email";

        $statement = $pdo->prepare($query);
  
        $statement->execute([
            ':email' => $email
        ]);
  
        $companyInfo = $statement->fetch(PDO::FETCH_ASSOC);

        

        if ($companyInfo !== false) {
          $company = new Organisation($companyInfo['id_entreprise'],$companyInfo['nom'],$companyInfo['adresse'],$companyInfo['fixe'],$companyInfo['email']);
        }




    ?>
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
              href="dashboard.php"
              class="text-[#747474] text-2xl bg-gray-200 px-12 py-4 rounded-lg hover:bg-[#A5D4D4]"
              ><i class="fa-solid fa-house"></i> Profile</a
            >
          </div>
          <br />
          <br />
          <div class="">
            <a
              href="#"
              class="text-[#205A5A] text-2xl bg-[#D8EDED] px-12 py-4 rounded-lg hover:bg-gray-300"
              ><i class="fa-solid fa-briefcase"></i>Offres</a
            >
          </div>
        </div>
      </nav>
    </aside>
    <main class="w-[80%] flex flex-col gap-3">
      <header
        class="w-full bg-gray-100 h-[10%] rounded-lg flex justify-between items-center px-10 shadow-xl"
      >
      <span class="text-2xl font-bold flex text-[#17305E] items-center gap-4"><i class="fa-solid fa-circle text-[#205A5A]"></i><?= $company->nom; ?></span>
        <span></span></header>
      <article class="w-full h-[90%] px-48">
      <?php if(isset($_GET["id_offre"])) : ?>
        <h1 class="text-3xl text-[#17305E] text-start font-extrabold w-full">Applications</h1>
        <?php     
        $queryAp = "SELECT *
        FROM Application natural join Stagiaire where id_offre = :id_oa ";
        $statementAp= $pdo->prepare($queryAp);
        $statementAp -> execute([
          ':id_oa' => $_GET['id_offre']
        ]);
        $resultAp = $statementAp->fetchAll(PDO::FETCH_ASSOC);
        
          
        
          
          if(count($resultAp) != 0){

          foreach ($resultAp as $value) {

           
          $str = <<< EOT
          <div class="h-[30%] w-[95%] p-2 flex justify-center flex-col items-center text-[#17305E] gap-4">
          
      
          
          <div class="h-[90%] border-4 p-2 hover:cursor-pointer border-[#17305E] w-full flex flex-col justify-center items-start  rounded-md ">
              
                   <h1 class='text-3xl px-10 font-extrabold  ' onclick='showApplication(event)' id='ap-{$value['id_application']}'> {$value["nom"]}</h1>
                    <pre>    <a class=' underline text-sm    rounded-full  px-3 py-2 stat' href='{$value["portfolio"]}'>Potfolio</a></pre> 
                    <button type='button'  onclick='Accept(event)' class='bg-[#22C7C5]  ms-[39px] py-[10px] px-[20px]  hover:border-2 hover:border-blue-400 text-white font-bold text-xs  rounded-xl cursor-pointer hover:bg-gray-200 hover:text-[#22C7C5]' id='s-{$value["id_stagiaire"]}-{$value["id_application"]}'>Accept</button>
                   
                
          </div>
         
            </div>
                              
          EOT;
          echo $str;
          
         
          if (isset($_GET['id_st'])){
            $queryup = "UPDATE Application SET status= 'accepted' WHERE id_stagiaire  = :ids AND id_application = :idapp ";
            $statementup= $pdo->prepare($queryup);
            $statementup -> execute([
              ':ids' => $_GET['id_st'] ,
              ':idapp' => $_GET['id_app'] 
            ]);


           header("Location: dashboardc.php", true); exit(); 
          }
          
        }; 
       }else{
            echo "<h1 class='text-2xl mt-6 text-orange-400'>No Applications Right Now</h1>";
          }; ?>

        
        
     
      <?php elseif(isset($_GET["create"])) : ?>
        <form action="./dashboardc.php?create=true" method="POST">
        <input
        class="outline-none my-[15px] border-b-2 w-[50%] h-[50px] ps-3 bg-gray-100"
        type="text"
        name="title"
        id="title"
        placeholder="Title"
      />
      <br>
        <input
        class="outline-none my-[15px] border-b-2 w-[50%] h-[50px] ps-3 bg-gray-100"
        type="date"
        name="deadline"
        id="deadline"
        placeholder="Application Deadline"
      />
      <br>
        <textarea
        class="outline-none my-[15px] border-b-2 w-[50%] h-[50px] ps-3 bg-gray-100"
        type="date"
        name="description"
        id="description"
        placeholder="Description" cols="30"
      ></textarea>
      <br>
      <input
        type="submit"
        value="Submit" 
        class="bg-[#22C7C5] hover:border-2 hover:border-blue-400 text-white font-bold text-2xl py-3 px-16 rounded-xl cursor-pointer hover:bg-gray-200 hover:text-[#22C7C5]"
      />
      </form>

      <?php 
        if(isset($_POST['title'])){

          $queryI = "INSERT INTO Offre (title, date_creation, application_deadline, description, id_entreprise) VALUES (:title, :date_creation, :application_deadline, :description, :id_entreprise)";
          $statementI = $pdo->prepare($queryI);
          $statementI->execute([
          ':title' => $_POST['title'],
          ':date_creation' => date("Y-m-d"),
          ':application_deadline' => $_POST['deadline'],
          ':description' => $_POST['description'],
          ':id_entreprise' => $company->id
]);



          
          header("Location: dashboardc.php", true); exit(); 
        }
      ?>



      
      <?php else : ?>
        <h1 class="text-3xl text-[#17305E] text-start font-extrabold w-full">My Offers</h1>
        <button type='button'  onclick='Create(event)' class='bg-[#22C7C5] mt-6 py-[10px]  w-fit px-270px]  hover:border-blue-400 text-white font-bold text-[12px] px-16 rounded-xl cursor-pointer hover:bg-gray-200 hover:text-[#22C7C5]' >Add</button>

        <?php     
        $queryO = "SELECT Offre.*
        FROM Offre where id_entreprise = :id_e ";
        $statementO = $pdo->prepare($queryO);
        $statementO -> execute([
          ':id_e' => $company -> id
        ]);
        $resultO = $statementO->fetchAll(PDO::FETCH_ASSOC);
        
          if(count($resultO) != 0){
        
          
          foreach ($resultO as $value) {

            if(count($resultO) != 0){

              $queryS = "SELECT * from Application where id_offre = :id_o AND status = 'accepted'";
            $statementS = $pdo->prepare($queryS);
            $statementS -> execute([
              ':id_o' => $value["id_offre"]
            ]);
            $resultS = $statementS->fetch(PDO::FETCH_ASSOC);
    
            $stat = 'empty';
            $action = "onclick='showApplication(event)' ";
            $link= "underline"; 
            $cursor = "hover:cursor-pointer";
            
            
            if($resultS != NULL){
              $stat = 'ongoing';
              $action = "";
              $link= ""; 
              $cursor = "";
            }

            if($value['application_deadline'] <= date("Y-m-d")){
              $stat = 'expired';
              $action = "";
              $link= ""; 
              $cursor = "";
            }

          $str = <<< EOT
          <div class="h-[30%] w-[95%] p-2 flex justify-center flex-col items-center text-[#17305E] gap-4">
          
      
          
          <div class="h-[90%] border-4 p-2 $cursor border-[#17305E] w-full flex flex-col justify-center items-start  rounded-md ">
              
                   <h1 class='text-3xl px-10 mb-[15px] font-extrabold $link ' $action  id='o-{$value['id_offre']}'> {$value["title"]}</h1>
                    <pre>    <span class=' text-sm text-[#878A11]   rounded-full bg-[#EFF0AC] px-3 py-2 stat'>$stat</span></pre> <br/>
                   <pre>     <span class='font-light  text-xs'>Created {$value['date_creation']}</span></pre>
                
          </div>
         
            </div>
                              
          EOT;
          echo $str;
          }
          
        }}else{
          echo "<h1 class='text-2xl mt-6 text-orange-400'>No Offers Right Now</h1>";
        }; ?>
        <?php endif; ?>
      </article>
    </main>
    <script>
      [...document.getElementsByClassName("stat")].forEach((item)=>{
        if(item.innerText.toLowerCase() == "ongoing"){
          item.style.backgroundColor = "#83D0D0";
          item.style.color = "#133535";
        }
        else if(item.innerText.toLowerCase() == "expired"){
          item.parentElement.parentElement.style.opacity = "0.5"
          item.style.backgroundColor = "#F8D9D9";
          item.style.color = "#BD4040";
        }
        
      })

      function showApplication(event){
        let offreId = event.currentTarget.id.split("-")[1];
        window.location.search += `?id_offre=${offreId}`

      }
      function Accept(event){
        let stagiaireId = event.currentTarget.id.split("-")[1];
        let AppId = event.currentTarget.id.split("-")[2];
        window.location.search += `&id_st=${stagiaireId}&id_app=${AppId}`

      }
      function Create(event){
        window.location.search += `?create=true`
      }
    </script>
  </body>
</html>
<?php else: ?>
  <?php header('location: loginPage.php') ?>
<?php endif; ?>