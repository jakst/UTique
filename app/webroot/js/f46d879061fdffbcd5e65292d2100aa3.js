$(document).ready(function () {$("#submit-209115810").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {<a href="/utique/carts/view" class="btn btn-default">Gå tillbaka</a> }, data:$("#submit-209115810").closest("form").serialize(), type:"post", url:"\/utique\/orders\/create_order"});
return false;});});