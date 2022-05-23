function changeForm(id1, id2){
    var s1 = document.getElementById(id1);
    var s2 = document.getElementById(id2);
    s2.innerHTML = "";

    switch (s1.value) {
        case '1':
            s2.innerHTML =  "<div class='input-box'>" +
                            "<input type='number' id='size' name='size' required>" +
                            "<label>Size</label>" +
                            "</div>";
            break;

        case '2':
            s2.innerHTML =  "<div class='input-box'>" +
                            "<input type='number' id='weight' name='weight' required>" +
                            "<label>Weight</label>" +
                            "</div>";
            break;

        case '3':
            s2.innerHTML =  "<div class='input-box'>" +
                            "<input type='number' id='height' name='height' required>" +
                            "<label>height</label>" +
                            "</div>";
            
            s2.innerHTML +=  "<div class='input-box'>" +
                            "<input type='number' id='width' name='width' required>" +
                            "<label>width</label>" +
                            "</div>";

            s2.innerHTML +=  "<div class='input-box'>" +
                            "<input type='number' id='length' name='length' required>" +
                            "<label>length</label>" +
                            "</div>";
            break;

        default:
            break;
    }
}
