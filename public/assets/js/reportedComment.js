var btnReportedComment = document.getElementById('reported-comment');
var baseUrlReportedCommentEl = document.getElementById('baseUrlReportedComment');
var selectedIdEl = document.getElementById('selectedId');
var idCommentElt = document.getElementById('idComment');

document.querySelectorAll('.btnOpenReportCommentModal')
    .forEach(function (btnOpenReportCommentModalEl) {
        btnOpenReportCommentModalEl.addEventListener('click', function () {
            var id = btnOpenReportCommentModalEl.getAttribute('data-id')
            selectedIdEl.value= id
        })
    })

        btnReportedComment.addEventListener('click', function() {
            var selectedId = selectedIdEl.value
            var baseUrlReportedComment = baseUrlReportedCommentEl.value
            var url = baseUrlReportedComment + selectedId
            var idComment = parseInt(idCommentElt.value, 10);
            var reported = 0

        axios.post(url, {
            reported: reported,
            idComment: idComment,
        })
            .then(function(response) {
                console.log(response.data);
            })
})