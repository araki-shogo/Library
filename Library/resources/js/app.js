$('#delete').click(function() {
    const result = confirm('削除しますか？');
    if(result == false) {
        return false;
    }
})