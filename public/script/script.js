function sortBy(value) {
    let curentUrl = window.location.href
    let arrUrl = curentUrl.split('&');
    let variable_get = [];
    const new_arr = arrUrl.filter(function (item) {
        variable_get = item.split('=');
        if (variable_get.length > 0 && variable_get[0] == 'sort-by') {
            return false
        } else {
            return true
        }
    })
    curentUrl = new_arr.join('&')
    window.location.href = curentUrl + '&sort-by=' + value ;
}
