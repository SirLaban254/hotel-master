<?php include_once ("template/nav.php"); ?>

<body style="background-color: rgb(230, 210, 220);">
    <div class="row">
        <div class="content">
            <h1>Messages</h1>
            <style>
                table {
                    border: 1px solid #2e2929;
                    border-collapse: collapse;
                    width: 70%;
                }
            </style>
            <table border="1" style="background-color: rgb(209, 144, 144);">
                <thead>
                    <tr>
                        <th colspan="2">Email</th>
                        <th>Phone Number</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select_msg = "SELECT * FROM guests ORDER BY datecreated DESC";
                    $sel_msg_res = $conn->query($select_msg);
                    $en = 0;
                    if ($sel_msg_res->num_rows > 0) {
                        // output data of each row
                        while ($sel_msg_row = $sel_msg_res->fetch_assoc()) {
                            $en++;
                            ?>
                            <tr>
                                <td><?php echo $en; ?>.</td>
                                <td><?php echo $sel_msg_row["email"]; ?></td>
                                <td><?php echo "<strong>" . $sel_msg_row["phone_number"] . '</strong> - ' . substr($sel_msg_row["message"], 0, 20) . '...'; ?>
                                </td>
                                <td><?php echo date("d-M-Y H:i", strtotime($sel_msg_row["datecreated"])); ?></td>
                                <td>[ <a href="edit_msg.php?guest_id=<?php echo $sel_msg_row["guest_id"]; ?>">Edit</a> ] [ <a
                                        href="?DelId=<?php echo $sel_msg_row["guest_id"]; ?>"
                                        onclick="return confirm('This action will delete this message permanently.\nAre you sure you want to proceed?');">Del</a>
                                    ]</td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='5'>0 results</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>