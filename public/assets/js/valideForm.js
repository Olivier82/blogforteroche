var validForm = document.getElementById('validForm');
var formPost = document.getElementById('form-post');
var data = new FormData(formPost);

validForm.addEventListener('click', function (e) {
    e.preventDefault();
    var titleError;
    var editorError;
    var titlePostElt = document.getElementById('titlePost');
    var editorElt = document.querySelector('.ql-editor');
    var data = {
        titlePost: document.getElementById('titlePost').value,
        editor: document.querySelector('.ql-editor').textContent,
    };

    if (!titlePostElt.value) {
        titleError = 'Veuillez ajouter un titre à l\'article !';
    }

    if (editorElt.textContent === "") {
        editorError = 'Veuillez ajouter un texte pour l\'article !';
    }

    if (titleError) {
        e.preventDefault();
        document.getElementById('titleError').innerHTML = titleError;
        return false;
    } else if (editorError) {
        document.getElementById('editorError').innerHTML = editorError;
        return false;
    } else {
        alert('Formulaire envoyé !!!')
        axios({
            method: 'post',
            url: '/formPost',
            data : data,
            })
        .then(function (response) {
            console.log(response);
        });
    }
});