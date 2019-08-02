var validForm = document.getElementById('validForm');
var formPost = document.getElementById('form-post');
var spinner = document.getElementById('spinner');

validForm.addEventListener('click', function (e) {
    e.preventDefault();
    var titleError;
    var editorError;
    var titlePostElt = document.getElementById('titlePost');
    var editorElt = document.querySelector('.ql-editor');
    var titlePost = document.getElementById('titlePost').value;
    var editor = document.querySelector('.ql-editor').innerHTML;

    if (!titlePostElt.value) {
        titleError = 'Veuillez ajouter un titre à l\'article !';
    } else {
        titleError = '';
    }

    if (!editorElt.textContent.length) {
        editorError = 'Veuillez ajouter un texte pour l\'article !';
    } else {
        editorError = '';
    }

    if (titleError) {
        document.getElementById('titleError').innerHTML = titleError;
        return;
    } else if (editorError) {
        document.getElementById('editorError').innerHTML = editorError;
        return;
    } else {
        validForm.classList.add('disabled');
        spinner.classList.remove('d-none');
        axios.post(formPost.getAttribute('action'), {
            titlePost: titlePost,
            editor: editor,
        })
        .then(function (response) {
            spinner.classList.add('d-none');
            validForm.classList.remove('disabled');
            console.log(response.data);
        })
        .catch(function(error) {
            spinner.classList.add('d-none');
            validForm.classList.remove('disabled');
            console.log(error);
        })
    }
});
