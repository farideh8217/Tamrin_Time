<?php
require "core.php";

$reports = getReports();
?>
<form action="" method="POST">
    <table border="2">
        <tr>
            <td>نام کاربر</td>
            <td>زمان ثبت گزارش</td>
            <td>نام پروژه</td>
            <td>نام محصول</td>
            <td>نوع فعالیت</td>
            <td>ساعت عادی</td>
            <td>دقیقه عادی</td>
            <td>ساعت اضافه کاری</td>
            <td>دقیقه اضافه کاری</td>
        </tr>
        <?php foreach ($reports as $report_item) { ?>
            <tr>
                <td><?= GetNameUserById($report_item["user_id"]) ?></td>
                <td><?= $report_item["time"] ?></td>
                <td><?= GetNameProjectByID($report_item["project_id"]) ?></td>
                <td><?= GetNameProductByID($report_item["product_id"]) ?></td>
                <td><?= GetNameActivityByID($report_item["activity_id"]) ?></td>
                <td><?= $report_item["normal_hours"] ?></td>
                <td><?= $report_item["normal_minutes"] ?></td>
                <td><?= $report_item["extra_hours"] ?></td>
                <td><?= $report_item["extra_minutes"] ?></td>
            </tr>
        <?php } ?>
    </table>
</form>
