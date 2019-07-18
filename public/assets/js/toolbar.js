var toolbarOptions = [
    [{ 'size': ['small', false, 'large', 'huge'] }],
    [{ 'header': 1 }, { 'header': 2 }],
    ['bold', 'italic', 'underline', 'strike'],
    ['link', 'image'],
];
var quill = new Quill('#editor', {
  modules: {
      toolbar: toolbarOptions
  },
  theme: 'snow'
});