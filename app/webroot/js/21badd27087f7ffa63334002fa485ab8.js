$(document).ready(function () {$("#submit-207825144").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {<a href="/utique/carts/view" class="btn btn-default">Gå tillbaka</a> }, data:$("#submit-207825144").closest("form").serialize(), type:"post", url:"\/utique\/orders\/create_order"});
return false;});});