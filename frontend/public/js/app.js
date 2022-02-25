document.addEventListener('DOMContentLoaded', function() {
    const xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
            let display = document.getElementById('api-display');
            try {
                let data = JSON.parse(xmlHttp.responseText);
                display.innerText = 'Using "'+data['name']+'" version ' + data['version'];
            } catch (err) {
                console.log(err.message + " in " + xmlHttp.responseText);
                display.innerText = 'Unable to connect to API: ' + err.message;
            }
        }
    }

    xmlHttp.open('GET', '/api', true);
    xmlHttp.send();
});