$(document).ready(function () {$("#submit-48721228").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {<a href="/utique/carts/view" class="btn btn-default">Gå tillbaka</a> }, data:$("#submit-48721228").closest("form").serialize(), type:"post", url:"\/utique\/orders\/create_order"});
return false;});});