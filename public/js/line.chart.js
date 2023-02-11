const ctx = document.getElementById('chart_div');
const DATA_COUNT = 100;
const NUMBER_CFG = {
    count: DATA_COUNT,
    min: 0,
    max: 100
};

var COLORS = [
    '#4dc9f6',
    '#f67019',
    '#f53794',
    '#537bc4',
    '#acc236',
    '#166a8f',
    '#00a950',
    '#58595b',
    '#8549ba'
];

const color = function (index) {
    return COLORS[index % COLORS.length];
}
const transparentize = function (r, g, b, alpha) {
    const a = (1 - alpha) * 255;
    const calc = x => Math.round((x - a) / alpha);
    return `rgba(${calc(r)}, ${calc(g)}, ${calc(b)}, ${alpha})`;
}
let labels = [];
const datasets = [];
var dataValues = new Array(repetitions).fill(null);
let domain = '';
keywordData.forEach((a, b) => {
    labels = [
        ...labels,
        a.iteration
    ];
    if (domain != '' && domain != a.domain) {
        datasets.push({
            label: domain,
            data: [...dataValues], //Samples.utils.numbers(NUMBER_CFG).sort((a, b) => 0.5 - Math.random()),
            borderColor: color(b + 1),
            backgroundColor: transparentize(color(b + 1), 0.5),
            axis: 'y'
        });
        dataValues = new Array(+repetitions).fill(null);
    }
    dataValues.fill(a.rank, a.iteration - 1, a.iteration);
    domain = a.domain;
});
labels = [...new Set(labels)];
const data = {
    labels: labels,
    datasets: datasets
};
new Chart(ctx, {
    type: 'line',
    data: data,
    options: {
        plugins: {
            legend: {
                display: false,
                labels: {
                    color: 'rgb(255, 99, 132)'
                }
            }
        },
        indexAxis: 'y',
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Iterations'
                }
            },
            x: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Ranks'
                }
            }
        }
    }
});