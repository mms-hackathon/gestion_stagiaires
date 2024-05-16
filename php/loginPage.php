<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/loginpage.css">
    <style>
        .button-group {
            display: flex;
            justify-content: center;
        }
    
        .button-group button {
            padding: 10px 20px;
            margin: 0 10px;
            border: 2px solid #aaa;
            border-radius: 5px;
            background-color: transparent;
            cursor: pointer;
            transition: all 0.3s ease;
        }
    
        .button-group button:hover {
            background-color: #eee;
        }
    
        .button-group button.active {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }
    </style>
    <title>Login</title>
</head>
<body class="flex text-[#263d68] font-body">
    <aside class="backdrop-filter"  style="background-image: url(./../assest/imageLoginPage2.jpg); height:100vh; width: 50% ; background-size:cover; background-position: center;">
    </aside>
    <main class="flex flex-col justify-center m-auto">
      <p class=" font-bold text-2xl mb-10 text-center">Login</p>
      <p id="errorConnecte" class="font-bold hidden text-red-600 text-M mb-10 text-center">Verify your email or your password</p>
        <form class="w-full max-w-sm" onsubmit="return verification()" id="inputForm" action="connexion.php" method="POST" >
            <div class="md:flex md:items-center mb-6">
              <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                  Email
                </label>
              </div>
              <div class="md:w-2/3">
                <input name="email"  class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-500" id="email" type="text">
              </div>
            </div>
            <div class="md:flex md:items-center mb-6">
              <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                  Password
                </label>
              </div>
              <div class="md:w-2/3">
                <input name="password" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-500" id="password" type="password" placeholder="***********">
              </div>
            </div>
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                  User Type
                </label>
              </div>
              <div class="m-5" id="containerUserType">
                <button value="Stagiaire" class="shadow bg-gray-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                    Itern
                  </button>
                  <button value="Etablissement" class="shadow bg-gray-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                    Establishment
                  </button>
                  <button value="Entreprise" class="shadow bg-gray-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                    Company
                  </button>
                  <input name="userType" type="hidden" id="userType" value="">
            </div>
            <span id="remplirChamps" class="hidden ml-14 mb-10 text-xl font-bold text-red-500">Remplire tout les champs</span>
            <span id="verifierAdress" class="hidden ml-14 mb-10 text-xl font-bold text-red-500">Verifier adresse email</span>
            <div class="md:flex md:items-center">
              <div class="md:w-1/3"></div>
              <div class="md:w-2/3">
               <input type="submit" id="submit" class="shadow bg-[#47c6c6]  focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 w-24 rounded">
              </div>
            </div>
          </form>
    </main>
    <script>
      // userType part
        let t = document.getElementById("containerUserType")
        t.addEventListener("click",(event)=>{
           let c = event.target
           c.parentElement.querySelectorAll("button").forEach((element)=>{
            element.classList.replace("bg-[#47c6c6]","bg-gray-500")
           })
           c.classList.replace("bg-gray-500","bg-[#47c6c6]")
           document.getElementById("userType").value = c.value
           console.log(document.getElementById("userType").value)
        })
        // verification pour form
        function verification(){
          if(document.getElementById("email").value == "" || document.getElementById("password").value == ""|| document.getElementById("userType").value == ""){
             document.getElementById("remplirChamps").classList.remove("hidden")
             return false;
          }
          else{
            document.getElementById("remplirChamps").classList.add("hidden")
            let emailPAttern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
            if(!emailPAttern.test(document.getElementById("email").value)){
              document.getElementById("verifierAdress").classList.remove("hidden")
              return false;
            }
            else{
              document.getElementById("verifierAdress").classList.add("hidden")
              return true;
            }
          }
        }
        function errorConnection(){
          document.getElementById("errorConnecte").classList.remove("hidden")
        }
        let nonConnected = new URLSearchParams(window.location.search)
        if(nonConnected.get('login')=='false'){
          errorConnection()
        }
         </script>
</body>
</html>