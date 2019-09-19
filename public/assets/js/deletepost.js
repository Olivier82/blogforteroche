var deletePost = document.getElementById('delete-post');
var idDeletePost = document.getElementById('deletePostId');

deletePost.addEventListener('click', function(e) {
    axios.delete('admin/delete/$id' {
        idPost: idPost,
    })
    .then(function(response) {
        console.log(response);
    })
})