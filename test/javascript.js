var req;
var isIE;
var completeField;
var completeTable;//variabilele folosite
var autoRow;

function init() {
    completeField = document.getElementById("complete-field");
    completeTable = document.createElement("table");//se creeaza un yabel
    completeTable.setAttribute("class", "popupBox");//clasa tabelului va fi popupBox
    completeTable.setAttribute("style", "display: none");//tabelul va fi ascuns
    autoRow = document.getElementById("auto-row");
    autoRow.appendChild(completeTable);// se adauga la sfarsit tabelul
    completeTable.style.top = getElementY(autoRow) + "px";//se seteaza distanta de la varful paginii sa fie egala pozitia elementului autoRow
}

function doCompletion() {
        var url = "autocomplete.php?action=complete&id=" + escape(completeField.value);
        req = initRequest();//se apeleaza initRequest()
        req.open("GET", url, true);//se deschide un get catre url
        req.onreadystatechange = callback;//daca stare se schimba este apelat callback
        req.send(null);//se trimite
}

function initRequest() {//verifica ce tip de browser este folosit
    if (window.XMLHttpRequest) {
        if (navigator.userAgent.indexOf('MSIE') != -1) {
            isIE = true;
        }
        return new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        isIE = true;
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
}

function callback() {

    clearTable();

    if (req.readyState == 4) { //Returnează starea obiectului/ transferului de date: 4 = complet
        if (req.status == 200) { //Returnează o valoare numerică ce reprezintă starea =200 pentru “OK”
            parseMessages(req.responseXML);
        }
    }
}

function appendComposer(produs,pret,composerId) {

    var row;
    var cell;
    var linkElement;

    if (isIE) {
        completeTable.style.display = 'block';//tabelul va fi sub forma de blocuri
        row = completeTable.insertRow(completeTable.rows.length);
        cell = row.insertCell(0);
    } else {
        completeTable.style.display = 'table';//va fi tabel
        row = document.createElement("tr");//creeaza un nou rand
        cell = document.createElement("td");//creeaza un nou cell
        row.appendChild(cell);//se adauga cell-ul in row(rand)
        completeTable.appendChild(row);//se adauga in tabel
    }

    cell.className = "popupCell";//clasa celulei va fi popupCell

    linkElement = document.createElement("a");
    linkElement.className = "popupItem";//clasa va fi popupItem
    linkElement.setAttribute("href", "autocomplete.php?action=lookup&id=" + composerId);//link-ul fiecarui produs va contine id-ul acestuia
    linkElement.appendChild(document.createTextNode(produs + " " + pret));//textul care se va afisa 
    cell.appendChild(linkElement);//se adauga link-ul+textul fiecarui element din tabel
}

function clearTable() {
    if (completeTable.getElementsByTagName("tr").length > 0) {//daca exista randuri
        completeTable.style.display = 'none';//tabelul nu se va afisa
        for (loop = completeTable.childNodes.length -1; loop >= 0 ; loop--) {//se parcurge tot tabelul
            completeTable.removeChild(completeTable.childNodes[loop]);//se sterge elementul curent
        }
    }
}

function getElementY(element){

    var targetTop = 0;//initializare

    if (element.offsetParent) {
        while (element.offsetParent) {
            targetTop += element.offsetTop;//target top se mareste cu distanta de la border pana la elementul trecut/stramos
            element = element.offsetParent;//elementul curent devine elementul trecut/stramos
        }
    } else if (element.y) {
        targetTop += element.y;//targetTop se mareste cu inaltimea elementului
    }
    return targetTop;//se returneaza targetTop
}

function parseMessages(responseXML) {

    
    if (responseXML == null) {//daca este null
        return false;
    } else {

        var composers = responseXML.getElementsByTagName("composers")[0];

        if (composers.childNodes.length > 0) {
            completeTable.setAttribute("bordercolor", "black");//border-ul va fi de culoare neagra
            completeTable.setAttribute("border", "1");//grosimea border-ului va fi de un px

            for (loop = 0; loop < composers.childNodes.length; loop++) {//se parcurge
                var composer = composers.childNodes[loop];//variabila composer va fi egal cu fiecare composer din lista 
                var produs = composer.getElementsByTagName("produs")[0];//valorile produsului pentru fiecare composer se reinitializeaza si aici
                var pret = composer.getElementsByTagName("pret")[0];
                var composerId = composer.getElementsByTagName("id")[0];
                appendComposer(produs.childNodes[0].nodeValue,
                    pret.childNodes[0].nodeValue,
                    composerId.childNodes[0].nodeValue);//se apeleaza append composer pentru fiecare composer in parte
            }
        }
    }
}