document.addEventListener("DOMContentLoaded", function() {
    console.log("Website Loaded!");

    let donateBtn = document.querySelector(".btn");
    donateBtn.addEventListener("mouseover", function() {
        donateBtn.style.backgroundColor = "gold";
    });

    donateBtn.addEventListener("mouseout", function() {
        donateBtn.style.backgroundColor = "green";
    });
});
