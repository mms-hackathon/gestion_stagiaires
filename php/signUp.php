<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./../css/signUp.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" defer></script>
    <title>Sign In</title>
  </head>
  <body class="h-screen w-screen flex gap-0">


    
    
  <?php if(isset($_GET['type'])) : ?>
      <?php if($_GET['type'] == 'intern') : ?>
        <aside class="w-[20%] bg-[#10305C] h-[100%] flex flex-col justify-around">
      <div class="w-[60%] h-[20%] flex justify-center items-center">
        <a class="w-[80%]" href="./../html/index.html"
          ><img
            src="./../assest/maya-high-resolution-logo-white-transparent.png"
            alt="LOGO"
        /></a>
      </div>
      <div
        class="w-[100%] h-[70%] flex flex-col justify-start items-center gap-0"
      >
        <div class="flex items-center gap-3 w-[90%]">
          <span
            class="w-[30px] h-[30px] border-2 bg-white inline-block rounded-full" id="c-1"
          ></span>
          <span class="font-bold text-white text-2xl signinSwitch">Types</span>
        </div>
        <div class="flex items-center gap-3 w-[90%]">
          <span class="w-[30px] h-[30px] flex justify-center">
            <span class="inline-block h-[100%] w-0 border-2"></span>
          </span>
          <span class="font-bold text-transparent text-2xl">------</span>
        </div>
        <div class="flex items-center gap-3 w-[90%]">
          <span class="w-[30px] h-[30px] flex justify-center">
            <span class="inline-block h-[100%] w-0 border-2"></span>
          </span>
          <span class="font-bold text-transparent text-2xl">------</span>
        </div>
        <div class="flex items-center gap-3 w-[90%]">
          <span
            class="w-[30px] h-[30px] border-2 bg-white inline-block rounded-full" id="c-2"
          ></span>
          <span class="font-bold text-white text-2xl signinSwitch"
            >Personal Info</span
          >
        </div>
        <div class="flex items-center gap-3 w-[90%]">
          <span class="w-[30px] h-[30px] flex justify-center">
            <span class="inline-block h-[100%] w-0 border-2"></span>
          </span>
          <span class="font-bold text-transparent text-2xl">------</span>
        </div>
        <div class="flex items-center gap-3 w-[90%]">
          <span class="w-[30px] h-[30px] flex justify-center">
            <span class="inline-block h-[100%] w-0 border-2"></span>
          </span>
          <span class="font-bold text-transparent text-2xl">------</span>
        </div>
        <div class="flex items-center gap-3 w-[90%]">
          <span
            class="w-[30px] h-[30px] border-2 inline-block rounded-full" id="c-3"
          ></span>
          <span class="font-bold text-white text-2xl signinSwitch"
            >Academic & Qualifications</span
          >
        </div>
        
      </div>
      </aside>
      <main class="w-[80%] flex flex-col gap-5 justify-center items-center">
      <form
      action=""
      method=""
      class="w-[80%] flex flex-col gap-5 justify-center items-center "
    >
      <h1 class="text-5xl font-bold text-[#10305C]">Personal Info</h1>
      <input
        class="outline-none border-b-2 w-[50%] h-[50px] ps-3 bg-gray-100"
        type="text"
        name="name"
        id="name"
        placeholder="Full-Name"
      />
      <input
        class="outline-none border-b-2 w-[50%] h-[50px] ps-3 bg-gray-100"
        type="text"
        name="email"
        id="email"
        placeholder="E-mail"
      />
      <input
        class="outline-none border-b-2 w-[50%] h-[50px] ps-3 bg-gray-100"
        type="number"
        name="age"
        id="age"
        max="80"
        min="16"
        placeholder="Age"
      />
      <select
        name="gender"
        id="gender"
        class="outline-none border-b-2 w-[50%] h-[50px] px-6 bg-gray-100"
      >
        <option value="">Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
      <input
        class="outline-none border-b-2 w-[50%] h-[50px] ps-3 bg-gray-100"
        type="text"
        name="adress"
        id="adress"
        placeholder="Adress"
      />
      <input
        class="outline-none border-b-2 w-[50%] h-[50px] ps-3 bg-gray-100"
        type="text"
        name="tel"
        id="tel"
        placeholder="Phone-Number"
      />
      <input
        class="outline-none border-b-2 w-[50%] h-[50px] ps-3 bg-gray-100"
        type="password"
        name="password"
        id="password"
        placeholder="Password"
      />
      <input
        type="button"
        value="Submit" 
        class="bg-[#22C7C5] hover:border-2 hover:border-blue-400 text-white font-bold text-2xl py-3 px-16 rounded-xl cursor-pointer hover:bg-gray-200 hover:text-[#22C7C5]"
      />
    </form>
      </main>

      <?php elseif($_GET['type'] == 'company') : ?>

      
          <aside class="w-[20%] bg-[#10305C] h-[100%] flex flex-col justify-around">
      <div class="w-[60%] h-[20%] flex justify-center items-center">
        <a class="w-[80%]" href="./../html/index.html"
          ><img
            src="./../assest/maya-high-resolution-logo-white-transparent.png"
            alt="LOGO"
        /></a>
      </div>
      <div
        class="w-[100%] h-[70%] flex flex-col justify-start items-center gap-0"
      >
        <div class="flex items-center gap-3 w-[90%]">
          <span
            class="w-[30px] h-[30px] border-2 bg-white inline-block rounded-full"
          ></span>
          <span class="font-bold text-white text-2xl signinSwitch">Types</span>
        </div>
        <div class="flex items-center gap-3 w-[90%]">
          <span class="w-[30px] h-[30px] flex justify-center">
            <span class="inline-block h-[100%] w-0 border-2"></span>
          </span>
          <span class="font-bold text-transparent text-2xl">------</span>
        </div>
        <div class="flex items-center gap-3 w-[90%]">
          <span class="w-[30px] h-[30px] flex justify-center">
            <span class="inline-block h-[100%] w-0 border-2"></span>
          </span>
          <span class="font-bold text-transparent text-2xl">------</span>
        </div>
        <div class="flex items-center gap-3 w-[90%]">
          <span
            class="w-[30px] h-[30px] border-2 bg-white inline-block rounded-full"
          ></span>
          <span class="font-bold text-white text-2xl signinSwitch"
            >Company Info</span
          >
        </div>
      </aside>
      <main class="w-[80%] flex flex-col gap-5 justify-center items-center">
      <form
      action=""
      method=""
      class="w-[80%] flex flex-col gap-5 justify-center items-center "
    >
      <h1 class="text-5xl font-bold text-[#10305C]">Company Info</h1>
      <input
        class="outline-none border-b-2 w-[50%] h-[50px] ps-3 bg-gray-100"
        type="text"
        name="name"
        id="namec"
        placeholder="Name"
      />
      <input
        class="outline-none border-b-2 w-[50%] h-[50px] ps-3 bg-gray-100"
        type="text"
        name="email"
        id="emailc"
        placeholder="E-mail"
      />
      <input
        class="outline-none border-b-2 w-[50%] h-[50px] ps-3 bg-gray-100"
        type="text"
        name="adress"
        id="adressc"
        placeholder="Adress"
      />
      <input
        class="outline-none border-b-2 w-[50%] h-[50px] ps-3 bg-gray-100"
        type="text"
        name="tel"
        id="telc"
        placeholder="Fixe"
      />
      <input
        class="outline-none border-b-2 w-[50%] h-[50px] ps-3 bg-gray-100"
        type="password"
        name="password"
        id="passwordc"
        placeholder="Password"
      />
      <input
        type="button"
        value="Submit" onclick="sendData(event)"
        class="bg-[#22C7C5] hover:border-2 hover:border-blue-400 text-white font-bold text-2xl py-3 px-16 rounded-xl cursor-pointer hover:bg-gray-200 hover:text-[#22C7C5]"
      />
    </form>
      </main>


      
       

      <?php endif; ?>
      
      <?php endif; ?>


      


      
    
 
    
    
      
    <script>

      let obj = {};

      if(window.location.href.split("?")[0] == window.location.href){
        let html = `<aside class="w-[20%] bg-[#10305C] h-[100%] flex flex-col justify-around">
      <div class="w-[60%] h-[20%] flex justify-center items-center">
        <a class="w-[80%]" href="./../html/index.html"
          ><img
            src="./../assest/maya-high-resolution-logo-white-transparent.png"
            alt="LOGO"
        /></a>
      </div>
      <div
        class="w-[100%] h-[70%] flex flex-col justify-start items-center gap-0"
      >
        <div class="flex items-center gap-3 w-[90%]">
          <span
            class="w-[30px] h-[30px] border-2 bg-white inline-block rounded-full"
          ></span>
          <span class="font-bold text-white text-2xl signinSwitch">Types</span>
        </div>
       
        
      </div>
      </aside>

      <main class="w-[80%] flex flex-col gap-5 justify-center items-center">
      <h1 class="text-5xl font-extrabold text-[#10305C]">
        Choose Your User Type
      </h1>
      <p class="text-2xl text-[#10305C]" id="textChoose">
        Please choose your user type below before procceedding
      </p>
      <div class="flex gap-3 w-[70%] justify-center">
        <div
          class="flex w-[20%] flex-col gap-2 justify-center items-center bg-[#F0E1E1] p-6 rounded-md cursor-pointer hover:bg-gray-300"
          onclick="nextPage(event)"
          id="intern"
        >
          <span class="text-9xl text-[#10305C]"
            ><i class="fa-solid fa-graduation-cap"></i
          ></span>
          <h3 class="text-2xl font-bold text-[#10305C]">Intern</h3>
        </div>
        <div
          class="flex w-[20%] flex-col gap-2 justify-center items-center bg-[#F0E1E1] p-6 rounded-md cursor-pointer hover:bg-gray-300"
          onclick="nextPage(event)"
          id="company"
        >
          <span class="text-9xl text-[#10305C]"
            ><i class="fa-solid fa-building"></i
          ></span>
          <h3 class="text-2xl font-bold text-[#10305C]">Company</h3>
        </div>
      </div>
    </main>
`;
        document.body.insertAdjacentHTML("afterbegin",html)
      }

      function nextPage(event){
        let type = event.currentTarget.id

        
        let obj= {"type" : type}

        if (obj.type == 'company'){
          obj = {"type" : type , "subtype" : null}

        }

        const searchparams = new URLSearchParams(obj);

        let queryString = searchparams.toString();

        let url = window.location.href.split("?")[0];



        window.location.href  = url + "?"+ queryString;

      }

      function getSubtype(event){
        let subtype = event.currentTarget.id

        
        let obj = {"subtype" : subtype}

        

        const searchparams = new URLSearchParams(obj);

        let queryString = searchparams.toString();

        let url = window.location.href.split("&")[0];



        window.location.href  = url + "&"+ queryString;

      }
    

      
      
      let page =0;
      let html;
      if( window.location.href.split("=")[1] == "intern"){
        document.querySelector("input[type='button']").addEventListener("click", loadPages)

  function loadPages (event){
    event.preventDefault()
    switch (page){
          case 0 :
            
                // get data to object
                obj.firstName =document.querySelector("#name").value.split(" ")[0]
                obj.lastName =document.querySelector("#name").value.split(" ")[1]
                obj.email =document.querySelector("#email").value
                obj.age =document.querySelector("#age").value
                obj.gender =document.querySelector("#gender").value
                obj.adress =document.querySelector("#adress").value
                obj.tel =document.querySelector("#tel").value
                obj.password =document.querySelector("#password").value


                // next page
                html = `<form
      action=""
      method=""
      class="w-[80%] flex flex-col gap-5 justify-center items-center hidden"
    >
      <h1 class="text-5xl font-bold text-[#10305C]">
        Academic & Qualifications
      </h1>
      <select
        id="branche"
        class="bg-gray-50 w-[50%] border border-gray-300 text-gray-900 font-bold text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-none"
      >
        <option value="">Select branche</option>
        <option value="dd">Digital Development</option>
        <option value="id">Infrastructure Digital</option>
      </select>
      <select
        id="year"
        class="bg-gray-50 w-[50%] border border-gray-300 text-gray-900 font-bold text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-none"
      >
        <option value="">Year</option>
        <option value="1">First Year</option>
        <option value="2">Second Year</option>
      </select>
      <input
        type="text"
        name="portfolio"
        id="portfolio"
        placeholder="Portfolio WebSite"
        class="bg-gray-50 w-[50%] border border-gray-300 text-gray-900 font-bold text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-none"
      />
      
        <input
          type="button"
          value="Submit" id="ai" onclick="sendData(event)"
          class="bg-[#22C7C5] hover:border-2 hover:border-blue-400 text-white font-bold text-2xl py-3 px-16 rounded-xl cursor-pointer hover:bg-gray-200 hover:text-[#22C7C5]"
        />
      </div>
    </form>`
    page ++;

    document.getElementById("c-3").classList.add("bg-white");

    document.querySelector("form").innerHTML = html;

    
                
  
            
             
            

  
  }

  }

  
  

  
}
let urlss = new URLSearchParams(window.location.search)
function sendData(event){
    event.preventDefault();
    // get data to object
    //obj.branche =document.querySelector("#branche").value


    if (urlss.get('type') == 'company'){
   
   obj = {type: 'company'};


   // get data to object
   obj.name =document.querySelector("#namec").value
   console.log(document.querySelector("#namec").value)
   obj.email =document.querySelector("#emailc").value
   obj.adress =document.querySelector("#adressc").value
   obj.fix =document.querySelector("#telc").value
   obj.password =document.querySelector("#passwordc").value

   


}else{
  obj.type ="intern";



    // get data to object
    obj.branche =document.querySelector("#branche").value
             obj.year =document.querySelector("#year").value
             obj.portfolio =document.querySelector("#portfolio").value
             
            }

      



    
    
    // Create a new XMLHttpRequest object
    const xhr = new XMLHttpRequest();
            xhr.open("POST", "dbSignup.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            console.log(obj);

            // Define what happens on successful data submission
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log("Response from server:", xhr.responseText);
                    window.location.href = "loginPage.php";
                }
            };

            // Send the JSON data to the server
            xhr.send(JSON.stringify(obj));


    
  }

     
    </script>
    
  </body>
</html>
