function countResponses(responses) {
    return responses.reduce((counts, response) => {
        counts[response] = (counts[response] || 0) + 1;
        return counts;
    }, {});
}

