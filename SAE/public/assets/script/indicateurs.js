// compte le nombre de même réponses à une question
function countResponses(responses) {
    return responses.reduce((counts, response) => {
        counts[response] = (counts[response] || 0) + 1;
        return counts;
    }, {});
}

const countedQ1 = countResponses(surveyData.q1);
const countedQ2 = countResponses(surveyData.q2);
const countedQ3 = countResponses(surveyData.q3);

console.log(countedQ1);
console.log(countedQ2);
console.log(countedQ3);

const dataQ1 = Object.entries(countedQ1).map(([key, value]) => ({ category: key, count: value }));

const width = 450;
const height = 450;
const radius = Math.min(width, height) / 2;

//CAMEMBERT
const svgPie = d3.select("#pie-chart")
    .append("svg")
    .attr("width", width)
    .attr("height", height)
    .append("g")
    .attr("transform", `translate(${width / 2}, ${height / 2})`);

const color = d3.scaleOrdinal(d3.schemeCategory10);

const pie = d3.pie().value(d => d.count);
const arc = d3.arc().innerRadius(0).outerRadius(radius);

const arcs = svgPie.selectAll("arc")
    .data(pie(dataQ1))
    .enter()
    .append("g")
    .attr("class", "arc");

arcs.append("path")
    .attr("d", arc)
    .attr("fill", d => color(d.data.category));

arcs.append("text")
    .attr("transform", d => `translate(${arc.centroid(d)})`)
    .attr("dy", ".35em")
    .text(d => d.data.category);

//HITOGRAMME EN BATON
const dataQ2 = Object.entries(countedQ2).map(([key, value]) => ({ category: key, count: value }));

const marginBar = { top: 30, right: 30, bottom: 70, left: 60 };
const widthBar = 460 - marginBar.left - marginBar.right;
const heightBar = 400 - marginBar.top - marginBar.bottom;

const svgBar = d3.select("#bar-chart")
    .append("svg")
    .attr("width", widthBar + marginBar.left + marginBar.right)
    .attr("height", heightBar + marginBar.top + marginBar.bottom)
    .append("g")
    .attr("transform", `translate(${marginBar.left},${marginBar.top})`);

const xBar = d3.scaleBand()
    .range([0, widthBar])
    .domain(dataQ2.map(d => d.category))
    .padding(0.2);

svgBar.append("g")
    .attr("transform", `translate(0,${heightBar})`)
    .call(d3.axisBottom(xBar))
    .selectAll("text")
    .attr("transform", "translate(-10,0)rotate(-45)")
    .style("text-anchor", "end");

const yBar = d3.scaleLinear()
    .domain([0, d3.max(dataQ2, d => d.count)])
    .range([heightBar, 0]);

svgBar.append("g").call(d3.axisLeft(yBar));

svgBar.selectAll(".bar")
    .data(dataQ2)
    .enter()
    .append("rect")
    .attr("class", "bar")
    .attr("x", d => xBar(d.category))
    .attr("y", d => yBar(d.count))
    .attr("width", xBar.bandwidth())
    .attr("height", d => heightBar - yBar(d.count))
    .attr("fill", "#69b3a2");

// TABLEAU
const dataQ3 = Object.entries(countedQ3).map(([key, value]) => ({ response: key, count: value }));

const tbody = d3.select("#response-table tbody");

dataQ3.forEach(row => {
    tbody.append("tr")
        .html(`<td>${row.response}</td><td>${row.count}</td>`);
});
