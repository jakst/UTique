$(document).ready(function () {$("#submit-1585421530").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {<a href="/utique/carts/view" class="btn btn-default">Gå tillbaka</a> }, data:$("#submit-1585421530").closest("form").serialize(), type:"post", url:"\/utique\/orders\/create_order"});
return false;});});