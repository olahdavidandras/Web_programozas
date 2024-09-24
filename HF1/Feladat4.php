<?php

echo <<<EOD
<table border="1" border-spacing="0" padding="0">
EOD;

for ($sor = 1; $sor <= 3; $sor++) {
    echo <<<EOD
    <tr>
EOD;
    for ($oszlop = 1; $oszlop <= 3; $oszlop++) {
        $ossz = $sor + $oszlop;
        if ($ossz % 2 == 0) {
            echo <<<EOD
            <td height="35px" width="30px" bgcolor="#FFFFFF"></td>
EOD;
        } else {
            echo <<<EOD
            <td height="35px" width="30px" bgcolor="#000000"></td>
EOD;
        }
    }

    echo <<<EOD
    </tr>
EOD;
}

echo <<<EOD
</table>
EOD;

?>
