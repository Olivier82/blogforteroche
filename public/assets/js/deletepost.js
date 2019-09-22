var btnDeletePost = document.getElementById('delete-post');
var baseUrlDeletePostEl = document.getElementById('baseUrlDeletePost');
var selectedIdEl = document.getElementById('selectedId')

document.querySelectorAll('.btnOpenDeleteModal')
    .forEach(function (btnOpenDeleteModalEl) {
        btnOpenDeleteModalEl.addEventListener('click', function () {
            var id = btnOpenDeleteModalEl.getAttribute('data-id')
            selectedIdEl.value = id
        })
    })

btnDeletePost.addEventListener('click', function() {
    var selectedId = selectedIdEl.value
    var baseUrlDeletePost = baseUrlDeletePostEl.value
    var url = baseUrlDeletePost + selectedId

    axios.post(url)
        .then(function(response) {
            console.log(response);
        })
})
