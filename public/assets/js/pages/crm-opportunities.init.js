$(document).ready(function(){function c(){$("#status-chart").sparkline([20,40,30,10,28],{type:"pie",width:"220",height:"220",sliceColors:t})}var e,t=["#4fc6e1","#6658dd","#f7b84b","#f1556c","#1abc9c"],i=$("#status-chart").data("colors");i&&(t=i.split(","));c(),$(window).resize(function(t){clearTimeout(e),e=setTimeout(function(){c()},300)})});