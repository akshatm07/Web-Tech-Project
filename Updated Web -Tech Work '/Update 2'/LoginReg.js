document.addEventListener("DOMContentLoaded", function() {

    var inputs = document.querySelectorAll(".input input");
    var buttons = document.querySelectorAll(".button");
    var alt2 = document.querySelector(".alt-2");
    var materialButton = document.querySelector(".material-button");

    inputs.forEach(function(input) {
        input.addEventListener("focus", function() {
            var parent = this.parentElement;
            parent.querySelector("label").style.cssText = "line-height: 18px; font-size: 18px; font-weight: 100; top: 0px;";
            parent.querySelector(".spin").style.width = "100%";
        });

        input.addEventListener("blur", function() {
            var parent = this.parentElement;
            parent.querySelector(".spin").style.width = "0px";
            if (this.value === "") {
                parent.querySelector("label").style.cssText = "line-height: 60px; font-size: 24px; font-weight: 300; top: 10px;";
            }
        });
    });

    buttons.forEach(function(button) {
        button.addEventListener("click", function(e) {
            var pX = e.pageX,
                pY = e.pageY,
                oX = parseInt(this.offsetLeft),
                oY = parseInt(this.offsetTop);

            this.innerHTML += '<span class="click-efect x-' + oX + ' y-' + oY + '" style="margin-left:' + (pX - oX) + 'px;margin-top:' + (pY - oY) + 'px;"></span>';
            var span = this.querySelector('.click-efect.x-' + oX + '.y-' + oY);
            span.style.cssText = "width: 500px; height: 500px; top: -250px; left: -250px;";
            span.classList.add("active");
        });
    });

    alt2.addEventListener("click", function() {
        if (!this.classList.contains('material-button')) {
            document.querySelector(".shape").style.cssText = "width: 100%; height: 100%; transform: rotate(0deg);";

            setTimeout(function() {
                document.querySelector(".overbox").style.overflow = "initial";
            }, 600);

            this.style.width = "140px";
            this.style.height = "140px";
            document.querySelector(".box").classList.remove("back");
            document.querySelector(".overbox .title").style.display = "none";
            document.querySelector(".overbox .input").style.display = "none";
            document.querySelector(".overbox .button").style.display = "none";
            this.classList.add('material-buton');
        }
    });

    materialButton.addEventListener("click", function() {
        if (this.classList.contains('material-button')) {
            setTimeout(function() {
                document.querySelector(".overbox").style.overflow = "hidden";
                document.querySelector(".box").classList.add("back");
            }, 200);

            this.classList.add('active');
            this.style.width = "700px";
            this.style.height = "700px";

            setTimeout(function() {
                document.querySelector(".shape").style.cssText = "width: 50%; height: 50%; transform: rotate(45deg);";
                document.querySelector(".overbox .title").style.display = "block";
                document.querySelector(".overbox .input").style.display = "block";
                document.querySelector(".overbox .button").style.display = "block";
            }, 700);

            this.classList.remove('material-button');
        }

        if (document.querySelector(".alt-2").classList.contains('material-buton')) {
            document.querySelector(".alt-2").classList.remove('material-buton');
            document.querySelector(".alt-2").classList.add('material-button');
        }
    });

});
