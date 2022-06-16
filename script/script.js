//mark the first element
$(".filter-radio").eq(0).prop("checked", true);

//select/remove category
$(".filter-category__item").on("click", function () {
  $(this).toggleClass("selected");
});

//send filter form
$(".filter-btn").on("click", function (event) {
	$("main").removeClass('main-filter');
  event.preventDefault();
  //array for category filtering
  let categories = [];

  //cycle for category
  $(".filter-category__item").each(function () {
    //check whether the selected category
    if ($(this).hasClass("selected")) {
      //add id category to the array
      categories.push($(this).attr("data-category"));
    }
  });

  //get data values from form
  let data = $("#filter-form").serializeArray();
  //check whether a category has been selected
  if (categories.length > 0) {
    //add an array of categories to all data
    data.push({ categories: categories });
  }

  //get the name of the site
  let page_link = window.location.origin;

  //check if the filter is selected
  if (data.length > 0) {
    //request formation
    $.ajax({
      //the address to which the request will be sent
      url: page_link + "/pages/movie.php",
      //request method
      type: "POST",
      //data to send
      data: { filter: data },
      //when to get a successful answer
      success: function (data) {
        $("main").html(data);
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

// search process

$("#search__button").on('click', function(event) {
	$("main").removeClass('main-filter');
  let page_link = window.location.origin;
	let searchText = $("#search__input").val();
	if(searchText != "" && searchText != undefined) {
		$.ajax({
			url: page_link + "/pages/movie.php",
			method: "POST",
			data: {search__text: searchText},
			success: function (data) {
        $("main").html(data);
      }
		})
	}
})
