
<body>
    <a href="cadastrar">NOVO</a>
    <div style="margin: 50px auto;">
        <table border="1">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Idade</td>
                </tr>
            </thead>
            <tbody>
        <?php foreach($this->aDados as $key => $aValores){ ?>
                <tr>
                    <td><?php echo $aValores['flo_nome']; ?></td>
                    <td><?php echo $aValores['flo_idade']; ?></td>
                </tr>
        <?php } ?>
            </tbody>
        </table>
    </div>
</body>