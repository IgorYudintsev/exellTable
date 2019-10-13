
<table style="margin-top: 10px; border: #0f0f0f solid 5px" border="black solid 1px"  ">
<caption>Каталог трансформаторов</caption>
<tr>
    <th>№</th>
    <th>Наименование товара</th>
    <th>Стоимость, руб</th>
    <th>Стоимость опт, руб</th>
    <th>Наличие на складе 1, шт</th>
    <th>Наличие на складе 2, шт</th>
    <th>Страна производства</th>
    <th>Примечание</th>
</tr>
<?php foreach ($table as $tbl){ ?>
    <tr>
        <td style="background-color: #fbf4a8"><?= $tbl->id; ?></td>
        <td style="background-color: #fbf4a8"><?= $tbl->name; ?></td>
        <td style="background-color: #fbf4a8"><?= $tbl->price; ?></td>
        <td style="background-color: #fbf4a8"><?= $tbl->wholesale; ?></td>
        <td style="background-color: #fbf4a8"><?= $tbl->availability_1; ?></td>
        <td style="background-color: #fbf4a8"><?= $tbl->availability_2; ?></td>
        <td style="background-color: #fbf4a8"><?= $tbl->country_maker; ?></td>
        <td style="background-color: #fbf4a8"><?= $tbl->note; ?></td>
    </tr>
<? } ?>
</table>


<table style="margin-top: 10px; border: #0f0f0f solid 5px" border="black solid 1px"  ">
<caption>ИТОГО: </caption>
<tr>
    <th>Общее количество товаров на Складе1</th>
    <th>Общее количество товаров на Складе2</th>
    <th>Средняя стоимость розничной цены товара</th>
    <th>Средняя стоимость оптовой цены товара</th>

</tr>

    <tr>
        <td style="background-color: #fbf4a8"><?= $availability1 ?></td>
        <td style="background-color: #fbf4a8"><?= $availability2 ?></td>
        <td style="background-color: #fbf4a8"><?= $priceAvg ?></td>
        <td style="background-color: #fbf4a8"><?= $wholesale ?></td>

    </tr>

</table>

<table style="margin-top: 10px; border: #0f0f0f solid 5px" border="black solid 1px"  ">
<caption>MAX-MIN </caption>
<tr>
    <th>самый дорогой товар</th>
    <th>самый дорогой товар ОПТ</th>


</tr>

<tr>
    <td style="background-color: #fbf4a8"><?= $maxPrice->price?></td>
    <td style="background-color: #fbf4a8"><?= $maxwholesale->wholesale?></td>


</tr>

</table>



