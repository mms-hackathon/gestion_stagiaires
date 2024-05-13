<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./../output.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Sign In</title>
  </head>
  <body class="h-screen w-screen flex gap-0">
    <aside class="w-[20%] bg-[#10305C] h-[100%] flex flex-col justify-around">
      <div class="w-[60%] h-[20%] flex justify-center items-center">
        <a class="w-[80%]" href="./../index.html"
          ><img
            src="./../assests/maya-high-resolution-logo-white-transparent.png"
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
            class="w-[30px] h-[30px] border-2 inline-block rounded-full"
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
            class="w-[30px] h-[30px] border-2 inline-block rounded-full"
          ></span>
          <span class="font-bold text-white text-2xl signinSwitch"
            >Academic & Qualifications</span
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
            class="w-[30px] h-[30px] border-2 inline-block rounded-full"
          ></span>
          <span class="font-bold text-white text-2xl signinSwitch"
            >Skills & Interest</span
          >
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
          onclick="nextStep(2)"
          id="intern"
        >
          <span class="text-9xl text-[#10305C]"
            ><i class="fa-solid fa-graduation-cap"></i
          ></span>
          <h3 class="text-2xl font-bold text-[#10305C]">Intern</h3>
        </div>
        
        <div
          class="flex w-[20%] flex-col gap-2 justify-center items-center bg-[#F0E1E1] p-6 rounded-md cursor-pointer hover:bg-gray-300"
          onclick="type2(event)"
          id="company"
        >
          <span class="text-9xl text-[#10305C]"
            ><i class="fa-solid fa-building"></i
          ></span>
          <h3 class="text-2xl font-bold text-[#10305C]">Company</h3>
        </div>
      </div>
    </main>
    <form
      action=""
      method=""
      class="w-[80%] flex flex-col gap-5 justify-center items-center hidden"
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
        type="submit"
        value="Submit"
        class="bg-[#22C7C5] hover:border-2 hover:border-blue-400 text-white font-bold text-2xl py-3 px-16 rounded-xl cursor-pointer hover:bg-gray-200 hover:text-[#22C7C5]"
      />
    </form>
    <form
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
      <h3 class="text-gray-600 text-2xl font-bold w-[50%] text-start">
        Spoken Languages :
      </h3>
      <div class="w-[50%]">
        <div class="relative mb-6 w-[50%]">
          <label for="arabic" class="">Arabic</label>
          <input
            id="arabic"
            type="range"
            value="100"
            min="0"
            max="100"
            class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
          />
          <span
            class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6"
            >Min (00%)</span
          >
          <span
            class="text-sm text-gray-500 dark:text-gray-400 absolute start-1/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6"
            >30%</span
          >
          <span
            class="text-sm text-gray-500 dark:text-gray-400 absolute start-2/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6"
            >70%</span
          >
          <span
            class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6"
            >Max (100%)</span
          >
        </div>
      </div>
      <div class="w-[50%]">
        <div class="relative mb-6 w-[50%]">
          <label for="english" class="">English</label>
          <input
            id="english"
            type="range"
            value="50"
            min="0"
            max="100"
            class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
          />
          <span
            class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6"
            >Min (00%)</span
          >
          <span
            class="text-sm text-gray-500 dark:text-gray-400 absolute start-1/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6"
            >30%</span
          >
          <span
            class="text-sm text-gray-500 dark:text-gray-400 absolute start-2/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6"
            >70%</span
          >
          <span
            class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6"
            >Max (100%)</span
          >
        </div>
      </div>
      <div class="w-[50%]">
        <div class="relative mb-6 w-[50%]">
          <label for="frensh" class="">Frensh</label>
          <input
            id="frensh"
            type="range"
            value="0"
            min="0"
            max="100"
            class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
          />
          <span
            class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6"
            >Min (00%)</span
          >
          <span
            class="text-sm text-gray-500 dark:text-gray-400 absolute start-1/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6"
            >30%</span
          >
          <span
            class="text-sm text-gray-500 dark:text-gray-400 absolute start-2/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6"
            >70%</span
          >
          <span
            class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6"
            >Max (100%)</span
          >
        </div>
      </div>
      <div class="w-[50%] flex justify-end">
        <input
          type="submit"
          value="Submit"
          class="bg-[#22C7C5] hover:border-2 hover:border-blue-400 text-white font-bold text-2xl py-3 px-16 rounded-xl cursor-pointer hover:bg-gray-200 hover:text-[#22C7C5]"
        />
      </div>
    </form>
    <form
      action=""
      method=""
      class="w-[80%] flex flex-col gap-5 justify-center items-center hidden"
    >
      <h1 class="text-5xl font-bold text-[#10305C] w-[50%]">Skills</h1>
      <div class="bg-gray-100 w-[50%] h-[15rem] rounded-md"></div>
      <h1 class="text-5xl font-bold text-[#10305C] w-[50%]">Interest</h1>
      <div class="bg-gray-100 w-[50%] h-[15rem] rounded-md"></div>
      <input
        type="submit"
        value="Submit"
        class="bg-[#22C7C5] hover:border-2 hover:border-blue-400 text-white font-bold text-2xl py-3 px-16 rounded-xl cursor-pointer hover:bg-gray-200 hover:text-[#22C7C5]"
      />
    </form>
    <script>
      function id(id) {
        return document.getElementById(id);
      }
      // advancing in type if Establishement or Company :
      let count = 0;

      function type2(event) {
        const targetDiv = event.currentTarget;
        const type = targetDiv.children[1].textContent.toLowerCase();
        const companyDiv = id("company");
        const internDiv = id("intern");
        const noticeParagraph = id("textChoose");

        // add trasition with here !!!!

        if (type == "establishement") {
          targetDiv.remove();
          internDiv.children[1].textContent = "Administration";
          internDiv.children[0].innerHTML =
            '<i class="fa-solid fa-user-tie"></i>';
          companyDiv.children[1].textContent = "Mentor";
          companyDiv.children[0].innerHTML =
            '<i class="fa-solid fa-laptop"></i>';
        } else {
          id("establishement").remove();
          internDiv.children[1].textContent = "Administration";
          internDiv.children[0].innerHTML =
            '<i class="fa-solid fa-user-tie"></i>';
          companyDiv.children[1].textContent = "Mentor";
          companyDiv.children[0].innerHTML =
            '<i class="fa-solid fa-laptop"></i>';
        }
        count++;
        companyDiv.removeAttribute("onclick", "type2(event)");
        internDiv.onclick = function () {
          nextStep(2);
        };
        companyDiv.onclick = function () {
          nextStep(2);
        };
      }

      function nextStep(step) {
        const step1 = document.getElementsByTagName("main")[0];
        const step2 = document.forms[0];
        const step3 = document.forms[1];
        const step4 = document.forms[2];
        const stepIcons = document.querySelectorAll("aside .rounded-full");
        const signinSwitchText = document.querySelectorAll(".signinSwitch");
        if (step == 2) {
          step1.classList.add("hidden");
          step2.classList.remove("hidden");
          stepIcons[0].classList.remove("bg-white");
          stepIcons[1].classList.add("bg-white");
          if (count == 1) {
            signinSwitchText[2].classList.add("line-through");
            signinSwitchText[3].classList.add("line-through");
          }
        } else if (step == 3) {
          step2.classList.add("hidden");
          step3.classList.remove("hidden");
          stepIcons[1].classList.remove("bg-white");
          stepIcons[2].classList.add("bg-white");
        } else {
          step3.classList.add("hidden");
          step4.classList.remove("hidden");
          stepIcons[2].classList.remove("bg-white");
          stepIcons[3].classList.add("bg-white");
        }
      }

      const forms = document.forms;
      forms[0].onsubmit = function (event) {
        event.preventDefault();
        if (count != 1) {
          nextStep(3);
        } else {
          console.log("Sign In Completed");
        }
      };
      forms[1].onsubmit = function (event) {
        event.preventDefault();
        nextStep(4);
      };
      forms[2].onsubmit = function (event) {
        event.preventDefault();
      };
    </script>
  </body>
</html>
