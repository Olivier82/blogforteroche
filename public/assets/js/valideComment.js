var validComment = document.getElementById('validComment');
var formComment = document.getElementById('form-comment');
var spinner = document.getElementById('spinner');
var authorElt = document.getElementById('author');
var commentElt = document.getElementById('comment');
var commentSuccess = document.getElementById('commentSuccess');
var authorError = document.getElementById('authorError');
var commentError = document.getElementById('commentError');
var idPostElt = document.getElementById('postId');

validComment.addEventListener('click', function (e) {
    e.preventDefault();
    var author = authorElt.value;
    var comment = commentElt.value;
    var idPost = parseInt(idPostElt.value, 10);

    if (!authorElt.value) {
        authorError.classList.remove('d-none');
        authorError.innerHTML = 'Veuillez indiquez votre nom';

        return;
    }

    if (!commentElt.value.length) {
        commentError.classList.remove('d-none');
        commentError.innerHTML = 'Veuillez ajouter un texte pour votre commentaire';

        return;
    }

    validComment.classList.remove('disabled');
    spinner.classList.remove('d-none');
    axios.post(formComment.getAttribute('action'), {
        author: author,
        comment: comment,
        idPost: idPost,
    })
    .then(function(response) {
        spinner.classList.add('d-none');
        validForm.classList.remove('disabled');
        if (response.data.errors) {
            var msgErrors = response.data.errors;

            Object.keys(msgErrors)
                .forEach(function (key) {
                    if (key === 'author') {
                        authorError.classList.remove('d-none');
                        authorError.innerHTML = msgErrors[key];
                    }

                    if (key === 'comment') {
                        commentError.classList.remove('d-none');
                        commentError.innerHTML = msgErrors[key];
                    }
                });
        } else {
            commentSuccess.classList.remove('d-none');
            commentSuccess.innerHTML = 'Commentaire ajouté avec succés.'
        }
    })
    .catch(function() {
        spinner.classList.add('d-none');
        validComment.classList.remove('disabled');
    })
});