var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike']
];
var quill = new Quill('#editor', {
  modules: {
      toolbar: toolbarOptions
  },
  theme: 'snow'   // Specify theme in configuration
});