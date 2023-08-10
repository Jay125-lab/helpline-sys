<?php

// Define the weight system for each therapist field
$therapist_weights = array(
    'CBT' => 3,
    'Cognitive' => 2,
    'Addiction' => 4,
    'Behavioral' => 5,
    'Child' => 1
);

// Define the score range for each severity level
$score_ranges = array(
    'Minimal' => array('min' => 0, 'max' => 29),
    'Mild' => array('min' => 30, 'max' => 49),
    'Moderate' => array('min' => 50, 'max' => 69),
    'Severe' => array('min' => 70, 'max' => 100)
);

// Get the user's responses to the 15 screening questions
// $q1 = $_POST['q1'];
// $q2 = $_POST['q2'];
// $q3 = $_POST['q3'];
// $q4 = $_POST['q4'];
// $q5 = $_POST['q5'];
// $q6 = $_POST['q6'];
// $q7 = $_POST['q7'];
// $q8 = $_POST['q8'];
// $q9 = $_POST['q9'];
// $q10 = $_POST['q10'];
// $q11 = $_POST['q11'];
// $q12 = $_POST['q12'];
// $q13 = $_POST['q13'];
// $q14 = $_POST['q14'];
// $q15 = $_POST['q15'];

// Calculate the total score based on the user's responses
// $total_score = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10 + $q11 + $q12 + $q13 + $q14 + $q15;
// $total_score = 2 + 2 + 4 + 3 + 2 + 1 + 2 + 0 + 4 + 2 + 3 + 2 + 0 + 2 + 2;
$total_score=1;
// Determine the severity level based on the total score
if ($total_score >= $score_ranges['Minimal']['min'] && $total_score <= $score_ranges['Minimal']['max']) {
    $severity_level = 'Minimal';
} elseif ($total_score >= $score_ranges['Mild']['min'] && $total_score <= $score_ranges['Mild']['max']) {
    $severity_level = 'Mild';
} elseif ($total_score >= $score_ranges['Moderate']['min'] && $total_score <= $score_ranges['Moderate']['max']) {
    $severity_level = 'Moderate';
} else {
    $severity_level = 'Severe';
}

// Calculate the recommendation score for each therapist field based on the severity level and therapist weights
$recommendation_scores = array();
foreach ($therapist_weights as $therapist => $weight) {
    $recommendation_scores[$therapist] = $weight * $score_ranges[$severity_level]['max'];
}

// Sort the recommendation scores in descending order
arsort($recommendation_scores);

// Get the therapist field(s) with the highest recommendation score
$recommended_therapists = array();
$max_score = reset($recommendation_scores);
foreach ($recommendation_scores as $therapist => $score) {
    if ($score == $max_score) {
        $recommended_therapists[] = $therapist;
    } else {
        break;
    }
}
print_r($recommended_therapists);

// Output the recommended therapist field(s) to the user
if (count($recommended_therapists) == 1) {
    echo 'Based on your screening results, we recommend that you seek a ' . $recommended_therapists[0] . ' therapist.';
} else {
   
}
?>