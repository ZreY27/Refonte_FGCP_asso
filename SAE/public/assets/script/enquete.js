const questions = [
    {
        question: "Avez-vous déjà donné votre sang ?",
        choices: [
            "Oui, régulièrement",
            "Oui, une fois",
            "Non, jamais",
            "Je ne peux pas donner mon sang"
        ]
    },
    {
        question: "Êtes-vous inscrit comme donneur d'organes ?",
        choices: [
            "Oui",
            "Non, mais je souhaite m'inscrire",
            "Non, je ne souhaite pas",
            "Je ne sais pas comment faire"
        ]
    },
    {
        question: "Avez-vous parlé du don d'organes avec votre famille ?",
        choices: [
            "Oui, nous en avons discuté en détail",
            "Oui, brièvement",
            "Non, pas encore",
            "Non, je ne souhaite pas en parler"
        ]
    },
    {
        question: "Connaissez-vous quelqu'un qui a reçu une greffe ?",
        choices: [
            "Oui, dans ma famille proche",
            "Oui, parmi mes amis",
            "Oui, dans mon entourage éloigné",
            "Non, personne"
        ]
    },
    {
        question: "Quelle est votre connaissance du processus de don d'organes ?",
        choices: [
            "Très bonne connaissance",
            "Connaissance moyenne",
            "Connaissance limitée",
            "Aucune connaissance"
        ]
    },
    {
        question: "Participez-vous à des événements de sensibilisation au don d'organes ?",
        choices: [
            "Oui, régulièrement",
            "Oui, occasionnellement",
            "Non, mais je suis intéressé(e)",
            "Non, cela ne m'intéresse pas"
        ]
    },
    {
        question: "Suivez-vous l'actualité concernant les greffes et dons d'organes ?",
        choices: [
            "Oui, très attentivement",
            "Oui, de temps en temps",
            "Rarement",
            "Jamais"
        ]
    },
    {
        question: "Avez-vous déjà fait un don financier à une association liée aux greffes ?",
        choices: [
            "Oui, régulièrement",
            "Oui, une fois",
            "Non, mais j'y pense",
            "Non, je ne souhaite pas"
        ]
    },
    {
        question: "Seriez-vous prêt(e) à devenir bénévole dans une association ?",
        choices: [
            "Oui, je le suis déjà",
            "Oui, je suis intéressé(e)",
            "Peut-être plus tard",
            "Non, ce n'est pas pour moi"
        ]
    },
    {
        question: "Comment préférez-vous recevoir des informations sur le don d'organes ?",
        choices: [
            "Par email",
            "Par les réseaux sociaux",
            "Par courrier postal",
            "Je ne souhaite pas recevoir d'informations"
        ]
    }
];

let currentQuestion = 0;
let answers = new Array(questions.length).fill(null);
let questionContainer, progress, prevBtn, nextBtn;

document.addEventListener('DOMContentLoaded', function() {
    questionContainer = document.getElementById('questionContainer');
    progress = document.getElementById('progress');
    prevBtn = document.getElementById('prevBtn');
    nextBtn = document.getElementById('nextBtn');

    // Ajouter des écouteurs d'événements pour les boutons de navigation
    prevBtn.addEventListener('click', previousQuestion);
    nextBtn.addEventListener('click', nextQuestion);

    // Ajouter un écouteur d'événements pour la délégation d'événements
    questionContainer.addEventListener('click', function(event) {
        if (event.target.classList.contains('choice-btn')) {
            const choiceIndex = Array.from(event.target.parentNode.children).indexOf(event.target);
            selectChoice(choiceIndex);
        }
    });

    displayQuestion(0);
});

function displayQuestion(index) {
    questionContainer.innerHTML = `
        <div class="question active">
            <h2>${questions[index].question}</h2>
            <div class="choices">
                ${questions[index].choices.map((choice, i) => `
                    <button class="choice-btn">${choice}</button>
                `).join('')}
            </div>
        </div>
    `;

    // Restaurer la sélection précédente si elle existe
    if (answers[index] !== null) {
        const choices = document.querySelectorAll('.choice-btn');
        choices[answers[index]].style.background = '#e75480';
        choices[answers[index]].style.color = 'white';
    }

    updateNavButtons();
    updateProgress();
}

function selectChoice(choiceIndex) {
    const choices = document.querySelectorAll('.choice-btn');

    // Réinitialiser tous les boutons
    choices.forEach(choice => {
        choice.style.background = 'white';
        choice.style.color = 'black';
    });

    // Mettre en surbrillance le choix sélectionné
    choices[choiceIndex].style.background = '#e75480';
    choices[choiceIndex].style.color = 'white';

    // Enregistrer la réponse
    answers[currentQuestion] = choiceIndex;

    // Mettre à jour les boutons de navigation
    updateNavButtons();
}

function updateNavButtons() {
    // Activer/désactiver le bouton Précédent
    prevBtn.disabled = currentQuestion === 0;

    // Activer le bouton Suivant uniquement si un choix est sélectionné
    nextBtn.disabled = answers[currentQuestion] === null;

    // Désactiver le bouton Suivant à la dernière question si un choix est sélectionné
    if (currentQuestion === questions.length - 1) {
        nextBtn.textContent = 'Terminer';
    } else {
        nextBtn.textContent = 'Suivant →';
    }
}

function updateProgress() {
    const progressPercent = ((currentQuestion + 1) / questions.length) * 100;
    progress.style.width = `${progressPercent}%`;
}

function nextQuestion() {
    // Vérifier si un choix est sélectionné
    if (answers[currentQuestion] !== null) {
        // Si ce n'est pas la dernière question, passer à la suivante
        if (currentQuestion < questions.length - 1) {
            currentQuestion++;
            displayQuestion(currentQuestion);
        } else {
            // Dernière question : soumettre le formulaire ou afficher un résumé
            submitQuestionnaire();
        }
    }
}

function previousQuestion() {
    if (currentQuestion > 0) {
        currentQuestion--;
        displayQuestion(currentQuestion);
    }
}
// Redirection à la fin du questionnaire
function submitQuestionnaire() {
    // Logique de soumission du questionnaire
    console.log('Questionnaire terminé', answers);
    alert('Merci d\'avoir complété le questionnaire !');
    window.location.href = "index.php";
}
