  let indexVal = 0;
  let domain = '';
  let records = data.map(item=> {
    let arr = Object.values(item);
    if(domain != item.domain){
      domain = item.domain
      indexVal++;
    }
      arr.splice(1, 0, indexVal);
      return arr;
  });
  records.unshift(['Domain', 'Index', 'Rank', 'Count']);
  console.log(records);
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable(records);
    var options = {
      sizeAxis: {maxSize: 4, minSize: 4}
    };
    var chart = new google.visualization.BubbleChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }