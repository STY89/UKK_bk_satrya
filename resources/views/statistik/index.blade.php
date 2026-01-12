@extends('dashboard.menu')

@section('content')

<h2 class="text-2xl font-bold text-blue-700 mb-4">
  📊 Statistik Pelanggaran
</h2>

<p class="mt-2 mb-6 text-gray-600">
  <strong>INI ADALAH HALAMAN STATISTIK</strong> yaitu halaman yang bertujuan untuk 
  menunjukkan berbagai pelanggaran yang ada di sekolah. Halaman ini juga berfungsi 
  untuk mendata serta menganalisis pelanggaran yang dilakukan oleh siswa.
</p>

<div class="flex justify-center">
  <div class="w-[400px] h-[400px]">
    <canvas id="pieChart"></canvas>
  </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('pieChart').getContext('2d');

new Chart(ctx, {
    type: 'pie',
    data: {
        labels: @json($keterangan),
        datasets: [{
            data: @json($persentase),
            backgroundColor: [
                '#b62222',
                '#36A2EB',
                '#FFCE56',
                '#4BC0C0',
                '#9966FF',
                '#FF9F40'
            ],
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return context.label + ': ' + context.raw + '%';
                    }
                }
            }
        }
    }
});
</script>

@endsection
