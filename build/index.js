/******/ (() => { // webpackBootstrap
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
const footImage = document.querySelector("#footprint0");
const countryText = [{
  name: "North America",
  description: "In the first quarter of 2019, EIA estimates that U.S. energy-related emissions totaled 1,367 million metric tons (MMmt), which is nearly equal to those in the first quarter of 2018."
}, {
  name: "Latin America",
  description: "Nearly half of all greenhouse gas emissions in Latin America and the Caribbean (LAC) are the result of land-use change, forestry, or agriculture. Between 2001 and 2012, the region lost 36 million hectares of forest and grassland to agricultural expansion."
}, {
  name: "Africa",
  description: "Emissions rose 1.2 percent to 1.408 billion metric tonnes of carbon dioxide (CO2) equivalent from a year earlier, according to the  revised data published by the Ministry of Environment."
}, {
  name: "China",
  description: "Close to 10,000 million metric tons of CO2 from burning fossil fuel were emitted by the superpower in 2017. On a per capita basis, China's CO2 emissions of 7.1 metric tons per person trail that of most countries on this list but still rank in the top 50 worldwide."
}];
const footprints = document.querySelectorAll(".footprint");
footprints.forEach(footprint => {
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
footprints.forEach(footprint => {
  footprint.addEventListener("mouseleave", function (event) {
    const textBlock = document.querySelector("#textblock");
    textBlock.innerHTML = ``;
  });
});
/******/ })()
;
//# sourceMappingURL=index.js.map