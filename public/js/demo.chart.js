const ctx = document.getElementById('chart_div');
const labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun"];
const data = {
  labels: labels,
  datasets: [
    {
      label: 'Dataset 1',
      data: [1000, 2000, 1500, 1700, 2300, 2000],
      order: 1
    },
    {
      label: 'Dataset 2',
      data: [333, 500, 300, 650, 1150, 400],
      type: 'line',
      order: 0
    }
  ]
};
new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
      responsive: true,
        plugins: {
            legend: {
                display: false,
                labels: {
                    color: 'rgb(255, 99, 132)'
                }
            }
        },
        // indexAxis: 'y',
        scales: {
            y: {
                beginAtZero: false,
                reverse: false
            },
            x: {
                beginAtZero: true,
            }
        }
    }
});