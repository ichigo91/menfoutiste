  $(function() {
    tinymce.init({
    selector: '.talentdesc',
    content_css : "/webroot/css/custom_content.css",
    width: 360,
    height: 100,
    branding: false,
    extended_valid_elements: 'a[id|class|!href|border|alt|title|width|height|style|onmouseover|onmouseout|onclick]',
    statusbar: false,
    menubar: '',
    toolbar1: 'insertfile undo redo | quete | recompense',
    plugins: "paste",
    paste_as_text: true,
    setup: function(editor) {
editor.addButton('quete', {
  text: "Quête",
  onclick: function () {
    editor.insertContent('<img src="'+PATH+'theme/quest.png" class="img_quest"><span class="quest">&nbsp;Quête :</span>&nbsp;');
  }
});
editor.addButton('recompense', {
  text: "Récompense",
  onclick: function () {
     editor.insertContent('<img src="'+PATH+'theme/quest.png" class="img_quest"><span class="quest">&nbsp;Récompense :</span>&nbsp;');
  }
});
  }

});
});