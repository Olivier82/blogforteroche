var deletePost = document.getElementById('delete-post');

deletePost.addEventListener('click', function(e) {
    axios.delete('admin/deletepost/[i:id]')
})