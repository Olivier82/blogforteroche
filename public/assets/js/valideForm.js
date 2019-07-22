var validForm = document.getElementById('validForm');

validForm.addEventListener('click', function (e) {
    e.preventDefault();
    var titleError;
    var editorError;
    var titlePost = document.getElementById('titlePost');
    var editor = document.querySelector('.ql-editor');

    if (!titlePost.value) {
        titleError = 'Veuillez ajouter un titre à l\'article !';
    }

    if (editor.textContent === "") {
        editorError = 'Veuillez ajouter un texte pour l\'article !';
    }

    if (titleError) {
        e.preventDefault();
        document.getElementById('titleError').innerHTML = titleError;
        return false;
    } else if (editorError) {
        console.log(document.querySelector('.ql-editor').textContent);
        document.getElementById('editorError').innerHTML = editorError;
        return false;
    } else {
        alert('Le formulaire a bien été envoyé !!!!');
    }
});
