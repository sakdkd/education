<html>
   <head>
      <title>Google Charts Tutorial</title>
      <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
      </script>
      <script type = "text/javascript">
         google.charts.load('current', {packages: ['corechart']});     
      </script>
   </head>
   
   <body>
      <div id = "container" style = "width: 550px; height: 800px; margin: 0 auto">
      </div>
      <script language = "JavaScript">
         function drawChart() {
			 

            // Define the chart to be drawn.
			 var datas=[];
			 var chartsdata=[];
 var Header= ['Year', 'Asia'];
 datas.push(Header);
 for (var i = 0; i < 50; i++) {
      var temp=[];
      temp.push(i);
      temp.push(i);
     datas.push(temp);
  }
  
  var data = new google.visualization.arrayToDataTable(datas);

          /*  var data = google.visualization.arrayToDataTable([
               ['Year', 'Asia'],
               ['2012',  900],
               ['2013',  1000],
               ['2014',  1170],
               ['2015',  1250],
               ['2016',  2630]
            ]);*/

            var options = {title: 'Population (in millions)', vAxis: {
        title: 'temps (ms)',
        viewWindowMode: 'explicit',
        viewWindow: {
         max: 40,
          min: 0,
        },
        gridlines: {
          count: 10,
        }
      }}; 

            // Instantiate and draw the chart.
            var chart = new google.visualization.BarChart(document.getElementById('container'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
      </script>
   </body>
</html>