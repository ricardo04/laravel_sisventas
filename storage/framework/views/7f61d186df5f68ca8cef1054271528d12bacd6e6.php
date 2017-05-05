<button class="delete-photo" data-photo-id="modal-delete-<?php echo e($cat->idcategoria); ?>">Delete photo</button>

 <script>
  $('button.delete-photo').click(function() {
    var photoId = $(this).attr("data-photo-id");
    deletePhoto(photoId);
  });

  function deletePhoto(photoId) {
    swal({
      title: "Are you sure?", 
      text: "Are you sure that you want to delete this photo?", 
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      confirmButtonText: "Yes, delete it!",
      confirmButtonColor: "#ec6c62"
    }, function() {
      $.ajax({
        url: "/api/photos/" + photoId,
        type: "DELETE"
      })
      .done(function(data) {
        swal("Deleted!", "Your file was successfully deleted!", "success");
      })
      .error(function(data) {
        swal("Oops", "We couldn't connect to the server!", "error");
      });
    });
  }
  </script>