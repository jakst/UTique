$(document).ready(function () {$("#submit-2018483971").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {<a href="/utique/carts/view" class="btn btn-default">Gå tillbaka</a> }, data:$("#submit-2018483971").closest("form").serialize(), type:"post", url:"\/utique\/orders\/create_order"});
return false;});});