let black_container = document.getElementById("black_container");
let bg_box = document.getElementById("bg_box");
let mini_box_1 = document.getElementById("mini_box_1");
let mini_box_2 = document.getElementById("mini_box_2");
let sony_text = document.getElementById("sony_text");

let ps_logo = document.getElementById("ps_logo");
let license_text = document.getElementById("license_text");
let ps_text = document.getElementById("ps_text");

let intro_sound = new Audio("resources/PS_intro_sound.mp3");
        
function startAnim() {          
    intro_sound.play();
    black_container.classList.add("black_container_fade");

    setTimeout(() => {
        bg_box.classList.add("bg_box");
        mini_box_1.classList.add("mini_box_1_transition");
        mini_box_2.classList.add("mini_box_2_transition");
        sony_text.classList.add("sony_text_fade"); 
    }, 1000);

    setTimeout(() => {
        black_container.classList.add("black_container_fade_out");
    }, 7000);

    setTimeout(() => {
        ps_logo.classList.add("ps_logo_fade_in");
    }, 7500);

    setTimeout(() => {
        license_text.classList.add("license_text_fade_in");
        ps_text.classList.add("ps_text_fade_in");
    }, 8000);
}