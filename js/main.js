let linkURL = document.getElementById('linkURL');
let linkDescription = document.getElementById('linkDescription');

let Form1 = document.getElementById('formPostUrl');

Form1.addEventListener('submit', function (event) {
    event.preventDefault();

    const frmAddNumbers = new FormData(); // create single instance
    frmAddNumbers.set('linkURL', linkURL.value);
    frmAddNumbers.set('linkDescription', linkDescription.value);

    fetch('addUrlController.php', {
            method: 'POST',
            body: frmAddNumbers
        }
    )
        .then(response => response.json())
        .then((result) => {
            if (result.errors) {
                alert('Заполните все поля !');
            } else {
                alert('Успешно добавленно');
                close();
            }
        })
        .catch(error => console.log(error));
});

function clik(id, count) {
    const frmClik = new FormData(); // create single instance
    frmClik.set('idClik', id);
    frmClik.set('countClik', count);

    fetch('clikController.php', {
            method: 'POST',
            body: frmClik
        }
    )
        .then(response => response.json())
        .then((result) => {
            if (result.errors) {
                window.location.replace(result.errors);
            }
        })
        .catch(error => console.log(error));
}