var all = document.getElementsByClassName("clickable");

var xhr = new XMLHttpRequest();
var url = "indexx.php";

xhr.open("GET", url, true);
xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
        if (xhr.status === 200) {
            try {
                var data = JSON.parse(xhr.responseText);
                data.forEach(function (glasses) {
                    var element = document.getElementById(glasses.id);
                    if (element) {

                        var color_switch = color(glasses.color);
                        
                        if (color_switch != "more_than_one") {
                            element.getElementsByTagName('div')[0].style.backgroundColor = color_switch;
                        }
                        else {
                            element.getElementsByTagName('div')[0].style.backgroundImage = "url(img/more_than_one_color.png)";

                            /*image = document.createElement('img');
                            image.src = "img/more_than_one_color.png";
                            image.className = "little_color";
                            element.getElementsByTagName('div')[0].appendChild(image);*/
                        }
            
                        element.addEventListener("click", function () {
                            document.getElementById("url").innerHTML = "";

                            document.getElementById("name").innerHTML = glasses.name;
                            document.getElementById("price").innerHTML = `${glasses.price} ₽`;
                            document.getElementById("color").innerHTML = glasses.color;
                            document.getElementById("type").innerHTML = glasses.type;
                            document.getElementById("brand").innerHTML = glasses.brand;
                            document.getElementById("country").innerHTML = glasses.country;

                            var image = document.getElementById("img");
                            image.src = `${glasses.image}`;

                            var ael = document.createElement('a');
                            ael.innerHTML = glasses.url;
                            ael.href = glasses.url; 
                            ael.text = "Странца на сайте"
                            document.getElementById("url").appendChild(ael);
           
                        });
                    }
                });
            } catch (error) {
                console.error("Ошибка при обработке ответа:", error);
            }
        } else {
            console.error("Ошибка при получении данных. Статус:", xhr.status);
        }
    }
};

function color(color) {
    //color = color.split("; ")[0];

    switch (color) {
        case "Золотой":
            return "#D18A39";
        case "Зеленый":
            return "#466A44";
        case "Розовый":
            return "#E0908D";
        case "Серый":
            return "#9AA8A8";
        case "Черный":
            return "#32312D";
        case "Синий":
            return "#036280";
        case "Сиреневый":
            return "#9356A0";
        case "Фиолетовый":
            return "#9356A0";
        case "Белый":
            return "white";
        case "Коричневый":
            return "#926550";
        case "Голубой":
            return "#81BECE";
        case "Оранжевый":
            return "#e28343";
        case "Серебряный":
            return "#c0c0c0";
        case "Желтый":
            return "#f4ea79";
        case "Бежевый":
            return "#E1C9A9";
        default:
            return "more_than_one";
    }

}

xhr.send();