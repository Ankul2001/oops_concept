<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart(res, title) {
        var data = new google.visualization.DataTable();

           
        data.addColumn('string', 'Year');
        data.addColumn('number', 'Sales');
        $.each(res, function(i, res){
            var sales= parseInt(res.sale);
            var year= res.year;
            data.addRows([[year, sales]])
        })


        //   ['Sales', 'Year'],
        //   ["King's pawn (e4)", 44],
        //   ["Queen's pawn (d4)", 31],
        //   ["Knight to King 3 (Nf3)", 12],
        //   ["Queen's bishop pawn (c4)", 10],
        //   ['Other', 3]
        

        var options = {
            title: "Year Wise Sales Analysis",
            height: 700,
            hAxis: {title: 'Year'},
            vAxis: {title: 'Sales'}
        };
        var chart = new google.charts.Bar(document.getElementById('saleschart'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
  </head>
  <body>
    <div id="saleschart" style="width: 800px; height: 600px;"></div>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
        var title="Sales Analysis"
        $.ajax({
            type: "post",
            url: "code.php",
            data: {action: "getSales"},
            dataType: "JSON",
            success: function(res){
                console.log(res);
                drawChart(res, title);
            }
        })
    })
  </script>
</html>





