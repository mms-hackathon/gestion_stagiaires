<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../output.css">
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
    <aside class="backdrop-filter"  style="background-image: url(../assets/imageLoginPage2.jpg); height:100vh; width: 50% ; background-size:cover; background-position: center;">
    </aside>
    <main class="flex flex-col justify-center m-auto">
      <p class="font-bold text-2xl mb-16 text-center">Login</p>
        <form class="w-full max-w-sm" id="inputForm" >
            <div class="md:flex md:items-center mb-6">
              <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                  Full Name
                </label>
              </div>
              <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-500" id="inline-full-name" type="text">
              </div>
            </div>
            <div class="md:flex md:items-center mb-6">
              <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                  Password
                </label>
              </div>
              <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-500" id="inline-password" type="password" placeholder="***********">
              </div>
            </div>
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                  User Type
                </label>
              </div>
              <div class="m-5" id="containerUserType">
                <button value="intern" class="shadow bg-gray-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                    Itern
                  </button>
                  <button value="establishment" class="shadow bg-gray-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                    Establishment
                  </button>
                  <button value="company" class="shadow bg-gray-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                    Company
                  </button>
            </div>
            <div class="md:flex md:items-center">
              <div class="md:w-1/3"></div>
              <div class="md:w-2/3">
               <input type="submit" id="submit" class="shadow bg-[#47c6c6]  focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 w-24 rounded">
              </div>
            </div>
          </form>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
      // userType part
        let t = document.getElementById("containerUserType")
        t.addEventListener("click",(event)=>{
           let c = event.target
           c.parentElement.querySelectorAll("button").forEach((element)=>{
            element.classList.replace("bg-[#47c6c6]","bg-gray-500")
           })
           c.classList.replace("bg-gray-500","bg-[#47c6c6]")
           let UserTypeSelected = c.value
        })
        // testing send data to php
        $(document).ready(function(){
          $("#submit").click(function(){
            $.post("servers.php",
              {name:"sidqui",
              prenom:"ziko"
            },
            function(data,status){
              alert("data : " + data)
            }
            )
          })
        })
      
    </script>
</body>
</html>