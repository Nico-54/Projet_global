document.getElementById('form').addEventListener('submit', (event) => {
    event.preventDefault()
    validateForm(event)
})

function validateForm(eventData) {
    console.log(eventData);
    let missingElement = false;
    let object = {};

    for (let idField of eventData.target) {
        console.log(idField);

        if (!idField.value && idField.localName == 'input') {
            missingElement = true;
        } else {
            if (idField.value) {
                object[idField.id] = idField.value
            }
        }
    }

    if (missingElement) {
        alert("Manque un élément !")
    } else {
        //console.log(object);
        if (localStorage.getItem('data')) {
            let local = JSON.parse(localStorage.getItem('data'));
            if (Array.isArray(local)) {
                local.push(object);
            } else {
                local = [local];
                local.push(object);
            }
            localStorage.setItem("data", JSON.stringify(local));
        } else {
            localStorage.setItem("data", JSON.stringify[object]);
        }
    }
}