<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<style>
    .card-body{
        position: relative;
        height: 500px;
        width: 100%;
    }
    canvas{
        width: 100% !important;
        height: 500px !important;
    }
</style>
<nav class="navbar navbar-expand-lg" style="background-color: #1D0CD1">
        <div class="container-fluid">
           <ul class="nav justify-content-start">
             <a href="#" class="navbar-brand" style="cursor: default;">
                 <img src="../assets/Logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
             </a>
             <li class="nav-item">
                 <a class="nav-link active" href="home" style="color: white;">Home</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link active" href="data_siswa" style="color: white;">Siswa</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link active" href="data_guru" style="color: white;">Pembimbing</a>
             </li>
           </ul>
           <ul class="nav justify-content-end">
             <li class="nav-item">
                <a class="nav-link active" href="/" style="color: white;">Logout</a>
             </li>
           </ul>
        </div>
</nav>
    <div class="container mt-5">
     <h2 class="text-center">User chart</h2>
     <div class="card">
         <div class="card-body">
             <div class="chart-container" style="width: 100%; height: 500px">
               <canvas id="myChart"></canvas>
             </div>
         </div>
     </div>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let chartInstance;

        // function createChart(){
        //     const ctx = documen.getElementById('myChart').getContext('2d');

        //     if (chartInstance) {
        //         chartInstance.destroy();
        //     }
        // }

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Pembimbing","Siswa"],
                datasets: [{
                    label: 'total user',
                    data: [37, 50],
                    backgroundColor: ['rgba(237, 206, 46, 1)','rgba(29, 240, 121, 0.8)'],
                    borderColor: ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    x: {
                        ticks: {
                            padding: 15
                        }
                    }
                },
                // plugins: {
                //     legend: {
                //         labels: {
                //             usePointStyle: true,
                //             boxWidth: 20,
                //             boxHeight: 20
                //         }
                //     }
                // }
            }
        });
    });
</script>

</body>
</html>