$(document).ready(function(){
    $("#descend").change(function(){
        var items = $(".element");
        items.sort(function(a, b) {
            return a.title == b.title ? 0
                : (a.title > b.title ? 1 : -1);
        });
        list = document.getElementById('list')
        while (list.hasChildNodes()) {
            list.removeChild(list.firstChild);
         }
        for (i = 0; i < items.length; ++i) {
            list.appendChild(items[i]);
        }
    });
    $("#ascend").change(function(){
        var items = $(".element");
        items.sort(function(a, b) {
            return a.title == b.title ? 0
                : (a.title < b.title ? 1 : -1);
        });
        list = document.getElementById('list')
        while (list.hasChildNodes()) {
            list.removeChild(list.firstChild);
         }
        for (i = 0; i < items.length; ++i) {
            list.appendChild(items[i]);
        }
    });
});