function Bar_Chartjs (contenedor,labels,labeltitle,datacontent,titlechart){
    new Chart(contenedor, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: labeltitle,
                data: datacontent,
                backgroundColor : [
                    '#f3e5ab',
                    '#ffc0cb',
                    '#87ceeb',
                    '#98fb98',
                    '#ffdab9',
                    '#f3e5ab',
                    '#98eede',
                    '#d8bfd8',
                    '#a0d8ef',
                    '#ffd700',
                    '#c1e1c1',
                    '#ffdab9',
                    '#eaeaea',
                    '#ffdab9',
                    '#add8e6',
                    '#cdecb8',
                    '#e6e6fa',
                    '#b0e0e6',
                    '#ffef96',
                    '#ffb6c1',
                    '#d0f0c0',
                    '#afeeee',
                    '#fdd5b1',
                    '#ffdab9',
                    '#afeeee',
                    '#f08080',
                    '#d3d3d3',
                    '#f3e5ab',
                    'skyblue',
                    '#f0f8ff'
                ],
                borderColor : [
                    '#ffc0cb',
                    '#87ceeb',
                    '#f3e5ab',
                    '#98fb98',
                    '#ffdab9',
                    '#f3e5ab',
                    '#98eede',
                    '#d8bfd8',
                    '#a0d8ef',
                    '#ffd700',
                    '#c1e1c1',
                    '#ffdab9',
                    '#eaeaea',
                    '#ffdab9',
                    '#add8e6',
                    '#cdecb8',
                    '#e6e6fa',
                    '#b0e0e6',
                    '#ffef96',
                    '#ffb6c1',
                    '#d0f0c0',
                    '#afeeee',
                    '#fdd5b1',
                    '#ffdab9',
                    '#afeeee',
                    '#f08080',
                    '#d3d3d3',
                    '#f3e5ab',
                    'skyblue',
                    '#f0f8ff'
                ]
            }]
        },
        options: {
            // indexAxis: indexAxis,
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                title: {
                    display: true,
                    text: titlechart
                },
                // mostrar tootips correspondiente a cada celda donde estan las barras
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: function (context) {
                            if (indexAxis === "x") {
                                return `Value: ${context.parsed.y}`;
                                
                            }else{
                                return `Value: ${context.parsed.x}`;

                            }
                        },
                        title: function (tooltipItem) {
                            return labeldata[tooltipItem[0].index];
                        },
                    },
                },
                scales:{
                    x:{
                        ticks: {color: 'rgba(0, 0, 0, 0.5)'}
                    }
                }
            }
        },
    })
}