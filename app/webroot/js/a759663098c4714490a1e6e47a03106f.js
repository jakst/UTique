$(document).ready(function () {$("#submit-380023739").bind("click", function (event) {$.ajax({data:$("#submit-380023739").closest("form").serialize(), type:"post", url:"\/utique\/users\/register"});
return false;});});