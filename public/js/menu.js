$(document).ready(function() {
    $('.dropdown').each(function (index, element) {
        $(element).on('click', dropdown)
    })
})

function dropdown (event) {
    $(event.target.parentNode).toggleClass('is--active')
}