$(document).ready(function() {
    var ctx = document.getElementById("myChart").getContext("2d");


    var data = window.data;

    var myBarChart = new Chart(ctx).Bar(data);



});