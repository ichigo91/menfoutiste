<button id="b1" onclick="t('1')">Open Modal</button>
<div id="m1" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>
</div>

<button id="b2" onclick="t('2')">Open Modal2</button>
<div id="m2" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..2</p>
  </div>
</div>

<script type="text/javascript">
function t(id){
  var modal = document.getElementById('m'+id);
  var span = document.getElementsByClassName("close")[0];
  modal.style.display = "block";
  span.onclick = function() {
      modal.style.display = "none";
  }
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
}
</script>