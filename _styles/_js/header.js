window.addEventListener("DOMContentLoaded", function (event) {
    window.addEventListener("scroll", function(event) {
        if (document.body.scrollTop > 80
        || document.documentElement.scrollTop > 80) {
            document.querySelector(".navigation").style.backgroundColor = "rgba(255, 255, 255, 0.9);";
            document.querySelector(".navigation").style.backdropFilter = "blur(10px)";
        } else {
            document.querySelector(".navigation").style.backgroundColor = "transparent";
        }
    });
});


