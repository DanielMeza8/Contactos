<!DOCTYPE html>
<html>
<head>
    <title>Gráfica de Pastel</title>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/Chart.min.js') }}"></script>
</head>
<body>
    <div style="width: 500px; height: 500px;">
        <canvas id="graficaPastel"></canvas>
    </div>
    <script>
        $(document).ready(function(){
            var data = {!! json_encode($data) !!};
            var ctx = document.getElementById("graficaPastel").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: data.labels,
                    datasets: [{
                        data: data.values,
                        backgroundColor: data.colors,
                    }],
                },
            });
        });
    </script>
</body>
</html>
