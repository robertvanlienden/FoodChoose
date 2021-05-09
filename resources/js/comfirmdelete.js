$('.delete').click(function(e){
    console.log('click');
    e.preventDefault()
    if (confirm('Are you sure?')) {
        $(e.target).closest('form').submit()
    }
});
