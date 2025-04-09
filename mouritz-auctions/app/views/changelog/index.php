<div class="page-wrapper">
    <?php foreach ($data->changelog as $log): ?>

        <div class="col-1-1">
            <div style="min-height: 300px;" class="content auction-wrapper">
                <div class="auction-header">
                    <h3 class="heading"><?php echo $log['author']; ?></h3>

                    <p>Date: <?php echo $log['date']; ?> </p>
                    <p>Commit: <?php echo $log['commit']; ?> </p>
                    <p>Message: <a href="https://github.com/AC10/mouritz-com/commit/<?php echo $log["commit"]; ?>"><?php echo $log['message']; ?></a>  </p>

                </div>
            </div>
        </div>

    <?php endforeach; ?>

</div>


