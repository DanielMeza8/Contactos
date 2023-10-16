<!DOCTYPE html>
<html>
<head>
    <title>Gráfica de Pastel</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    
    <div style="width: 500px; height: 500px;">
        <canvas id="myChart"></canvas>
    </div>
      

    <script>
        // $(document).ready(function () {
            const gdata = JSON.parse(`<?php echo $data; ?>`);
            // console.log(data);
            const ctx = document.getElementById('myChart');
        
            const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: gdata.label,
                    datasets: [{
                    label:'Cant Amigos categorias',
                    data: gdata.data,
                    borderWidth: 1
                }],
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
            });
        // })
    </script>
</body>
</html>