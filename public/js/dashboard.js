const ctx = document.getElementById("fishChart");

new Chart(ctx, {
    type: "pie",
    data: {
        labels: ["Mujair", "Lele", "Nila", "Patin"],
        datasets: [
            {
                data: [40, 25, 20, 15],
                backgroundColor: ["#007bff", "#28a745", "#20c997", "#6f42c1"],
                borderWidth: 1,
            },
        ],
    },
    options: {
        plugins: {
            legend: {
                display: false,
            },
        },
    },
});
