<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <!-- YOUR CODE -->
                <?php
                    if(!empty($transactions)):
                        foreach($transactions as $transaction): ?>
                    <tr>
                        <td><?= formatDate($transaction['date']) ?></td>
                        <td><?= $transaction['check'] ?></td>
                        <td><?= $transaction['description'] ?></td>
                        <td>
                            <?php if($transaction['amount']<0){ ?>
                                <span style="color:red">
                                    <?= dollarAmount($transaction['amount']) ?>
                                </span>
                            <?php } elseif($transaction['amount']>0) { ?>
                                <span style="color:green">
                                    <?= dollarAmount($transaction['amount']) ?>
                                </span>
                            <?php }else{ ?>
                                <?= dollarAmount($transaction['amount']) ?>
                            <?php } ?>
                        
                        </td>
                    </tr>
                <?php endforeach ?>    
                <?php endif ?>
                
                
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td><?= dollarAmount($totals['totalIncome'] )?? 0 ?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><?= dollarAmount($totals['totalExpence']) ?? 0 ?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><?= dollarAmount($totals['netTotal']) ?? 0 ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
