$(document).ready(function () {
  //DataTable
  $("#sort").DataTable({
    order: [],
  });
  $("th,.sorting_asc").last().css("background", "none");
  $("th,.sorting_desc").last().css("background", "none");

  //sweet alert confirm delete
  $(".delete-btn").on("click", function (e) {
    e.preventDefault();

    const obj = $(this);
    const url = obj.attr("url");
    const rid = obj.attr("rid");
    const token = obj.attr("token");

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
        $.post(url,
          {
            id:rid,
            _token: token,
          },
          function (data) {
            switch (data.status) {
              case 1:
                obj.parent().parent().slideUp();
                swal("Deleted!", "Your data has been deleted.", "success");
                break;
              default:
                 swal("Error!", "Cannot deleted.", "error");
                break;
            }
          },
          "json"
        );
      }
    });
  });
});
