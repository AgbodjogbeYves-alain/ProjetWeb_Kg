<br><br>
<div class="ui negative message">
  <i class="close icon"></i>
  <div class="header">
    Attention!!!!!
  </div>
  <p><?php echo $error;?></p>
</div>

<script>
$('.message .close')
  .on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')
    ;
  })
;

</script>
