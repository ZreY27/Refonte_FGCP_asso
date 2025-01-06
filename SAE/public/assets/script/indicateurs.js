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