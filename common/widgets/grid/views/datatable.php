<script>
function calcolaSomma(a, b) { return intVal(a) + intVal(b); }

function dataTableFooterCallback(row, data, start, end, display) {
    var api = this.api();

    const totaliColonne = [<?= $calculateTotals ?>];

    totaliColonne.forEach(function(elem, idx) {
        // Totale importi
        let entrateTotal = api.column(elem, { page: 'current' }).data().reduce(calcolaSomma, 0);
        entrateTotal = entrateTotal.toFixed(2)
        $(api.column(elem).footer()).html('€ ' + $.fn.dataTable.render.number( '.', ',', 2 ).display(entrateTotal));
    });

}

const baseDataTableUrl = 'dt';
const dataTableConfig = {
    language: {
    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/it-IT.json'
    },
    stateSave: true,
    processing: true,
    serverSide: true,
    deferRender: true,
    scrollY: '600px',
    scrollCollapse: true,
    ajax: {
        url: 'dt',
        type: 'POST'
    }
}

</script>
<?php
$shortName = strtolower((new \ReflectionClass($className))->getShortName());
$jsClassName = str_replace("\\", "\\\\", $className);
$this->registerJs("const dtColumns = " . \yii\helpers\Json::encode($className::getColumns()), $this::POS_READY, 'global-columns-list');

$module_id = \Yii::$app->controller->module->id;
if ($module_id == 'app-backend') {
    $module_id = '';
} else {
    $module_id .= '/';
}
$this->registerJs('
    let base    
    let dataTableCfg = dataTableConfig;

    dataTableCfg[\'columns\'] = dtColumns;

    dataTableCfg[\'columns\'].forEach((elem, idx) => {
        if (elem.data == \'matricola\' || elem.data == \'codice\') {
            dataTableCfg[\'columns\'][idx].render = function (data, type, row, meta) {
                if (data !== undefined && data !== "" && data !== null) {
                    return "<a href=\'"+ baseUrl + "' . $module_id . $shortName . '/update?id=" + data +"\'>" +data+ "</a>";
                } else {
                    return \'\';
                }
            };
        }
        if (elem.data == \'soggetto_codice\') {
            dataTableCfg[\'columns\'][idx].render = function (data, type, row, meta) {
                if (data !== undefined && data !== "" && data !== null) {
                    return "<a href=\'"+ baseUrl + "' . $module_id . 'azienda/update?id=" + data +"\'>" +data+ "</a>";
                } else {
                    return \'\';
                }
            };
        }
    });

    /*
    dataTableCfg["columnDefs"] = [
        {
            "targets": 4,
            render: DataTable.render.datetime("DD/MM/Y"),
        }        
    ];
    */

    if ("' . $shortName . '" == "pagamento") {
        dataTableCfg.footerCallback = dataTableFooterCallback;
    }

    dataTableCfg[\'ajax\'][\'url\'] = baseDataTableUrl + \'?entity=' . $jsClassName . '\';
    $(\'#tbl-' . $shortName . '\').DataTable(dataTableCfg);

    ',
    $this::POS_READY,
    'data-table-grid'
);
?>
<div class="">
<table id="tbl-<?= $shortName ?>" class="<?= $tableCssClass ?>" style="width:100%">
    <thead>
        <tr>
            <?php foreach ($className::getColumns() as $col) : ?>
            <th><?= $className::instance()->getAttributeLabel($col['data']) ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <?php foreach ($className::getColumns() as $col) : ?>
            <th><?= $className::instance()->getAttributeLabel($col['data']) ?></th>
            <?php endforeach; ?>
        </tr>
    </tfoot>
</table>
</div>

<style>
    th.dt-body-right {
        text-align: right !important;
    }
</style>
