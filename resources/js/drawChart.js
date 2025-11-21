import Chart from 'chart.js/auto'

export default function (target, onReady) {
    const { type, series, labelFormat, noDataMessage } = JSON.parse(target.dataset.chart)
    const labels = []
    const datasets = []

    if (typeof Object.values(series)[1] === 'number') {
        Object.assign(series, { '': series })
    }

    for (const [label, serie] of Object.entries(series)) {
        const data = Object.keys(serie).reduce(function (data, label) {
            const value = serie[label]

            if (!isNaN(value)) {
                data.push(value)
            }

            if (!labels.includes(label)) {
                labels.push(label)
            }

            return data
        }, [])

        if (!data.filter(Boolean).length) {
            continue
        }

        datasets.push({
            data,
            label,
            tension: 0.5,
            hoverBackgroundColor: 'white',
            hoverBorderColor: 'black',
        })
    }

    const config = {
        type,
        responsive: true,
        maintainAspectRatio: false,
        data: { labels, datasets },
        hover: { intersect: true },
        options: {
            scales: false,
            interaction: { mode: 'index', intersect: false },
            plugins: {
                title: false,
                tooltip: { displayColors: false },
                legend: {
                    position: 'bottom',
                    labels: { boxWidth: 12 },
                },
            },
        },
        plugins: [{
            id: 'drawEmpty',
            afterDraw({ canvas, ctx, data }) {
                const hasData = data.datasets.some(({ data }) => Array.isArray(data) && data.some(Boolean))

                if (!hasData) {
                    const { parentNode, height, width } = canvas
                    const { color, font } = getComputedStyle(parentNode)

                    ctx.save()

                    ctx.fillStyle = '#ffffff'
                    ctx.fillRect(0, 0, width, height)

                    ctx.font = font
                    ctx.fillStyle = color
                    ctx.textAlign = 'center'
                    ctx.textBaseline = 'middle'
                    ctx.fillText(noDataMessage, width / 2, height / 2)

                    ctx.restore()
                }
            }
        }]
    }

    if (config.data.datasets.length < 2) {
        config.options.plugins.legend = false
    }

    if (labelFormat) {
        config.options.plugins.tooltip.callbacks = {
            label: item => new Function(`return ${labelFormat}(${item.raw})`)()
        }
    }

    if (type == 'doughnut') {
        config.options.cutout = '80%'
        config.options.plugins.legend = false
    }

    if (['bar', 'line'].includes(type)) {
        config.options.scales = {
            x: { grid: { display: false } },
            y: { grid: { display: false } },
        }
    }

    const chart = new Chart(target, config)

    if (typeof onReady === 'function') {
        return onReady(chart)
    }

    return chart
}