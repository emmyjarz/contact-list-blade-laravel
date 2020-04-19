$(document).ready(function () {
    //DataTable
  $("#sort").DataTable();
  $("th,.sorting_asc").last().css("background", "none");
  $("th,.sorting_desc").last().css("background", "none");

  //sweet alert confirm delete
  $(".delete-button").on("click", function (e) {
    e.preventDefault();
    swal({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.value) {
        e.currentTarget.form.submit();
        swal("Deleted!", "Your file has been deleted.", "success");
      }
    });
  });
});
