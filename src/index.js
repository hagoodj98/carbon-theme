const footImage = document.querySelector("#footprint0");
const countryText = [
  {
    name: "North America",
    description:
      "In the first quarter of 2019, EIA estimates that U.S. energy-related emissions totaled 1,367 million metric tons (MMmt), which is nearly equal to those in the first quarter of 2018.",
  },

  {
    name: "Latin America",
    description:
      "Nearly half of all greenhouse gas emissions in Latin America and the Caribbean (LAC) are the result of land-use change, forestry, or agriculture. Between 2001 and 2012, the region lost 36 million hectares of forest and grassland to agricultural expansion.",
  },

  {
    name: "Africa",
    description:
      "Emissions rose 1.2 percent to 1.408 billion metric tonnes of carbon dioxide (CO2) equivalent from a year earlier, according to the  revised data published by the Ministry of Environment.",
  },
  {
    name: "China",
    description:
      "Close to 10,000 million metric tons of CO2 from burning fossil fuel were emitted by the superpower in 2017. On a per capita basis, China's CO2 emissions of 7.1 metric tons per person trail that of most countries on this list but still rank in the top 50 worldwide.",
  },
];

const footprints = document.querySelectorAll(".footprint");
footprints.forEach((footprint) => {
  footprint.addEventListener("mouseover", function (event) {
    const footprintId = event.currentTarget.id;
    const index = parseInt(footprintId.replace("footprint", ""));
    const country = countryText[index];
    const textBlock = document.querySelector("#textblock");
    textBlock.innerHTML = `
      <div class="country-text">
        <h2>${country.name}</h2>
        <p>${country.description}</p>
      </div>
    `;
  });
});
footprints.forEach((footprint) => {
  footprint.addEventListener("mouseleave", function (event) {
    const textBlock = document.querySelector("#textblock");
    textBlock.innerHTML = ``;
  });
});

