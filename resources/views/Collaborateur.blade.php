@extends('layouts.app')

@section('title', 'Tableau de bord RH')

@section('content')
    <div class=" col-span-12 md:col-span-8 px-4 py-8">
        <!-- HEADER + NAVIGATION -->
        <div class="mb-3">
            <h1 class="text-3xl font-bold text-gray-900  ml-3">Tableau de Bord RH</h1>
            <!--nav class="flex space-x-4 text-blue-600 font-medium">
                <a href="{{ route('postes.index') }}" class="hover:underline"> Fiches de poste</a>
                <a href="#" class="hover:underline"> Absences / Congés</a>
                <a href="#" class="hover:underline"> Documents RH</a>
                <a href="#" class="hover:underline"> Formations et Évaluations</a>
            </--nav-->
        </div>
        <livewire:rh.collaborateur-filter />

        <!-- Pagination -->
        <div class="mt-4 flex justify-center">
            {{ $collaborateurs->links() }}
        </div>

        <div class="mt-6 flex justify-center">
            <a href="{{ route('collaborateurs.create') }}"
               class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700 transition duration-300">
                + Ajouter un collaborateur
            </a>
        </div>
    </div>
    <div class="flex flex-col  col-span-12 lg:col-span-4 lg:h-1/3">
    <div class="bg-white text-center text-amber-300 text-2xl shadow-lg w-full  mt-28 rounded-lg grid grid-cols-1 mb-10">

    <div class="h-80" wire:ignore>
         <canvas id="statusChart" class="w-full h-full"></canvas>
          <script>
  const ctx = document.getElementById('statusChart').getContext('2d');

  const statusChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Approuvées', 'Refusées', 'En attente'],
                datasets: [{
            data: [1,1,1],
                    backgroundColor: ['#B4F7AF', '#EFD3ED', '#8FEAC0'],
                    borderWidth: 0,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true,
                            font: { size: 10 }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Répartition des Ressources',
                        font: { size: 12, weight: 'bold' }
                    }
                },
                elements: {
                    arc: {
                        borderWidth: 0
                    }
                }
            },
            plugins: [{
                beforeDraw: function(chart) {
                    const width = chart.width,
                          height = chart.height,
                          ctx = chart.ctx;

                    ctx.restore();
                    const fontSize = (height / 150).toFixed(2);
                    ctx.font = fontSize + "em sans-serif";
                    ctx.textBaseline = "middle";
                    ctx.fillStyle = "#374151";

                    const total = 3;
                    const text = total,
                          textX = Math.round((width - ctx.measureText(text).width) / 2.04),
                          textY = height / 2.05;

                    ctx.fillText(text, textX, textY - 10);
                    ctx.font = (fontSize * 0.6) + "em sans-serif";
                    ctx.fillText("Total", textX-5, textY + 20);
                    ctx.save();
                }
            }]
        });
</script>
    </div>
    </div>
    <div class="bg-white text-center text-amber-300 text-2xl shadow-lg w-full   rounded-lg grid grid-cols-1 mb-10">
    <div class="relative h-96 w-full">
                <canvas id="lineChart" class="w-full h-full"></canvas>
                <script>
const lineCtx = document.getElementById('lineChart').getContext('2d');

const chartData = {
    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
    datasets: [
        {
            label: 'Total Employés',
            data: [45, 48, 52, 55, 58,100],
            borderColor: '#6366f1',
            backgroundColor: 'rgba(99, 102, 241, 0.1)',
            borderWidth: 3,
            fill: false,
            tension: 0.4,
            pointBackgroundColor: '#6366f1',
            pointBorderColor: '#ffffff',
            pointBorderWidth: 2,
            pointRadius: 6,
            pointHoverRadius: 8
        },
        {
            label: 'Présents',
            data: [42, 46, 48],
            borderColor: '#10b981',
            backgroundColor: 'rgba(16, 185, 129, 0.1)',
            borderWidth: 3,
            fill: false,
            tension: 0.4,
            pointBackgroundColor: '#10b981',
            pointBorderColor: '#ffffff',
            pointBorderWidth: 2,
            pointRadius: 5,
            pointHoverRadius: 7
        },
        {
            label: 'Absents',
            data: [3, 2, 4, 3, 3, 3, 3, 4, 3, 3, 3, 3],
            borderColor: '#ef4444',
            backgroundColor: 'rgba(239, 68, 68, 0.1)',
            borderWidth: 3,
            fill: false,
            tension: 0.4,
            pointBackgroundColor: '#ef4444',
            pointBorderColor: '#ffffff',
            pointBorderWidth: 2,
            pointRadius: 5,
            pointHoverRadius: 7
        }
    ]
};

const config = {
    type: 'line',
    data: chartData,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: true,
                position: 'top',
                labels: {
                    padding: 20,
                    usePointStyle: true,
                    font: { size: 12 }
                }
            },
            tooltip: {
                backgroundColor: 'rgba(255, 255, 255, 0.95)',
                titleColor: '#374151',
                bodyColor: '#374151',
                borderColor: '#e5e7eb',
                borderWidth: 1,
                cornerRadius: 8,
                displayColors: true,
                titleFont: {
                    size: 14,
                    weight: 'bold'
                },
                bodyFont: {
                    size: 13
                },
                padding: 12
            }
        },
        scales: {
            x: {
                grid: {
                    display: true,
                    color: 'rgba(229, 231, 235, 0.5)',
                    drawBorder: false
                },
                ticks: {
                    color: '#6b7280',
                    font: {
                        size: 12,
                        weight: '500'
                    }
                }
            },
            y: {
                beginAtZero: true,
                grid: {
                    display: true,
                    color: 'rgba(229, 231, 235, 0.5)',
                    drawBorder: false
                },
                ticks: {
                    color: '#6b7280',
                    font: {
                        size: 12,
                        weight: '500'
                    }
                }
            }
        },
        interaction: {
            intersect: false,
            mode: 'index'
        },
        hover: {
            animationDuration: 200
        },
        animation: {
            duration: 1000,
            easing: 'easeInOutCubic'
        }
    }
};

const lineChart = new Chart(lineCtx, config);
</script>
    </div>
    </div>
    </div>
    @if (session('success') || session('danger'))
        <div
            id="flash-message"
            class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 px-6 py-4 rounded-md shadow-lg text-white text-center
                {{ session('success') ? 'bg-green-500' : 'bg-red-500' }}"
            role="alert"
        >
            @if (session('success')) ✅ {{ session('success') }} @endif
            @if (session('danger')) ❌ {{ session('danger') }} @endif
        </div>

        <script>
            setTimeout(() => {
                const toast = document.getElementById('flash-message');
                if (toast) {
                    toast.style.opacity = '0';
                    toast.style.transition = 'opacity 0.5s';
                    setTimeout(() => toast.remove(), 500);
                }
            }, 3000);
        </script>
    @endif
@endsection
