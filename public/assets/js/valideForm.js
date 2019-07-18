var validForm = document.getElementById('validForm');

validForm.addEventListener('click', function (e) {
    e.preventDefault();
    var titleError;
    var editorError;
    var titlePost = document.getElementById('titlePost');
    var editor = document.getElementById('editor');

    if (!titlePost.value) {
        titleError = 'Veuillez ajouter un titre à l\'article !';
    }

    if (!editor.value) {
        editorError = 'Veuillez ajouter un texte pour l\'article !';
    }

    if(titleError) {
        document.getElementById('titleError').innerHTML = titleError;
    }

    if(editorError) {
        document.getElementById('editorError').innerHTML = editorError;
    }

    alert('formulaire envoyé');

});