function drawChart(footprintValue, averageValue) {
  const ctx = document.getElementById("myChart");
  if (!ctx) return;

  const xValues = ["You", "Average Person"];
  const yValues = [footprintValue, averageValue]; // Assuming 10 as the average footprint value
  const barColors = ["#f19d15", "#cccccc"];
  // Destroy existing chart if it exists before creating a new one
  const existingChart = Chart.getChart("myChart");
  if (existingChart) {
    existingChart.destroy();
  }
  const [youColor, averageColor] = barColors;
  // The ring is a 0-MAX_FOOTPRINT scale; at or above MAX_FOOTPRINT it is full
  const MAX_FOOTPRINT = 22000;
  // Draws the "You" arc over the gray track, starting at 12 o'clock
  const overlayArc = {
    id: "overlayArc",
    afterDatasetDraw(chart) {
      const arc = chart.getDatasetMeta(0).data[0];
      if (!arc) return;
      const share = Math.min(Math.max(yValues[0] / MAX_FOOTPRINT, 0), 1);
      const start = -Math.PI / 2;
      const c = chart.ctx;
      c.save();
      c.beginPath();
      c.arc(arc.x, arc.y, arc.outerRadius, start, start + share * Math.PI * 2);
      c.arc(
        arc.x,
        arc.y,
        arc.innerRadius,
        start + share * Math.PI * 2,
        start,
        true,
      );
      c.closePath();
      c.fillStyle = youColor;
      c.fill();
      c.restore();
    },
  };
  const shadow = {
    id: "customShadow",
    beforeDatasetsDraw(chart) {
      const { ctx } = chart;
      ctx.save();
      ctx.shadowColor = "rgba(0, 0, 0, 0.3)"; // Shadow color & transparency
      ctx.shadowBlur = 10; // Softness/blur radius
      ctx.shadowOffsetX = 40; // Horizontal displacement
      ctx.shadowOffsetY = 4; // Vertical displacement
    },
    afterDatasetsDraw(chart) {
      const { ctx } = chart;
      ctx.restore(); // Clean up the context so the shadow doesn't affect tooltips/legends
    },
  };
  const gradeBox = document.querySelector(".grade-chart-container");
  // Clear any grade class from a previous calculation
  gradeBox.classList.remove(
    "horrible",
    "bad",
    "meh",
    "good",
    "great",
    "excellent",
  );
  gradeBox.classList.remove("hidden");
  if (yValues[1] > 35000) {
    const getGradeHeader = document.querySelector(
      ".grade-chart-container .grade",
    );
    const getGradeExplanation = document.querySelector(
      ".grade-chart-container .grade-explanation",
    );
    getGradeHeader.textContent = "Horrible";
    getGradeExplanation.textContent =
      "Your carbon footprint is extremely high.";

    document.querySelector(".grade-chart-container").classList.add("horrible");
  } else if (yValues[1] > 22000) {
    const getGradeHeader = document.querySelector(
      ".grade-chart-container .grade",
    );
    getGradeHeader.textContent = "Bad";
    const getGradeExplanation = document.querySelector(
      ".grade-chart-container .grade-explanation",
    );
    getGradeExplanation.textContent =
      "Your carbon footprint is noticeably above average.";
    document.querySelector(".grade-chart-container").classList.add("bad");
  } else if (yValues[1] > 16000) {
    const getGradeHeader = document.querySelector(
      ".grade-chart-container .grade",
    );
    getGradeHeader.textContent = "Meh";
    const getGradeExplanation = document.querySelector(
      ".grade-chart-container .grade-explanation",
    );
    getGradeExplanation.textContent =
      "Your carbon footprint is around the average mark.";
    document.querySelector(".grade-chart-container").classList.add("meh");
  } else if (yValues[1] > 10000) {
    const getGradeHeader = document.querySelector(
      ".grade-chart-container .grade",
    );
    getGradeHeader.textContent = "Good";
    const getGradeExplanation = document.querySelector(
      ".grade-chart-container .grade-explanation",
    );
    getGradeExplanation.textContent = "Your carbon footprint is below average.";
    document.querySelector(".grade-chart-container").classList.add("good");
  } else if (yValues[1] > 5000) {
    const getGradeHeader = document.querySelector(
      ".grade-chart-container .grade",
    );
    getGradeHeader.textContent = "Great";
    const getGradeExplanation = document.querySelector(
      ".grade-chart-container .grade-explanation",
    );
    getGradeExplanation.textContent =
      "Your carbon footprint is well below average.";
    document.querySelector(".grade-chart-container").classList.add("great");
  } else {
    const getGradeHeader = document.querySelector(
      ".grade-chart-container .grade",
    );
    getGradeHeader.textContent = "Excellent";
    const getGradeExplanation = document.querySelector(
      ".grade-chart-container .grade-explanation",
    );
    getGradeExplanation.textContent = "Your carbon footprint is extremely low.";
    document.querySelector(".grade-chart-container").classList.add("excellent");
  }

  new Chart(ctx, {
    type: "doughnut",
    data: {
      labels: xValues,
      datasets: [
        {
          data: [1],
          backgroundColor: averageColor,
          borderWidth: 0,
        },
      ],
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: true,
          onClick: () => {},
          labels: {
            color: "white",
            generateLabels: () =>
              xValues.map((text, i) => ({
                text: `${text}: ${Number(yValues[i]).toLocaleString()}`,
                fillStyle: barColors[i],
                strokeStyle: barColors[i],
                hidden: false,
                fontColor: "white",
              })),
          },
        },
        tooltip: { enabled: false },
        title: {
          display: true,
          text: "Your Carbon Footprint",
          font: { size: 16 },
          color: "white",
        },
      },
    },
    plugins: [overlayArc, shadow],
  });
}

document
  .querySelector(".footprint-form")
  .addEventListener("submit", async function (event) {
    event.preventDefault();
    const getGradeContainer = document.querySelector(".grade-chart-container");
    getGradeContainer.classList.add("hidden");
    const formData = new FormData(this);
    const ajaxurl = "http://localhost:3000/wp-admin/admin-ajax.php";
    const response = await fetch(ajaxurl, {
      method: "POST",
      body: formData,
    });

    const data = await response.json();
    const existingChart = Chart.getChart("myChart");
    if (existingChart) {
      let ajaxUrl = my_ajax_object.ajax_url;
      if (ajaxUrl.startsWith("//")) {
        ajaxUrl = window.location.protocol + ajaxUrl;
      }
      const response = await fetch(ajaxUrl + "?success=1", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: "action=refresh_my_shortcode&success=1",
      });
      if (!response.ok) {
        console.error("Failed to refresh shortcode");
      }
      const refreshedContent = await response.text();
      document.querySelector(".footprint-form").innerHTML = refreshedContent;
    }
    if (Number.isFinite(Number(data.data.footprint))) {
      drawChart(Number(data.data.footprint), Number(data.data.average));
    }
  });
