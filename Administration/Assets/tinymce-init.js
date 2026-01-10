document.addEventListener('DOMContentLoaded', () => {
  if (document.querySelector('textarea.tinymce')) {
    tinymce.init({
      selector: 'textarea.tinymce',
      height: 480,
      menubar: false,
      plugins: 'link lists image code table media fullscreen',
      toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image media table | code fullscreen',
      content_css: false,
      content_style: 'body{font-family:system-ui,Segoe UI,Roboto,Arial; padding:1rem;}',
      convert_urls: false
    });
  }
});
