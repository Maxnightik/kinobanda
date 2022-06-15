//mark the first element
$(".filter-radio").eq(0).prop("checked", true);

//select/remove category
$(".filter-category__item").on("click", function () {
  $(this).toggleClass("selected");
});

//send form
$(".filter-btn").on("click", function (event) {
  event.preventDefault();
  let categories = [];

  $(".filter-category__item").each(function () {
    if ($(this).hasClass("selected")) {
      categories.push($(this).attr("data-category"));
    }
  });

  let data = $("#filter-form").serializeArray();
  if (categories.length > 0) {
    data.push({ categories: categories });
  }

  let page_link = window.location.origin;

  if (data.length > 0) {
    $.ajax({
      url: page_link + "/pages/movie.php",
      type: "POST",
      data: { filter: data },
      success: function (data) {
        $("body").html(data);
      },
    });
  }
});

//send comment form
$("#comment-btn").on("click", function (event) {
  event.preventDefault();
  let page_link = window.location.origin;
  let commentText = $("#comment-area").val();
  let userId = $("#user-id").val();
  let movieId = $("#movie-id").val();

  if (userId > 0 && commentText != "" && movieId != "") {
    $.ajax({
      url: page_link + "/include/commentSend.php",
      method: "POST",
      data: { comment_value: commentText, user_id: userId, movie_id: movieId },
    });

    $.ajax({
      url: page_link + "/include/commentUpdate.php",
      success: function (data) {
        $("#comment_list").html(data);
      },
      timeout: 100,
    });
  }
});
