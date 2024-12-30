<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/img/accueil/logo_FGCP.png">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="assets/style/enquete.css">
    <!--<script language="JavaScript" src="../script/enquete.js" type="module"></script>-->


    <title>Questionnaire - France Greffe Coeurs et Poumons</title>
</head>


<?php require 'header.php'; ?>

<main>
    <div class="container">
        <div class="header">
            <h1>Enquête sur nos donneurs</h1>
        </div>


        <div class="question-container" id="questionContainer">
            <!-- Questions insérées ici -->
        </div>
        <div class="navigation">
            <button class="nav-btn" id="prevBtn" onclick="previousQuestion()">← Précédent</button>
            <button class="nav-btn" id="nextBtn" onclick="nextQuestion()" disabled>Suivant →</button>
        </div>
        <div class="progress-bar">
            <div class="progress" id="progress"></div>
        </div>
    </div>
    <script>
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
        const questionContainer = document.getElementById('questionContainer');
        const progress = document.getElementById('progress');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        function displayQuestion(index) {
            questionContainer.innerHTML = `
        <div class="question active">
            <h2>${questions[index].question}</h2>
            <div class="choices">
                ${questions[index].choices.map((choice, i) => `
                    <button class="choice-btn" onclick="selectChoice(${i})">${choice}</button>
                `).join('')}
            </div>
        </div>
    `;

            // Restore previous answer if it exists
            if (answers[index] !== null) {
                const choices = document.querySelectorAll('.choice-btn');
                selectChoice(answers[index]);
            }

            updateNavButtons();
            updateProgress();
        }

        function updateNavButtons() {
            prevBtn.disabled = currentQuestion === 0;
            nextBtn.disabled = answers[currentQuestion] === null || currentQuestion === questions.length - 1;
        }

        function updateProgress() {
            const progressPercent = ((currentQuestion + 1) / questions.length) * 100;
            progress.style.width = `${progressPercent}%`;
        }

        function nextQuestion() {
            if (currentQuestion < questions.length - 1 && answers[currentQuestion] !== null) {
                currentQuestion++;
                displayQuestion(currentQuestion);
            }
        }

        function previousQuestion() {
            if (currentQuestion > 0) {
                currentQuestion--;
                displayQuestion(currentQuestion);
            }
        }

        function selectChoice(choiceIndex) {
            const choices = document.querySelectorAll('.choice-btn');
            choices.forEach((choice, index) => {
                if (index === choiceIndex) {
                    choice.style.background = '#e75480';
                    choice.style.color = 'white';
                } else {
                    choice.style.background = 'white';
                    choice.style.color = 'black';
                }
            });

            answers[currentQuestion] = choiceIndex;
            updateNavButtons();
        }

        // Initialize the first question
        displayQuestion(0);
    </script>

</main>

<?php
require 'footer.php'; ?>
</html>


