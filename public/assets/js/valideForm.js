var validForm = document.getElementById('validForm');
var formPost = document.getElementById('form-post');
var spinner = document.getElementById('spinner');
var titleError = document.getElementById('titleError');
var editorError = document.getElementById('editorError');

validForm.addEventListener('click', function (e) {
    e.preventDefault();
    var titlePostElt = document.getElementById('titlePost');
    var editorElt = document.querySelector('.ql-editor');
    var titlePost = document.getElementById('titlePost').value;
    var editor = document.querySelector('.ql-editor').innerHTML;

    if (!titlePostElt.value) {
        titleError.classList.remove('d-none');
        titleError = 'Veuillez ajouter un titre à l\'article !';
    } else {
        titleError.classList.add('d-none');
    }

    if (!editorElt.textContent.length) {
        editorError.classList.remove('d-none');
        editorError.innerHTML = 'Veuillez ajouter un texte pour l\'article !';
    } else {
        editorError.classList.add('d-none');
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
