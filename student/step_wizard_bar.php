<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Step Wizard Bar CSS -->
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <section class="step-wizard">
        <ul class="step-wizard-list">
        <li class="step-wizard-item current-item" id="not_enrolled">
                <span class="progress-count"><i id="not_enrolled_icon"></i></span>
                <span class="progress-label">Application</span>
            </li>
            <li class="step-wizard-item" id="first_step">
                <span class="progress-count"><i id="first_step_icon"></i></span>
                <span class="progress-label">Assessment</span>
            </li>
            <li class="step-wizard-item" id="second_step">
                <span class="progress-count"><i id="second_step_icon"></i></span>
                <span class="progress-label">Payment</span>
            </li>
            <li class="step-wizard-item" id="third_step">
                <span class="progress-count"><i id="third_step_icon"></i></span>
                <span class="progress-label">Validation</span>
            </li>
            <li class="step-wizard-item" id="fourth_step">
                <span class="progress-count"><i id="fourth_step_icon"></i></span>
                <span class="progress-label">Enrolled</span>
            </li>
        </ul>
    </section>
</body>
</html>