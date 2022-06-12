//mark the first element
$('.filter-radio').eq(0).prop('checked', true);

//select/remove category
$('.filter-category__item').on('click', function () {
    $(this).toggleClass('selected');
});

//send form
$('.filter-btn').on('click', function (event) {
    event.preventDefault();
    let categories = [];

    $('.filter-category__item').each(function () {
        if ($(this).hasClass('selected')) {
            categories.push($(this).attr('data-category'));
        }
    });

    let data = $("#filter-form").serializeArray();

    if (categories.length > 0) {
        data.push({ 'categories': categories });
    }

    let page_link = window.location.origin;

    if (data.length > 0) {
        $.ajax({
            url: page_link + '/pages/movie.php',
            type: 'POST',
            data: { filter: data },
            success: function (data) {
                $('body').html(data);
            }
        })
    }
})