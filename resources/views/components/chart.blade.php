@props([
    'type',
    'series',
    'title' => null,
    'id' => uniqid('_'),
])

<article>
    @if ($title)
        <h6>{{ $title }}</h6>
    @endif
    <div style="height: 300px; display: flex; justify-content: center; align-items: center;">
        <canvas data-chart="{{ collect([
            'type' => $type,
            'series' => $series,
            'noDataMessage' => 'No data',
        ]) }}"></canvas>
    </div>
</article>

@pushOnce('body-end')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('[data-chart]').forEach(el => drawChart(el))
        })

        document.addEventListener('resize', function () {
            Object.values(Chart.instances).forEach(chart => chart.resize())
        })
    </script>
@endPushOnce