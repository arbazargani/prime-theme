/*jshint esversion: 6 */

// Scroll Animation

var animation_items = document.querySelectorAll("[data-animation]");
animation_items.forEach(element => {

    let anim_name = element.getAttribute("data-animation");
    let offset = element.offsetTop;
    let anim_offset = offset - (window.innerHeight / 1.5);
    let anim_delay = element.getAttribute("data-animation-delay");
    
    if(window.pageYOffset <= anim_offset){
        element.classList.add("none-visible");
    
        window.addEventListener("scroll" , function(){
            if(window.pageYOffset >= anim_offset){
                element.classList.add(anim_name);
                // element.classList.add("anim-delay-"+anim_delay);
                element.style.animationDelay =  anim_delay+"ms"; 
               
                element.classList.remove("none-visible");
            }
        });
    }
    
});




// Counter Up
var counters = document.querySelectorAll("[data-counterup");
counters.forEach(element => {
    let counter_end = element.getAttribute("data-counterup");
    let counter_offset = element.offsetTop;
    let lunch_offset = counter_offset - (window.innerHeight / 1.5);
    window.addEventListener("scroll" , function(){
        let x = 0;
        if( element.innerHTML == 0 && window.pageYOffset >= lunch_offset){
                setInterval(() =>{
                    if( x < counter_end){
                        x += 1;
                        element.innerHTML = to_persian_num(x);
                    }
                } , 20);
        }
    });
});




//To Persian Numeric Function
function to_persian_num(number){
    let persian_numbers_v2 = ["۰","۱","۲","۳","۴","۵","۶","۷","۸","۹"];
    let persian_num = "";
    let num = number.toString();
    for (let i = 0; i < num.length; i++ ){
        let num_num = num.substr(i, 1);
        persian_num += persian_numbers_v2[num_num];
    }
    return persian_num;
}


//Copy version
String.prototype.toPersianDigits = function(){
    var id= ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
    return this.replace(/[0-9]/g, function(w){
        return id[+w];
    });
}



// Sticky Header
// var main_header = document.querySelector("#main-header");
// var sticky_header = document.querySelector("#sticky-header");
// window.addEventListener("scroll" , function(){
//     if(window.pageYOffset >= main_header.offsetHeight){
//         sticky_header.classList.add("sticky-header-show");
//     }
//     if(window.pageYOffset <= main_header.offsetHeight){
//         sticky_header.classList.remove("sticky-header-show");
//     }
// });






// Collapsibles
var collapse_items = document.querySelectorAll("[data-collapse]");
collapse_items.forEach(element => {

    // Grab Data
    let collapse_title = element.querySelector(".faq-collapse-title");
    let collapse_content = element.querySelector(".faq-collapse-content");
    let content_offset = collapse_content.scrollHeight;
    let collapse_icon = element.querySelector(".faq-collapse-title-icon i:last-child");
    let collapse_state = element.getAttribute("data-collapse");

    // open collapses first
    if(collapse_state == "open"){
        collapse_content.classList.add("collapse-open");
        collapse_content.style.height = content_offset + "px";
        collapse_icon.style.transform = "rotate(0deg)";
    }

    // toggle collapses with click
    collapse_title.addEventListener("click" , function(){

        let collapse_state = element.getAttribute("data-collapse");

        if(collapse_state == "close"){
            element.setAttribute("data-collapse" , "open");
            collapse_content.classList.add("collapse-open");
            collapse_content.style.height = content_offset + "px";
            collapse_icon.style.transform = "rotate(0deg)";
        }

        if(collapse_state == "open"){
            element.setAttribute("data-collapse" , "close");
            collapse_content.classList.remove("collapse-open");
            collapse_content.style.height = "0px";
            collapse_icon.style.transform = "rotate(90deg)";
        }
        
        // Method 2
        // if (collapse_content.style.height != "0") {
        //     collapse_content.style.height = null;
        // } else {
        //     collapse_content.style.height = content_offset + "px";
        // } 

    });
    
});



// Shopping bag Pop

function shopping_bag_poper (){
    let shopping_bag = document.querySelector(".shopping-bag");
    let shopping_bag_mob = document.querySelector(".mobile-header .shopping-bag");
    let shopping_bag_pop = document.querySelector(".shopping-bag-pop-cont");
    let shopping_bag_pop_mob = document.querySelector(".shopping-bag-pop-cont-mobile");
    let shopping_bag_close = document.querySelectorAll(".shopping-bag-pop-btn-close");

    shopping_bag.addEventListener("click" , ()=>{
        shopping_bag_pop.classList.add("shopping-bag-pop-active");
    } , true);

    shopping_bag_mob.addEventListener("click" , ()=>{
        shopping_bag_pop_mob.classList.toggle("shopping-bag-pop-active");
    } , true);

    shopping_bag_close.forEach(element => {
        element.addEventListener("click" , ()=>{
            shopping_bag_pop.classList.remove("shopping-bag-pop-active");
            shopping_bag_pop_mob.classList.remove("shopping-bag-pop-active");
        });
    });


    window.addEventListener("click" , (event) => {
        if (event.target != shopping_bag_pop) {
            shopping_bag_pop.classList.remove("shopping-bag-pop-active");
            shopping_bag_pop_mob.classList.remove("shopping-bag-pop-active");
        }
    } , true);
}

if(document.querySelector(".shopping-bag")){
    shopping_bag_poper ();
}




function txt_overflow_anim() {
    // text Overflow animation
    let text_overflow_anim = document.querySelectorAll(".text-overflow-anim");

    text_overflow_anim.forEach(element => {
        element.addEventListener("mouseover" , () => {
            element.style.transitionDuration = "5s";
            element.style.width = element.scrollWidth+"px";
        });
        element.addEventListener("mouseout" , () => {
            element.style.transitionDuration = "1s";
            element.style.width = "";
        });
    });
}


window.onload = function () {
    // Mobile Header
    var mobile_header = document.querySelector("#mobile-nav");
    var mobile_header_btn = document.querySelector("div.burger-btn");
    mobile_header_btn.addEventListener("click" , function(){
        mobile_header_btn.classList.toggle("burger-active");
        mobile_header.classList.toggle("mobile-nav-show");
    });

    
    if(document.querySelectorAll(".text-overflow-anim") || document.querySelector(".text-overflow-anim")){
        txt_overflow_anim();
    }
}