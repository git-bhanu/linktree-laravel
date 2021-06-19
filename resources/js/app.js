require('./bootstrap');

console.log('Test');

$('.user-link').click(function (e) {
    // Store Visit

    var linkId = $(this).data('link-id');
    var linkUrl = $(this).attr('href');

    axios.post('/visit/' + linkId, {
        link: linkUrl
    })
    .then( response => console.log(response) )
    .catch( errors => console.log(errors) )
});
