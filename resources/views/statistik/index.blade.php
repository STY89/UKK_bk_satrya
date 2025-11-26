@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Statistik Pelanggaran</h1>

     <p class="mt-2 mb-4">
    <strong>INI ADALAH HALAMAN STATISTIK</strong> yaitu halaman yang bertujuan untuk 
    menunjukkan berbagai pelanggaran yang ada di sekolah. Halaman ini juga berfungsi 
    untuk mendata serta menganalisis pelanggaran yang dilakukan oleh siswa.
</p>


    <!-- Chart.js -->
    <canvas id="pieChart" width="400" height="400"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('pieChart').getContext('2d');
const pieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: @json($keterangan), // kategori
        datasets: [{
            data: @json($persentase), // pakai persentase langsung
            backgroundColor: [
                '#ffffffff',
                '#36A2EB',
                '#FFCE56',
                '#4BC0C0',
                '#9966FF',
                '#FF9F40'
            ],
        }]
    },
    options: {
        responsive: false,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        let index = context.dataIndex;
                        let label = context.label;
                        let percent = context.raw; // sekarang data = persen
                        return `${label}: ${percent}%`;
                    }
                }
            }
        }
    }
});
</script>

  

@endsection
