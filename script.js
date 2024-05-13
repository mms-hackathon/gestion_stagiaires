// function get element by id
function getE(t){
   return document.getElementById(t)
}
// set faqs at bottom dinamique
let faq_system = document.getElementById("faq_system")
let faq_learn = document.getElementById("faq_learn")
let faq_linux = document.getElementById("faq_linux")

faq_system.addEventListener("click",()=>{
    getE("text_system").classList.toggle("hidden")
    faq_system.querySelector("#faq_system > i").classList.toggle("fa-angle-down")
})

faq_learn.addEventListener("click",()=>{
    getE("text_learn").classList.toggle("hidden")
    faq_learn.querySelector("#faq_learn > i").classList.toggle("fa-angle-down")
})

faq_linux.addEventListener("click",()=>{
    getE("text_linux").classList.toggle("hidden")
    faq_linux.querySelector("#faq_linux > i").classList.toggle("fa-angle-down")
})