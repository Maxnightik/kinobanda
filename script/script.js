//select/remove category
$('.filter-category__item').on('click', function () {
    $(this).toggleClass('selected');
});


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
    //let url = page_link + '/pages/movie.php';
    //console.log(url);
    //window.location.replace(url);
    if (data.length > 0) {
        $.ajax({
            url: page_link + '/pages/movie.php',
            type: 'POST',
            data: { filter: data },
            success: function (data, status, xhr) {
                $('body').html(data);
                console.log($('html'));
                // $(location).attr('href', url);
            }
        })
        //$("#filter-form").submit();
    }

    console.log(categories);
    console.log(data);
})