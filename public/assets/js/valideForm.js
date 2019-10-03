var validForm = document.getElementById('validForm');
var formPost = document.getElementById('form-post');
var spinner = document.getElementById('spinner');
var postSuccess = document.getElementById('success');
var editPostIdEl = document.getElementById('editPostId');
var titleError = document.getElementById('titleError');
var editorError = document.getElementById('editorError');
var titlePostElt = document.getElementById('titlePost');
var editorElt = document.querySelector('.ql-editor');
var errorsElt = document.getElementById('errors');

validForm.addEventListener('click', function (e) {
    e.preventDefault();
    var onEdit = Boolean(editPostIdEl);
    var idPost = null;
    if (onEdit) {
        idPost = parseInt(editPostIdEl.value, 10);
    }

    var titlePost = titlePostElt.value;
    var editor = editorElt.innerHTML;

    if (!titlePostElt.value) {
        titleError.classList.remove('d-none');
        titleError.innerHTML = 'Veuillez ajouter un titre à l\'article !';

        return;
    }

    if (!editorElt.textContent.length) {
        editorError.classList.remove('d-none');
        editorError.innerHTML = 'Veuillez ajouter un texte pour l\'article !';

        return;
    }

    validForm.classList.remove('disabled');
    spinner.classList.remove('d-none');
    axios.post(formPost.getAttribute('action'), {
            titlePost: titlePost,
            editor: editor,
            idPost: idPost,
        })
        .then(function(response) {
            spinner.classList.add('d-none');
            validForm.classList.remove('disabled');
            if (response.data.errors) {
                var msgErrors = response.data.errors;

                Object.keys(msgErrors)
                    .forEach(function (key) {
                        if (key === 'title') {
                            titleError.classList.remove('d-none');
                            titleError.innerHTML = msgErrors[key];
                        }

                        if (key === 'content') {
                            editorError.classList.remove('d-none');
                            editorError.innerHTML = msgErrors[key];
                        }

                        if (key === 'id') {
                            errorsElt.classList.remonve('d-none');
                            errorsElts.innerHTML = msgErrors[key];
                        }
                    });
            } else {
                postSuccess.classList.remove('d-none');
                if (!OnEdit){
                    titlePostElt.value = '';
                    editorElt.textContent = '';
                }
            }
        })
        .catch(function() {
            spinner.classList.add('d-none');
            validForm.classList.remove('disabled');
            errorsElt.classList.remove('d-none');
            errorsElt.innerHTML = 'Une erreur est survenue';
        });
});
