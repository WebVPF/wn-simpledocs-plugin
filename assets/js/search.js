const search = document.querySelector('[name="q"]');

search.addEventListener('input', () => {
    // result.style.display = 'none';
    let q = search.value;

    if (q.length >= 3) {
        console.log(q);

        $.request('onSearch', {
            data: {
                q: q
            },
            success: function(data) {
                

                console.log(data);
            },
            error: function(jqXHR, status) {                
                // let message = commentsApp.message('danger', '<strong>Произошла ошибка</strong>.');
                // commentsApp.btnShowForm.before(message);
            }
        });
    }
});
