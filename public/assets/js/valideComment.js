var validComment = document.getElementById('validComment');
var formComment = document.getElementById('form-comment');
var authorElt = document.getElementById('author');
var commentElt = document.getElementById('comment');
var commentSuccess = document.getElementById('commentSuccess');
var authorError = document.getElementById('authorError');
var commentError = document.getElementById('commentError');

validComment.addEventListener('click', function(e) {
    e.preventDefault();

    var author = authorElt.value;
    var comment = commentElt.value;

    if (!authorElt.value) {
        authorError.classList.remove('d-none');
        authorError.innerHTML = 'Veuillez indiquez votre nom';

        return;
    }

    if (!commentElt.textContent.length) {
        commentError.classList.remove('d-none');
        commentError.innerHTML = 'Veuillez ajouter un texte pour votre commentaire';

        return;
    }
})