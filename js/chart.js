// JavaScript Document
function drawChartIVT(itemName){
	google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', itemName);
      //data.addColumn('number', 'Transformers: Age of Extinction');

      data.addRows([
        [1, 80.8],
        [2, 69.5],
        [3,   57],
        [4, 18.8],
        [5, 17.6],
        [6, 13.6],
        [7, 12.3],
        [8, 29.2],
        [9, 42.9],
        [10,30.9],
        [11, 7.9],
        [12, 8.4],
        [13, 6.3],
        [14, 6.2]
      ]);

      var options = {
        chart: {
          title: '',
          subtitle: ''
        },
        width: 900,
        height: 300,
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
}