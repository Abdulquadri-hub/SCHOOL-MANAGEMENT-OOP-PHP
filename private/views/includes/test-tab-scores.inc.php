<div class="table-responsive">
    <table class="table table-striped table-hover caption-top">
        <caption>Students Scores</caption>
        <tr>
            <th>Student Name</th>
            <th>Score</th>
        </tr>
        <?php if($student_scores): ?>
        <?php foreach($student_scores as $student_score): ?>
        <tr>
            <td><?=$student_score->user->firstname?> <?=$student_score->user->lastname?></td>
            <td><?=$student_score->score?></td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </table>
</div>